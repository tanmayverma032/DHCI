<?php

namespace App\Models;

use CodeIgniter\Model;

class FranchiseModel extends Model
{
    protected $table            = 'franchises';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = [
        'branch_level', 'center_code', 'reg_date', 'state_id', 'district_id', 
        'pin_code', 'ins_address', 'institute_name', 'establishment', 'ins_status', 
        'ins_num', 'h_name', 'h_addres', 'email', 'h_number', 'hl_number', 
        'dob', 'gender', 'marital_status', 'h_qual', 'h_exp', 'pan_no', 
        'aadhar_no', 'gst_no', 'status', 'approval', 'photo', 'pan_photo', 
        'ins_photo', 'created_by', 'created_at', 'updated_at'
    ];

    protected $useTimestamps = true; // Automatically handles created_at and updated_at

    public function findAdmin($id) 
    {
        return $this->where("id", $id)->first();
    }

    public function find_all()
    {
        return $this->where("branch_level !=", 1)->orderBy("id", "DESC")->findAll();
    }

    public function all_branches()
    {
        return $this->where("approval", 1)->orderBy("branch_level", "ASC")->findAll();
    }

    public function count_all()
    {
        return $this->countAll();
    }

    public function find_by_id($id)
    {
        $stateModel = new \App\Models\StateModel(); 
        $data = $this->where("id", $id)->first();
        $franchise = [];

        if ($data) {
            $state = $stateModel->where("id", $data["state_id"] ?? null)->first();
            $data["state_name"] = $state;
            $franchise[] = $data;
            return $franchise[0];
        }

        return $franchise;
    }

    public function find_all_approved()
    {
        return $this->where("approval", 1)->where("center_code !=", "")->where("center_code !=", "0")->orderBy("institute_name", "ASC")->findAll();
    }

    public function study_centers()
    { 
        return $this->where("approval", 1)->orderBy("branch_level", "DESC")->findAll();
    }

    public function main_branch()
    { 
        return $this->where("approval", 1)->where("branch_level", 1)->first();
    }

    public function is_duplicate_email($email)
    {
       $response = $this->where("email", $email)->countAllResults();
       return $response > 0;
    }

    public function is_duplicate_email_update($email)
    {
       $response = $this->where("email", $email)->countAllResults();
       return $response > 1;
    }
}