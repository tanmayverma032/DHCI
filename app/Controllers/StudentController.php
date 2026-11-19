<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StudentController extends BaseController
{ 
    function __construct()
    {  
        $this->RegistrationModel = new \App\Models\RegistrationModel(); 
        $this->CourseModel = new \App\Models\CourseModel();
        $this->StateModel = new \App\Models\StateModel();
        $this->citieModel = new \App\Models\CitieModel();
        $this->franchiseModel = new \App\Models\FranchiseModel();
    }

    public function index()
    {
        $data['pagetitle']="Student Registration";
        $data['state']=  $this->StateModel->findAll();
        $data['course']=  $this->CourseModel->findAll();
        $data['centers'] = $this->franchiseModel->findAll();
        return view("web/student_ragistration",$data);

    }
    public function saveStudent()
    {
        $image = $this->request->getFile("photo");
        $image_status = 0;
        if (!empty($image->getName())) {
            $upload = new \App\Controllers\ImageUpload();
            $image_status = $upload->upload_single_400_500($image);
            if ($image_status == 1) {
                return redirect()->back()->with("error", lang("File size should be less than 1 MB"));
            }
            if ($image_status == 2) {
                return redirect()->back()->with("error", lang("Invalid file type, only JPG, JPEG, PNG and WEBP are allowed"));  
            }
        }
            $pass= $this->request->getPost("number")??123456;
            $password = password_hash($pass, PASSWORD_DEFAULT);
            
            $datas=[
                //"rag_no"=>$this->request->getPost('rag_no'),
                "center_id"=>$this->request->getPost('center_id'),
                "course_id"=>$this->request->getPost('course_id'),
                // "session_id"=>$this->request->getPost('session_id'),
                // "batch_id"=>$this->request->getPost('batch_id'),
                "name"=>$this->request->getPost('name'),
                "father_name"=>$this->request->getPost('father_name'),
                "mother_name"=>$this->request->getPost('mother_name'),
                "dob"=>$this->request->getPost('dob'),
                "email"=>$this->request->getPost('email'),
                "number"=>$this->request->getPost('number'),
                // "religion"=>$this->request->getPost('religion'),
                "gender"=>$this->request->getPost('gender'),
                "category"=>$this->request->getPost('category'),
                // "qualification"=>$this->request->getPost('qualification'),
                "idcard_type"=>$this->request->getPost('idcard_type'),
                "id_card_no"=>$this->request->getPost('id_card_no'),
                "state_id"=>$this->request->getPost('state_id'),
                "district_id"=>$this->request->getPost('district_id'),
                "pincode"=>$this->request->getPost('pincode'),
                "address"=>$this->request->getPost('address'),
                "reg_date"=>date('Y-m-d'),
                "status"=>0,
                "photo" => $image_status,
                "password" => $password,
            ];
           
            $this->RegistrationModel->save($datas);
            
            return redirect()->back()->with("success", lang("Thank you for registering. Our team will contact you soon!"));
        
    }
    public function getDistrictname()
    {
        $state_id = $this->request->getVar('state_id');
        $data['distric'] = $this->citieModel->where('state_id',$state_id)->findAll();
        $data['token'] = csrf_hash();
        echo json_encode($data);
    }
    


    
}