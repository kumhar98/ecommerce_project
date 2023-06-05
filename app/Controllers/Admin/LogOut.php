<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class LogOut extends BaseController
{
    public function LogOut()
    {
        session()->destroy();       
        return redirect()->to(base_url('admin/login'));
          
    }
}
