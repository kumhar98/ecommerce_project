<?php

namespace App\Controllers;
use App\Models\Admin\ProductsModel;
use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;

class Categorys extends BaseController
{
    public function categorysData($id)
    {
       $model = new ProductsModel();
       $CategoryModel = new CategoryModel();
       $data['catname']=$CategoryModel->where('id',$id)->first();
       
       if ($data['categoryList']=$model->where('cat_id_fk',$id)->findAll()) {
        $data['main_contant']= 'categorys';
        return view('template',$data);
       }else {
        echo 'record not fond';
       }
       
       
       
    }
}
