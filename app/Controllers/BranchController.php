<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BranchModel;

class BranchController extends BaseController
{
    /**
     * Load the Franchise Application View Page
     */
    public function index()
    {
        return view('franchise');
    }

    /**
     * Handle Form Submission and Save Data
     */
    public function save()
    {
        $branchModel = new BranchModel();

        $postData = [
            'institute_name'    => $this->request->getPost('institute_name'),
            'phone_number'      => $this->request->getPost('phone_number'),
            'email'             => $this->request->getPost('email'),
            'city'              => $this->request->getPost('city'),
            'own_institute'     => $this->request->getPost('own_institute'),
            'available_space'   => $this->request->getPost('available_space'),
            'preferred_courses' => $this->request->getPost('preferred_courses'),
            'message'           => $this->request->getPost('message'),
        ];

        if (!$branchModel->insert($postData)) {
            $errors = $branchModel->errors();
            $errorMessage = !empty($errors) ? implode('<br>', $errors) : 'Failed to save application.';
            
            return redirect()->back()
                ->withInput()
                ->with('error', $errorMessage);
        }

        return redirect()->back()
            ->with('success', 'Your franchise application has been submitted successfully!');
    }

    /**
     * AJAX endpoint for fetching districts
     */
    public function getDistrictName()
    {
        $stateId = $this->request->getGet('state_id');

        if (!$stateId) {
            return $this->response->setJSON(['distric' => []]);
        }

        $db = \Config\Database::connect();
        
        $districts = $db->table('districts')
            ->where('state_id', $stateId)
            ->get()
            ->getResultArray();

        return $this->response->setJSON(['distric' => $districts]);
    }
}