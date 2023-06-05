<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Order;
use App\Models\UserModel;
use App\Models\OrderitemsModel;

class AdminControlle extends BaseController
{
    public function index()
    { 
        $UserModel = new UserModel();
        $OrderModel = new Order();
        $data['total_user'] = $UserModel->countAll();   
        $data['orderItam'] = $OrderModel->findAll();  
        $data['completedOrder'] = $OrderModel->where('order_status','delivered')->findAll();
        $data['pendingOrder'] = $OrderModel->where('order_status','pending')->findAll();     
        $data['main_content'] = 'index';
        return view('admin/adminTemplate',$data);
    }
    public function updateStatus (){
        $OrderModel = new Order();
        $id = $this->request->getVar('id');
        $data['orderStatus'] = $OrderModel->where('id',$id)->findColumn('order_status');  
        $data['id'] =     $id ;
       
        return  json_encode($data) ;
         
    }
    public function updateStatusSave (){
        $OrderModel = new Order();
        $id = $this->request->getVar('id');
        $value = $this->request->getVar('value');
        if ($value == "pending" || $value == "Acceptted" || $value == "out of delivery" || $value=="delivered") {
            $OrderModel->set('order_status', $value);
            $OrderModel->where('id',$id);
            $OrderModel->update();
           echo $value;
        }else{
            echo 'false';
        }
         
    }
}
