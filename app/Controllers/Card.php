<?php
namespace App\Controllers;

use App\Models\CardModel;
use App\Controllers\BaseController;

class Card extends BaseController
{

    public function Card($id)
    {
        $cardModel = new CardModel();
        $cardModel->selectSum('totalMrp')->where('user_id', $id);
        $data['totalProductsMrp'] = $cardModel->findall();
        $cardModel->selectSum('totalCost')->where('user_id', $id);
        $data['totalProductsCost'] = $cardModel->findall();
        $cardModel->selectSum('addQty')->where('user_id', $id);
        $data['totalItam'] = $cardModel->findall();
        $cardModel->join('products', 'products.id  = card.fk_product_id');
        $cardModel->select('products.product_name,products.qty,products.image1,card.cost,card.addQty,card.addMrp,card.id,card.totalCost,,card.totalMrp');
        $data['userAddCardDetails'] = $cardModel->findAll();

        // $data['userAddCardDetails'] =$cardModel->where('user_id',$id)->findAll();
        $data['main_contant'] = 'card';
        return view('template', $data);
    }
    public function removeAddCardData()
    {
        $cardModel = new CardModel();
        $cardModel->where('id', $this->request->getVar('id'))->delete();
         $count = $cardModel->where('id', $this->request->getVar('id'))->countAll();
       return json_encode(["count"=>$count,"Success"=>"Successfully Deleted"]);

    }
    public function UpdateQty()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getVar('card_id');
            $pro_qty = $this->request->getVar('pro_qty');
            $pro_sellingPrice = $this->request->getVar('pro_sellingPrice');
            $pro_MRP = $this->request->getVar('pro_MRP');
            $data = [
                'addQty' => $pro_qty,
                'cost' => $pro_sellingPrice,
                'addMrp' => $pro_MRP,
                'totalCost' => $pro_sellingPrice * $pro_qty,
                'totalMrp' => $pro_MRP * $pro_qty
            ];
            $cardModel = new CardModel();
            if ($cardModel->update($id, $data)) {
                $data['Success'] = "successfully updated";
            } else {
                $data['errors'] = "do not  update Quantity";
            }


        }
    }
}