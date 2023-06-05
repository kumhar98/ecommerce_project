<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\Admin;
use CodeIgniter\Files\File;

class SignUpController extends BaseController
{
    public function SignUp()
    { 
        $data =[];
        if ($this->request->is('post')) {
        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[5]',
            'passconf' => 'required|matches[password]',
            'email'    => 'min_length[6]|max_length[50]|valid_email|is_unique[useradmin.email]',
            'phoneNo'    => 'required|min_length[10]',
            'userProfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userProfile]',
                    'is_image[userProfile]',
                    'mime_in[userProfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[userProfile,100]',
                    // 'max_dims[userProfile,1024,768]',
                ],
            ],
        ]; 
        
        if($this->validate($rules)){
            $img = $this->request->getFile('userProfile');
            
        if (! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'admin/images', $newName);
        }
            
           
           $model = new Admin();
           
        $data = [
            'username' => $this->request->getVar('username'),
            'email'  => $this->request->getVar('email'),
            'password'  => $this->request->getVar('password'),
            'phoneNo'  => $this->request->getVar('phoneNo'),
            'profilePic'=>$newName 

        ];
        if ($model->save($data)) {
             return redirect()->to(base_url('admin/login'));
        }
         
    }else {
         $data['errors'] = $this->validator;
         $data['main_content'] = 'SignUp';
         return view('admin/adminTemplate',$data);
       
    }
}else {
    $data['main_content'] = 'SignUp';
    return view('admin/adminTemplate',$data);
}

       
    }
}
