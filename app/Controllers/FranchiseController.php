<?php

namespace App\Controllers;

use App\Models\FranchiseModel;
use App\Models\StateModel;
use App\Models\AdminModel;

class FranchiseController extends BaseController
{
    protected $franchiseModel;
    protected $stateModel;
    protected $adminModel;

    public function __construct()
    {
        $this->franchiseModel = new FranchiseModel();
        $this->stateModel     = new StateModel();
        $this->adminModel     = new AdminModel();
    }

    public function sanitize($stringToSanitize = false) 
    { 
        if (!empty($stringToSanitize)) {
           return addslashes(htmlspecialchars($stringToSanitize)); 
        } else {
            return "";
        }
    }

    public function ApplyFranchise()
    {
        $data['states']    = $this->stateModel->findAll();
        $data['pagetitle'] = 'Apply Franchise';
        return view('web/apply_franchise', $data);
    }

    public function franchise_verification()
    {
        return view('web/franchise/franchise_verification');
    }

    public function authorisation_centre()
    {
        return view('web/franchise/authorisation_centre');
    }

    public function apply_franchise_action()
    {
        $email = $this->request->getPost("email");
        
        if (empty($email)) {
            return redirect()->back()->with("error", "Please provide a valid email address.");
        }

        // Check if email already exists
        if ($this->franchiseModel->is_duplicate_email($email)) {
            return redirect()->back()->with("warning", "Email {$email} already exists!");
        }

        // Prepare data array
        $data = [
            'state_id'       => $this->request->getVar('state_id'),
            'district_id'    => $this->request->getVar('district_id'),
            'pin_code'       => $this->request->getVar('pin_code'),
            'institute_name' => $this->request->getVar('institute_name'),
            'ins_address'    => $this->request->getVar('ins_address'),
            'establishment'  => $this->request->getVar('establishment'),
            'ins_status'     => $this->request->getVar('ins_status'),
            'ins_num'        => $this->request->getVar('ins_num'),
            'h_name'         => $this->request->getVar('h_name'),
            'h_addres'       => $this->request->getVar('h_addres'),
            'email'          => $email,
            'h_number'       => $this->request->getVar('h_number'),
            'dob'            => $this->request->getVar('dob'),
            'gender'         => $this->request->getVar('gender'),
            'marital_status' => $this->request->getVar('marital_status'),
            'h_qual'         => $this->request->getVar('h_qual'),
            'h_exp'          => $this->request->getVar('h_exp'),
            'pan_no'         => $this->request->getVar('pan_no'),
            'aadhar_no'      => $this->request->getVar('aadhar_no'),
            'gst_no'         => $this->request->getVar('gst_no'),
            'reg_date'       => date('Y-m-d'),
            'status'         => 0, // 0 = Pending
            'branch_level'   => 1,
        ];

        // Handle File Uploads securely
        $uploadPath = WRITEPATH . '../public/uploads/franchise/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $fileFields = ['photo', 'pan_photo', 'ins_photo'];
        foreach ($fileFields as $field) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Validation: Check size (< 1MB) and extension
                if ($file->getSizeByUnit('mb') > 1) {
                    return redirect()->back()->with("error", ucfirst(str_replace('_', ' ', $field)) . " size should be less than 1 MB");
                }
                
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];
                if (!in_array($file->getMimeType(), $allowedTypes)) {
                    return redirect()->back()->with("error", "Invalid file type for " . str_replace('_', ' ', $field) . ". Only JPG, JPEG, PNG and WEBP are allowed.");
                }

                $newName = $file->getRandomName();
                $file->move($uploadPath, $newName);
                $data[$field] = $newName;
            }
        }

        // Insert into database
        $result = $this->franchiseModel->insert($data);

        if ($result) {
            return redirect()->back()->with("success", "Branch Application Submitted Successfully!");
        } else {
            return redirect()->back()->with("error", "Something went wrong while saving your application.");
        }
    }

    public function study_centres() 
    {
        $data['franchise'] = $this->franchiseModel->where('status', 1)->findAll();
        $data['pagetitle'] = 'Study Centres';
        return view('web/study_centres', $data);
    }
}