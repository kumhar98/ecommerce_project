<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class SignUp extends BaseController
{
    public function signupData()
    {  

        $data =[];
        if ($this->request->is('post')) {
         
        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[5]',
            'passconf' => 'required|matches[password]',
            'email'    => 'required|valid_email',
            'PhoneNo'    => 'required|min_length[10]',
        ]; 
        
        if($this->validate($rules)){
           
            
             $model = new UserModel();
           
        $data = [
            'username' => $this->request->getVar('username'),
            'email'  => $this->request->getVar('email'),
            'password'  => $this->request->getVar('password'),
            'PhoneNo'  => $this->request->getVar('PhoneNo'),

        ];
        if ($model->save($data)) {
            return redirect()->to(base_url('login'));
        }
         
    }else {
         $data['errors'] = $this->validator;
         $data['main_contant'] = 'signUp';
         return view('template',$data);
       
    }
}else {
    $data['main_contant'] = 'signUp';
    return view('template',$data);
}
    }
}
