<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Order;
use App\Models\CardModel;
use App\Models\OrderitemsModel;

class PaymentProcess extends BaseController
{    

    public function paymentProcess()
    {
      if ($this->request->getVar('paymentMode')=="COD") {
        $userSessionData = session()->get();
        $address = $this->request->getVar('id');
        $cardModel = new CardModel();
        $cardModel->select('products.product_name,card.cost,card.addQty');
        $cardModel->where('card.user_id',$userSessionData['id']);
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
                 $cardModel->where('user_id',$userSessionData['id'])->delete();
                return json_encode(['success'=> "Your order has been successfully placed", 'orderId'=>$order_id]);
            }else{
                return json_encode(['errors'=>"order not placed "]);
            }

        }

         
      }else {
        
      }
    }
    public function success($id){
       $data['orderId'] = $id; 
       $data['main_contant'] = 'success';
       return view('template',$data);
    }
}
