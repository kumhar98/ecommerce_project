<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoauthAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        
        if (session()->get('isLoggedInAdmin')) {
            return redirect()->to("admin/index");
        }
        if(session()->get('isLoggedIn')){
            return redirect()->to(base_url('/'));
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}