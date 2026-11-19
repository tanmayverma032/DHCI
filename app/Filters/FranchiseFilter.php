<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FranchiseFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {  
        helper("auth"); 

        // Do something here
        if ( ! session()->has("admin_id") && ! session()->has("franchise_id")) {

            return redirect()->to('admin/login');
            
        }

        
        if ( is_admin()["role"] != 1) {

            return redirect()->back()->with('error', lang("Invalid Request!"));
            
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}  