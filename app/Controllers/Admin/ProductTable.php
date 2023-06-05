<?php

namespace App\Controllers\Admin;

use App\Models\Admin\ProductsModel;
use App\Controllers\BaseController;

class ProductTable extends BaseController
{
    public function index()
    {
        $model = new ProductsModel();
        $data['prouctsData'] = $model->findAll();
        $data['main_content'] = 'table';
        return view('admin/adminTemplate', $data);
    }
 
}