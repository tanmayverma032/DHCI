<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    function __construct()
    {
        $this->userModel = new \App\Models\RegistrationModel();  
        $this->marksheetModel = new \App\Models\MarksheetModel();
        $this->nationalityModel = new \App\Models\NationalityModel();  
        $this->registrationModel = new \App\Models\RegistrationModel(); 

        $this->typingcertificateModel = new \App\Models\TypingcertificateModel();  
        $this->studentCertificatesModel = new \App\Models\StudentCertificateModel();
        $this->admitcardModel = new \App\Models\AdmitcardModel();


    }

    public function login_action()
    { 
        $registration_no = $this->request->getPost("registration_no");
        $password = $this->request->getPost("password"); 

        $user = $this->userModel->where("registration_no", $registration_no)->where("account_create", 1)->where("approval", 1)->first();
        
        $pass = $user['password'];
        $verify_pass  = password_verify($password, $pass);
     

        if ($user === null) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "User ID not found");
        }
        
        else {
            
            if ($verify_pass) {
                $session = session();
                $session->regenerate();

                $session->set("user_id", $user["id"]);
 
                return redirect()
                     ->to("user")
                     ->with("info", "Login successful");
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with("error", "Incorrect password");
            }
        } 
    } 


 

    public function profile()
    {
      $data = is_user()["user"];

      $marksheet = $this->marksheetModel->where("student_id", is_user()["user"]["id"])->where("status", 1)->first();
      $typing = $this->typingcertificateModel->where("student_id", is_user()["user"]["id"])->where("status", 1)->first();
      $certificate = $this->studentCertificatesModel->where("student_id", is_user()["user"]["id"])->where("status", 1)->first();
      $admitcard = $this->admitcardModel->where("student_id", is_user()["user"]["id"])->first();

      $documents = [

        "marksheet" => $marksheet,
        "typing" => $typing,
        "certificate" => $certificate,
        "admitcard" => $admitcard,

      ]; 

      return view("web/users/profile", ["data" => $data, "documents"=> $documents]);

    }

    public function logout() 
    {
         session()->destroy();
         
         return redirect()->to('/');
        
    }

    public function change_password()
    {
        $btn = $this->request->getPost("btn_change_password");

          if (isset($btn)) {

            $user = is_user()["user"];

            if (empty($user)) {
                 return redirect()->back()->with("error", lang("Something Went Wrong!!"));
            } 

            $old = $this->request->getPost("password");
            $verify_pass  = password_verify($old, $user["password"]);

            $new = $this->request->getPost("new_password");
            $newpass = password_hash($new, PASSWORD_DEFAULT);

            if ($verify_pass) {
                return redirect()->back()->with("error", lang("Old password does not match!!"));
            }

            $response = $this->userModel->set("password", $newpass)->where("id", $user["id"])->update();

            if ($response) {

            return redirect()->back()->with("success", lang("Password Updated Successfully"));

            } else { 

            return redirect()->back()->with("error", lang("Something Went Wrong!!"));

            }  
                   
          }       
 
    }

    public function marksheet()
    {
        $user = is_user()["user"];

        if (empty($user)) {
             return redirect()->back()->with("error", lang("Something Went Wrong!!"));
        } 

        $marksheet = $this->marksheetModel->where("student_id", $user["id"])->where("status", 1)->first(); 
        $nationalities = $this->nationalityModel->findAll();

        if (empty($marksheet)) { 
            return redirect()->back()->with("error", lang("Invalid Request!!"));
        } 
        $data = $this->registrationModel->find_by_u_id($marksheet['student_id']);

        return view("admin/students/print_marksheet" , ["data" => $data, "marksheet" => $marksheet ]);


    }

    public function typing()
    {
        $user = is_user()["user"];

        if (empty($user)) {
            return redirect()->back()->with("error", lang("Something Went Wrong!!"));
        } 

        $typing = $this->typingcertificateModel->where("student_id", $user["id"])->where("status", 1)->first();  
 
        if (empty($typing)) { 
            return redirect()->back()->with("error", lang("Invalid Request!!"));
        } 

        return view("admin/students/print_typing_certificate" , ["typing"=> $typing ]);

    }


    public function certificate()
    { 
        $user = is_user()["user"];

        if (empty($user)) {
            return redirect()->back()->with("error", lang("Something Went Wrong!!"));
        } 

        $certificate = $this->studentCertificatesModel->where("student_id", $user["id"])->where("status", 1)->first();  

        if (empty($certificate)) {
            return redirect()->back()->with("error", lang("Invalid Request!!"));
        } 

        $student = $this->registrationModel->where("id", $user["id"])->first(); 
       
        return view("admin/students/print_certificate", ["certificate"=> $certificate, "student" => $student ]);

        
    } 



    public function admitcard()
    { 
        $user = is_user()["user"];

        if (empty($user)) {
            return redirect()->back()->with("error", lang("Something Went Wrong!!"));
        } 

        $data = $this->registrationModel->find_by_u_id($user["id"]);
        $admitcard = $this->admitcardModel->where("student_id", $user["id"])->first(); 
        $nationalities = $this->nationalityModel->findAll();


        if (empty($admitcard)) {
            return redirect()->back()->with("error", lang("Invalid Request!!"));
        }

        return view("admin/students/print_admitcard" , ["data" => $data, "admitcard"=> $admitcard ]);

        
    } 



 

} 