<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RegistrationModel;

class UserauthController extends BaseController
{
    protected $registrationModel;

    public function __construct()
    {
        $this->registrationModel = new RegistrationModel();
    }


    public function login()
    {
        if (session()->has('admin_id')) {
            return redirect()->to('admin/dashboard');
        }
        return view('auth/login');  // Ensure you have this view file
    }


    public function login_action()
    {
        $enrollment = $this->request->getPost("enrollment");
        $password = $this->request->getPost("password");

        $user = $this->registrationModel->where("rag_no", $enrollment)->where('status', 1)->first();

        if (!$user) {
            return redirect()->back()->withInput()->with("error", "Student Not Found !!");
        }

        if (password_verify($password, $user['password'])) {
            $session = session();
            $session->regenerate();
            $session->set([
                "user_id" => $user["id"],
                "user_name" => $user["name"],
                "logged_in" => true
            ]);

            return redirect()->to("/user")->with("info", "Welcome Back " . $user["name"]);
        } else {
            return redirect()->back()->withInput()->with("error", "Incorrect password");
        }
    }

    
    public function logout()
    {
        $session = session();
        if ($session->has('user_id')) {
            $session->destroy();
            return redirect()->to('/')->with('logout_message', 'You have been logged out successfully.');
        } else {
            return redirect()->to('/')->with('error_message', 'No active session found.');
        }
    }
}
