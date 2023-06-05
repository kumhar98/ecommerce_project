<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function Logout()
    {
       if (session_destroy()) {
         return redirect()->to(base_url('login'));
       }
    }
}
