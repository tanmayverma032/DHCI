<?php

namespace App\Models;

class ApplyFranchiseModel extends \CodeIgniter\Model
{
   protected $table = 'franchises';

protected $allowedFields = [
    'institute_name',
    'phone_number',
    'email',
    'city',
    'own_institute',
    'available_space',
    'preferred_courses',
    'message',
    'reg_date',
    'status'
];
    public function findAdmin ($id) {

    	$response = $this->where("id", $id)->first();
    	
        return $response;
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
           $state = $stateModel->where("id", $data["state"])->first();
                if (!empty($state)) {
                    $data += ["state_name" => $state];
                    $franchise[] = $data; 

                } else {
                    $data += ["state_name" => $state];
                    $franchise[] = $data; 
                }
                return $franchise[0];
            
            } else {
                return $franchise;
             
        }
    }

    public function find_all_approved ()
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
       if ($response > 0) {
            return true; 
       } else {
            return false;
       }
    }

    public function is_duplicate_email_update($email)
    {
       $response = $this->where("email", $email)->countAllResults();

       if ($response > 1) {

        return true;
           
       } else {

        return false;

       }
    }

}
   


//  CREATE TABLE `admin` (
//   `id` int(254) NOT NULL AUTO_INCREMENT,
//   `first_name` varchar(222) NOT NULL,
//   `last_name` varchar(222) NOT NULL,
//   `institute_name` varchar(222) NOT NULL,
//   `state` varchar(222) NOT NULL,
//   `district` varchar(222) NOT NULL,
//   `block` varchar(222) NOT NULL,
//   `town_city` varchar(222) NOT NULL,
//   `pincode` varchar(222) NOT NULL,
//   `email` varchar(222) NOT NULL,
//   `phone` varchar(222) NOT NULL,
//   `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
//   PRIMRY KEY(id)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;