<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Admin\ProductsModel;

class Home extends BaseController
{
    public function index()
    {   $mode = new ProductsModel();
        $data['proDetailsFetch'] = $mode->limit(10)->findAll();
        $data['main_contant']= 'index';
        return view('template',$data);
    }
}
