<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\ImageUploadController;
use App\Models\Admin\CategoryModel;
use App\Controllers\BaseController;

class CategoryController extends BaseController
{
    public function categoryAdd()
    {
        $data = [];
        if ($this->request->is('post')) {
            $rules = [
                'cat_name' => 'required',
            ];

            if ($this->validate($rules)) {

                $model = new CategoryModel();

                $data = [
                    'cat_name' => $this->request->getVar('cat_name'),

                ];
                if ($model->save($data)) {
                    $data['Success'] = " your data is successful insert";
                    $data['main_content'] = 'category';
                    return view('admin/adminTemplate', $data);
                }

            } else {
                $data['errors'] = $this->validator;
                $data['main_content'] = 'category';
                return view('admin/adminTemplate', $data);
            }
        } else {
            $data['main_content'] = 'category';
            return view('admin/adminTemplate', $data);
        }


    }
    public function categoryFetchData()
    {
        $model = new CategoryModel();
        $data['CategoryData'] = $model->findAll();
        $data['main_content'] = 'categoryTable';
        return view('admin/adminTemplate', $data);

    }
    public function categoryUpdate($id)
    {
        if ($this->request->is('post')) {
            $rules = [
                'cat_name' => 'required',
            ];
            if ($this->validate($rules)) {

                $model = new CategoryModel();

                $data = [
                    'cat_name' => $this->request->getVar('cat_name')

                ];
                if ($model->update($id, $data)) {
                    return redirect()->to(base_url('admin/categoryTable'));
                }

            } else {
                $data['errors'] = $this->validator;
                $data['main_content'] = 'categoryUpdate';
                return view('admin/adminTemplate', $data);
            }
        } else {
            $model = new CategoryModel();
            $data['CategoryData'] = $model->where('id', $id)->first();
            $data['main_content'] = 'categoryUpdate';
            return view('admin/adminTemplate', $data);
        }
    }
    public function  categoryDelete(){
        $id = $this->request->getVar('id');
        $model = new CategoryModel();
        if( $model->where('id',$id)->delete()){
          return $Success = "true";
        }else{
            return $Success = 'false'; 
        }
        
    }


}