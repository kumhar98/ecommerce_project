<?php

namespace App\Controllers;
use App\Models\Admin\ProductsModel;

use App\Controllers\BaseController;

class ViewAllController extends BaseController
{
    public function productsFechall()
    {
        $mode = new ProductsModel();
        $data['proDetailsFetch'] = $mode->paginate(2);
        $data['main_contant']= 'viewAll';
        return view('template',$data);
    }
}
