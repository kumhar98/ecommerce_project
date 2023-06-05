<?php

namespace App\Controllers\Admin;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\ProductsModel;
use App\Controllers\BaseController;

class Products extends BaseController
{
       public function Products()
    {  $data = [];
        $categoryModel = new CategoryModel();
        if ($this->request->is('post')) {
            $rules = [
                'product_name' => 'required|string',
                'product_color' => 'required|string',
                'product_des' => 'required|string',
                'qty' => 'required|numeric|max_length[10]',
                'MRP'    => 'required|numeric|max_length[10]',
                'selling_price'    => 'required|numeric|max_length[10]',
            ]; 
            if($this->validate($rules)){
                $imageModel = new ImageUploadController();
                $images =   $this->request->getFiles();
                if (count($images['images']) <= 4) {
                     $img = $imageModel->upload($images);
                }else {
                    $data['imageError'] = "images upload only less than 4";
                    $data['main_content'] = 'products';
                    $data['category'] =  $categoryModel->findAll();
                    return view('admin/adminTemplate',$data); 
                }
              
               
                if (isset($img['errors'])) {
                    $data = ['errors'=>$img['errors']];
                    $data['main_content'] = 'products';
                    $data['category'] =  $categoryModel->findAll();
                    return view('admin/adminTemplate',$data);
                } 
             
               $model = new ProductsModel();
               
            $data = [
                'product_name' => $this->request->getVar('product_name'),
                'color' => $this->request->getVar('product_color'),
                'product_des'  => $this->request->getVar('product_des'),
                'qty'  => $this->request->getVar('qty'),
                'MRP'  => $this->request->getVar('MRP'),
                'selling_price'  => $this->request->getVar('selling_price'),
                'cat_id_fk'  => $this->request->getVar('category'),
                'image1'=>@$img[0],
                'image2'=>@$img[1],
                'image3'=>$img[3] ?? NULL,
                'image4'=>@$img[3]
,
            ];
            if ($model->save($data)) {
                return redirect()->to(base_url('admin/table'));
            }
             
        }else {
             $data['errors'] = $this->validator;
             $data['main_content'] = 'products';
             $data['category'] =  $categoryModel->findAll();
             return view('admin/adminTemplate',$data);
           
        }
          

    } else {
        $data['category'] =  $categoryModel->findAll();
        $data['main_content'] = 'products';
        return view('admin/adminTemplate',$data);
    }
    
    }
}
