<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ProductsModel;
use App\Models\Admin\CategoryModel;

class ProductUpdate extends BaseController
{
    public function ProductUpdate($id)
    {
        $model = new ProductsModel();
        $categoryModel = new CategoryModel();
        $data = [];
        if ($this->request->is('post')) {
            $rules = [
                'product_name' => 'required|string',
                'product_color' => 'required|string',
                'product_des' => 'required|string',
                'qty' => 'required|numeric|max_length[10]',
                'MRP' => 'required|numeric|max_length[10]',
                'selling_price' => 'required|numeric|max_length[10]',
            ];
            if ($this->validate($rules)) {
                $images = $this->request->getFiles();
                $oldImagesSelect = $model->where('id',$id)->select('image1,image2,image3,image4'); 
                $oldImages=$oldImagesSelect->findAll();
                    if($images['images'][0]->isValid()  ){
                        if (count($images['images']) <= 4) {
                            $imageModel = new ImageUploadController();
                            $img = $imageModel->upload($images);
                            $arrayfilter = array_filter($oldImages[0]);
                            foreach ($arrayfilter as $key => $value) {
                                unlink(FCPATH . 'admin/images/' . $value);
                                clearstatcache();
                            }
                        } else {
                            $data['imageError'] = "images upload only less than 4";
                            $data['main_content'] = 'productUpdate';
                            $data['ProductDataFetch'] = $model->where('id', $id)->first();
                            $data['category'] = $categoryModel->findAll();
                            return view('admin/adminTemplate', $data);
                        }
                    }else {
                        $img[0] =  $oldImages[0]['image1']; 
                        $img[1] =  $oldImages[0]['image2']; 
                        $img[2] =  $oldImages[0]['image3']; 
                        $img[3] =  $oldImages[0]['image4']; 
                    }   
                if (isset($img['errors'])) {
                    $data = ['errors' => $img['errors']];
                    $data['ProductDataFetch'] = $model->where('id', $id)->first();
                    $data['main_content'] = 'productUpdate';
                    $data['category'] = $categoryModel->findAll();
                    return view('admin/adminTemplate', $data);
                }

                // $model = new ProductsModel();

                $data = [
                    'product_name' => $this->request->getVar('product_name'),
                    'color' => $this->request->getVar('product_color'),
                    'product_des' => $this->request->getVar('product_des'),
                    'qty' => $this->request->getVar('qty'),
                    'MRP' => $this->request->getVar('selling_price'),
                    'selling_price' => $this->request->getVar('MRP'),
                    'cat_id_fk' => $this->request->getVar('category'),
                    'image1' => @$img[0],
                    'image2' => @$img[1],
                    'image3' => $img[2] ?? NULL,
                    'image4' => @$img[3]
                    ,
                ];
                if ($model->update($id, $data)) {
                    return redirect()->to(base_url('admin/table'));
                }

            } else {
                $data['errors'] = $this->validator;
                $data['ProductDataFetch'] = $model->where('id', $id)->first();
                $data['main_content'] = 'productUpdate';
                $data['category'] = $categoryModel->findAll();
                return view('admin/adminTemplate', $data);

            }

        } else {
            $data['category'] = $categoryModel->findAll();
            $data['ProductDataFetch'] = $model->where('id', $id)->first();
            $data['main_content'] = 'productUpdate';
            return view('admin/adminTemplate', $data);
        }
    }
    public function ProductDelete()
    {
        $id = $this->request->getVar('id');
        $model = new ProductsModel();
        $model->where('id', $id)->select('image1,image2,image3,image4');
        $imageData = $model->get()->getResult('array');
        $arrayfilter = array_filter($imageData[0]);
        foreach ($arrayfilter as $key => $value) {
            unlink(FCPATH . 'admin/images/' . $value);
            clearstatcache();
        }

        if ($model->where('id', $id)->delete()) {
            return $Success = "true";
        } else {
            return $Success = 'false';
        }

    }
}