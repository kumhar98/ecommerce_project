<?php

namespace App\Controllers;
use App\Models\CardModel;
use App\Models\Admin\ProductsModel;

use App\Controllers\BaseController;

class AddCard extends BaseController
{
    public function AddCard($id)
    {
        $CatModel = new ProductsModel();
        $data['pro_details']=$CatModel->where('id',$id)->findAll();
        $data['main_contant']= 'proDetails';
        return view('template',$data);
      
    }
    public function add(){
      if ($this->request->is('post')) {
        $pro_qty = $this->request->getVar('pro_qty');
        $pro_sellingPrice = $this->request->getVar('pro_sellingPrice');
        $pro_MRP =  $this->request->getVar('pro_MRP');
        $data = [
          'fk_product_id' => $this->request->getVar('fk_product_id'), 
          'addQty' =>$pro_qty, 
          'cost' =>   $pro_sellingPrice ,
          'addMrp' => $pro_MRP,  
          'user_id' => $this->request->getVar('user_id'), 
          'totalCost'=>  $pro_sellingPrice * $pro_qty,
          'totalMrp' => $pro_MRP * $pro_qty 
        ];
        $model = new CardModel();
        $query = $model->where('fk_product_id', $data['fk_product_id'])->where('user_id', $data['user_id'])->findAll();
        $count = $model->where('user_id', $data['user_id'])->countAll();
        if (count($query)==1) {
          $id= $query[0]['id'];
          $model->update($id,$data);
           return json_encode(["count"=>$count,"Success"=>"update"]);
          
        }
        if ($model->save($data)) {
          return json_encode(["count"=>$count+1,"Success"=>"add"]);
        } else {
            return $errors = 'false';
        }
        
      } else {
        $data['main_contant']= 'proDetails';
        return view('template',$data);
      }
    }
}
