<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Order;
use App\Models\CardModel;
use App\Models\OrderitemsModel;

class TrackController extends BaseController
{
    public function track($userid)
    {
       $model =  new Order();  
       $model->select('*');
       $model->where('fk_userid',$userid);
       $model->join('address', 'address.id = orderstable.addressId');
       $model->join('orderitems', 'orderitems.fk_orderid = orderstable.id');
       $model->orderBy('orderstable.id', 'DESC');
       if ($data['orderDetials'] = $model->findAll()){
           $data['main_contant'] = 'track';
           return view('template',$data);
       }else{
        $data = [];
        $data['errors'] = "<span class='text-danger'> You have not ordered any products</span>"; 
        $data['main_contant'] = 'track';
        return view('template',$data);
       }
    }
}
