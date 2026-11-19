<?php

namespace App\Controllers;

class CourseController extends BaseController
{
    function __construct ()
    {
        $this->CourseModel = new \App\Models\CourseModel();
        $this->franchiseModel = new \App\Models\FranchiseModel();
        $this->stateModel = new \App\Models\StateModel();
        $this->ProgramModel = new \App\Models\ProgramModel();
        $this->adminModel = new \App\Models\AdminModel();
    }
    public function sanitize($stringToSanitize = false) 
    { 
         if (!empty($stringToSanitize)) {
           return addslashes(htmlspecialchars($stringToSanitize)); 
        } else {
            return "";
        }
    }

    public function index($course=null)
    {
        $data['program']= $this->ProgramModel->where('slug',$course)->first();
        $data['pagetitle']= $data['program']['title'];
        $data['courses'] = $this->CourseModel->where('programid',$data['program']['id'])->findAll();
        return view('web/courses',$data);
    }
    public function CourseDetails($var = null)
    {
        $data['courses'] = $this->CourseModel->where('slug',$var)->first();
        $data['program']= $this->ProgramModel->where('id',$data['courses']['programid'])->first();
        $data['programsname']=$this->ProgramModel->findAll();
        $data['pagetitle']= $data['courses']['name'];
        return view('web/course_details',$data);
    }
}
