<?php

namespace App\Controllers\Admin;
use App\Models\Admin\Admin;

use App\Controllers\BaseController;

class Adminlogin extends BaseController
{
    public function Adminlogin()
    { 
        $data = [];
        if ($this->request->is('post')) {
            $rules = [
                'password' => 'required|min_length[5]',
                'email'    => 'min_length[6]|max_length[50]|valid_email',
            ];
            $signup_errors = [
                'password' => [
                    'required' => 'You must choose a password.',
                ],
                'email' => [
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.',
                ],
            ];
            if($this->validate($rules,$signup_errors)){
                $model = new Admin();
               $data =  $model->where('email',$this->request->getVar('email'))->first();
                if ($this->passwordMatch($this->request->getVar('password'),$data['password'])) {
                     if ($this->SetSession($data)) {
                         return redirect()->to(base_url('admin/index'));
                     }
                }

            }else {
                $data['errors'] = $this->validator;
                $data['main_content'] = 'login';
                return view('admin/adminTemplate',$data);
            }
            
        }else{
            $data['main_content'] = 'login';
            return view('admin/adminTemplate',$data);
        }

   
    }
    private function SetSession($data){
        $data = [
            'id'=> $data['id'],
            'username'=> $data['username'],
            'phoneNo'=> $data['phoneNo'],
            'email'=> $data['email'],
            'profilePic'=> $data['profilePic'],
            'isLoggedInAdmin'=> true,
            
        ];

        session()->set($data);
        return true;
    }
    private function passwordMatch($loginpass,$userpass){
        return password_verify($loginpass,$userpass);
    }
}
