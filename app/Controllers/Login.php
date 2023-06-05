<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function loginData()
    {
        $data = [];

        if ($this->request->is('post')) {
            $rules = [
                'password' => 'required|min_length[5]',
                'email'    => 'required|valid_email',
            ];
            $signup_errors = [
                'password' => [
                    'required' => 'You must choose a password.',
                ],
                'email' => [
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.',
                ],
            ];
            if ($this->validate($rules, $signup_errors)) {
                $model = new UserModel();
                if ($data =  $model->where('email', $this->request->getVar('email'))->first()) {
                    if ($this->passwordMatch($this->request->getVar('password'), $data['password'])) {
                        if ($this->SetSession($data)) {
                            return redirect()->to('/');
                        }
                    } else {
                        $data['passwordErrors'] = 'Password Does not Match';
                        $data['main_contant'] = 'login';
                        return view('template', $data);
                    }
                } else {
                    $data['emailErrors'] = 'Email Does not Match';
                    $data['main_contant'] = 'login';
                    return view('template', $data);
                }
            } else {
                $data['errors'] = $this->validator;
                $data['main_contant'] = 'login';
                return view('template', $data);
            }
        } else {
            $data['main_contant'] = 'login';
            return view('template', $data);
        }
    }
    private function SetSession($data)
    {
        $data = [
            'id' => $data['id'],
            'username' => $data['username'],
            'PhoneNo' => $data['PhoneNo'],
            'email' => $data['email'],
            'isLoggedIn' => true,

        ];

        session()->set($data);
        return true;
    }
    private function passwordMatch($loginpass, $userpass)
    {
        return password_verify($loginpass, $userpass);
    }
}
