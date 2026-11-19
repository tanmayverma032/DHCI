<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;


class UserController extends BaseController
{
    function __construct()
    {
        $this->StateModel = new \App\Models\StateModel();
        $this->FranchiseModel = new \App\Models\FranchiseModel();
        $this->CitieModel = new \App\Models\CitieModel();
        $this->CourseModel = new \App\Models\CourseModel();
        $this->RegistrationModel = new \App\Models\RegistrationModel();
        $this->StudyMaterialModel = new \App\Models\StudyMaterialModel();
        $sessionModel = new \App\Models\SessionModel();
    }

    public function index()
    {
        $data['data'] = is_user();

        $course_id = $data['data']['course_id'];

        $course = $this->CourseModel->where('id', $course_id)->first();
        $data['course_name'] = $course ? $course['name'] : 'Course not found';

        $data['pagetitle'] = "User Dashboard";
        return view('user/index', $data);
    }


    // public function studentDetails()
    // {
    //     $data['data'] = is_user();
    //      var_dump( $data['data']);
    //     exit;

    //     $course_id = $data['data']['course_id'];

    //     $course = $this->CourseModel->where('id', $course_id)->first();
    //     $data['course_name'] = $course ? $course['name'] : 'Course not found';

       
    //     $data['pagetitle'] = "User Dashboard";
    //     return view('user/student-details', $data);
    // }
    
    
    public function studentDetails()
    {
        $data['data'] = is_user();
        // course name
        $course_id = $data['data']['course_id'];
        $course = $this->CourseModel->where('id', $course_id)->first();
        $data['course_name'] = $course ? $course['name'] : 'Course not found';
        
        //Session fetch
        $sessionModel = new \App\Models\SessionModel();
        $session_id = $data['data']['session_id'];
    
        $session = $sessionModel->where('id', $session_id)->first();
        $data['session_name'] = $session ? $session['session'] : 'Session not found';
    
        $data['pagetitle'] = "User Dashboard";
        return view('user/student-details', $data);
    }


    // public function Syllabus()
    // {
    //     $data['data'] = is_user();

    //     $course_id = $data['data']['course_id'];

    //     $course = $this->CourseModel->where('id', $course_id)->first();
    //     $data['course_name'] = $course ? $course['name'] : 'Course not found';

    //     $data['pagetitle'] = "User Dashboard";
    //     return view('user/syllabus', $data);
    // }


    public function Syllabus()
    {
        $data['data'] = is_user();
        $course_id = $data['data']['course_id'];


        $course = $this->CourseModel->where('id', $course_id)->first();
        $data['course_name'] = $course ? $course['name'] : 'Course not found';

        $semesterCount = $course ? $course['semester'] : 0;

        $studyMaterials = $this->StudyMaterialModel
            ->where('course_id', $course_id)
            ->orderBy('code', 'ASC')
            ->findAll();

            $semesterData = [];
            foreach ($studyMaterials as $material) {
                $semesterNumber = $material['semester'];
                $semesterData[$semesterNumber][] = $material;
            }

        $data['semesterCount'] = $semesterCount;
        $data['semesterData'] = $semesterData;
        $data['pagetitle'] = "User Dashboard";

        return view('user/syllabus', $data);
    }


}
