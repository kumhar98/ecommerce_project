<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Admin\ProductsModel;
use App\Models\CardModel;
use App\Models\AddressModel;
use App\Models\Order;
use App\Models\OrderitemsModel;

class BuyProductController extends BaseController
{
    public function buyProduct()
    {  
        $session = session()->get();
        $pro_id = $this->request->getVar('proId');
        $pro_Qty = $this->request->getVar('proQty');
        $productsModel = new ProductsModel();
        $product =  $productsModel->where('id',$pro_id)->findAll();

        $data = [
            'fk_product_id' =>$pro_id, 
            'addQty' =>$pro_Qty, 
            'cost' =>   $product[0]['selling_price'] ,
            'addMrp' => $product[0]['MRP'] ,  
            'user_id' => $session['id'], 
            'totalCost'=> $product[0]['selling_price'] * $pro_Qty,
            'totalMrp' => $product[0]['MRP'] * $pro_Qty 
          ];
          $model = new CardModel();
          $query = $model->where('fk_product_id', $pro_id)->where('user_id', $session['id'])->findAll();
        //   $count = $model->where('user_id', $session['id'])->countAll();
          if (count($query)==1) {
            $id= $query[0]['id'];
            $model->update($id,$data);
            echo  $product[0]['id'] ;
            
          }
          else {
            $model->save($data);
            echo  $product[0]['id'] ;
          }
            
    }
    public function buyCheckout($Pro_id){
        $id = session()->get('id');
        $cardModel = new CardModel();
        $AddressModel = new AddressModel();
        $product =  $cardModel->where('fk_product_id',$Pro_id)->findAll(); 

        $data['fk_product_id'] = $product[0]['fk_product_id'];
        $data['totalProductsMrp'] = $product[0]['totalMrp'];
        $data['totalProductsCost'] = $product[0]['totalCost'];
        $data['totalItam'] = $product[0]['addQty'];
        $data['totalAddress'] = $AddressModel->where('userId', $id)->findAll();
        $data['main_contant'] = 'buyCheckout';
        return view('template', $data);
    }
    public function buypaymentProcess(){
        if ($this->request->getVar('paymentMode')=="COD") {
            $userSessionData = session()->get();
            $address = $this->request->getVar('id');
            $pro_id = $this->request->getVar('pro_id');
            $cardModel = new CardModel();
            $cardModel->select('products.product_name,card.cost,card.addQty');
            $cardModel->where('card.fk_product_id', $pro_id);
            $cardModel->join('products', 'products.id  = card.fk_product_id');
            $userAddCardDetails = $cardModel->findAll();
            $subtotal=0;
            $order_id = 'PRP'.rand(1000,54323232);
            foreach ( $userAddCardDetails as $key => $value) {
                $subtotal =  $value['addQty'] * $value['cost'];
            }
            date_default_timezone_set("Asia/Calcutta"); 
            $data = [
                'order_id'=> $order_id,
                'order_amount'=>$subtotal,
                'order_date'=> date("Y/m/d H:i:s"),
                'order_type'=> $this->request->getVar('paymentMode'),
                'fk_userid'=>$userSessionData['id'],
                'addressId' =>  $address
            ];
            $orderModel =  new Order();
            if ($orderModel->save($data)) {
                $lastInsetId = $orderModel->getInsertID(); 
              
                 $OrderitemsModel = new OrderitemsModel;
                 foreach ( $userAddCardDetails as $key => $value) {
                    $orderData = [
                        'item_name' => $value['product_name'],
                        'items_amount' => $value['cost'],
                        'items_qty' => $value['addQty'],
                        'fk_orderid' =>$lastInsetId ,
                    ];
                    $data = $OrderitemsModel->save($orderData);
                  
                }
                if($data){
                     $cardModel->where('fk_product_id',$pro_id)->delete();
                    return json_encode(['success'=> "Your order has been successfully placed", 'orderId'=>$order_id]);
                }else{
                    return json_encode(['errors'=>"order not placed "]);
                }
    
            }
    
             
          }else {
              echo "errors";
          }
    }
}
