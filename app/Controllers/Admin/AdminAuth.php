<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class AdminAuth extends BaseController
{
	public function login()
    { 
        //$password = password_hash('', PASSWORD_DEFAULT);
        //var_dump($password);exit;
	    if (session()->has('admin_id')) {
            return redirect()->to('admin/dashboard');
        } else {
           return view('auth/login');
        } 
    }
	
	public function login_action()
    { 
		$user_name = $this->request->getPost("email");
        $password = $this->request->getPost("password"); 

        $user = $this->AdminModel->where("email", $user_name)->first();
        
        if ($user === null) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "admin ID not found");
        }
		
		else {
            $pass = $user['password'];
            $verify_pass  = password_verify($password, $pass);
            if ($verify_pass) {
                $session = session();
                $session->regenerate();

                 $session->set("admin_id", $user["id"]);
                
                 return redirect()
                     ->to("/admin")
                     ->with("info", "Welcome Back ".$user["user_name"]);
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with("error", "Incorrect password");
            }
          } 
    } 

	public function logout() 
	{
	     session()->destroy();
         
         return redirect()->to('/');
        
	}
	public function  Userlist() {
        $title ="User List";
        $user = $this->AdminModel->findAll();
        return view('admin/user/user', compact('user','title'));
    }
 

}
