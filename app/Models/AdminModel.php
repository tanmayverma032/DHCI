<?php

namespace App\Models;

class AdminModel extends \CodeIgniter\Model
{
    protected $table = 'users';
    
    protected $allowedFields = [ 'branch_id', 'center_code', 'user_name', 'password', 'email', "role", "status"];

    public function findAdmin ($id) {

    	$response = $this->where("id", $id)->first();
    	
        return $response;
    }

    public function is_unique_username($username)
    {
        $result = $this->where("center_code", $username)->countAllResults();
        if ($result > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function count_all()
    {
        return $this->where("role !=", 1)->countAll();
    }

}
