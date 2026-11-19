<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ApplyFranchiseController extends BaseController
{
    protected $franchiseModel;
    protected $stateModel;
    protected $adminModel;

    public function __construct()
    {
        $this->franchiseModel = new \App\Models\ApplyFranchiseModel();
        $this->stateModel     = new \App\Models\StateModel();
        $this->adminModel     = new \App\Models\AdminModel();
    }

    /**
     * Sanitize Input Data
     */
    public function sanitize($stringToSanitize = '')
    {
        return !empty($stringToSanitize)
            ? htmlspecialchars(trim($stringToSanitize), ENT_QUOTES, 'UTF-8')
            : '';
    }

    /**
     * Apply Franchise Page
     */
    public function ApplyFranchise()
    {
        $data['states']    = $this->stateModel->findAll();
        $data['pagetitle'] = 'Apply Franchise';

        return view('web/apply_franchise', $data);
    }

    /**
     * Franchise Verification Page
     */
    public function franchise_verification()
    {
        return view('web/franchise/franchise_verification');
    }

    /**
     * Authorisation Centre Page
     */
    public function authorisation_centre()
    {
        return view('web/franchise/authorisation_centre');
    }

    /**
     * Apply Franchise Form Action
     */
    public function apply_franchise_action()
    {
        // Validation Rules
        $validationRules = [
            'institute_name' => 'required|min_length[3]',
            'phone_number'   => 'required|min_length[10]|max_length[15]',
            'email'          => 'required|valid_email',
            'city'           => 'required',
            'own_institute'  => 'required'
        ];

        // Validate Form
        if (!$this->validate($validationRules)) {

            return redirect()->back()
                             ->withInput()
                             ->with('error', $this->validator->listErrors());
        }

        // Get Email
        $email = $this->sanitize($this->request->getPost('email'));

        // Check Duplicate Email
        if ($this->franchiseModel->is_duplicate_email($email)) {

            return redirect()->back()
                             ->withInput()
                             ->with('warning', 'Email already exists!');
        }

        // Prepare Data
        $data = [

            'institute_name'    => $this->sanitize($this->request->getPost('institute_name')),

            'phone_number'      => $this->sanitize($this->request->getPost('phone_number')),

            'email'             => $email,

            'city'              => $this->sanitize($this->request->getPost('city')),

            'own_institute'     => $this->sanitize($this->request->getPost('own_institute')),

            'available_space'   => $this->sanitize($this->request->getPost('available_space')),

            'preferred_courses' => $this->sanitize($this->request->getPost('preferred_courses')),

            'message'           => $this->sanitize($this->request->getPost('message')),

            'reg_date'          => date('Y-m-d'),

            'status'            => 0
        ];

        // Insert Data
        $result = $this->franchiseModel->insert($data);

        // Success / Error Message
        if ($result) {

            return redirect()->back()
                             ->with('success', 'Franchise Application Submitted Successfully');
        }

        return redirect()->back()
                         ->withInput()
                         ->with('error', 'Something went wrong. Please try again.');
    }

    /**
     * Study Centres Page
     */
    public function study_centres()
    {
        $data['franchise'] = $this->franchiseModel
                                  ->where('status', 1)
                                  ->findAll();

        $data['pagetitle'] = 'Study Centres';

        return view('web/study_centres', $data);
    }
}