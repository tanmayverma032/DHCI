<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'registrations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['certificate_status','payment_status','rag_no','center_id','course_id','session_id','batch_id','name','father_name','mother_name','dob','email','number','religion','gender','category','qualification','idcard_type','id_card_no','state_id','district_id','pincode','address','photo','reg_date','status','password','created_at','updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

 

    public function getCourseName($course_id)
    {
        $courseModel = new CourseModel();
        $course = $courseModel->getCourseNameById($course_id);

        if ($course) {
            return $course['name'];
        } else {
            return "Course not found";
        }
    }

    

    public function is_duplicate_email($email)
    {
       $response = $this->where("email_address", $email)->countAllResults();

       if ($response > 0) {

        return true;
           
       } else {

        return false;

       }
    }

    public function is_duplicate_email_update($email)
    {
       $response = $this->where("email_address", $email)->countAllResults();

       if ($response > 1) {

        return true;
           
       } else {

        return false;

       }
    }


    public function find_by_status($status)
    {

        $courseModel = new \App\Models\CourseModel(); 

        $is_admin = is_admin();

        if ($is_admin["role"] == 1) {
            $all_data = $this->where("approval", $status)->findAll();
             if ($status == 0) {
            $all_data = $this->where("approval", 0)->findAll();
         }
        } else {
            $center = new \App\Models\FranchiseModel(); 
            $center_id = $center->where("center_code", $is_admin["admin"]["user_name"])->first();

            $all_data = $this->where("approval", $status)->where("study_center", $center_id["id"])->findAll();
             if ($status == 0) {
            $all_data = $this->where("approval", 0)->where("study_center", $center_id["id"])->findAll();
        }
      }

        
       
        $registrations = [];
        foreach ($all_data as $data) {
           $course = $courseModel->where("id", $data["course"])->first();
           $franchiseModel = new \App\Models\FranchiseModel(); 
           $study_center_info = $franchiseModel->where("id", $data["study_center"])->first();
              
                    $data += ["course_info" => $course];
                    $data += ["study_center_info" => $study_center_info];
                    $registrations[] = $data; 
            
        }
         return $registrations;        
    }


    public function find_all()
    {  
        $courseModel = new \App\Models\CourseModel(); 
        $franchiseModel = new \App\Models\FranchiseModel(); 

        $is_admin = is_admin();

        if ($is_admin["role"] == 1) {
             $all_data = $this->findAll();
        } else {
            $center = new \App\Models\FranchiseModel(); 
            $center_id = $center->where("center_code", $is_admin["admin"]["user_name"])->first(); 
            $all_data = $this->where("study_center", $center_id["id"])->findAll();
             
      }
 
        $registrations = [];
        foreach ($all_data as $data) {
           $course = $courseModel->where("id", $data["course"])->first();

           $franchiseModel = new \App\Models\FranchiseModel(); 
           $study_center_info = $franchiseModel->where("id", $data["study_center"])->first();
              
                    $data += ["course_info" => $course];
                    $data += ["study_center_info" => $study_center_info];
                    $registrations[] = $data; 

                


            
        }
         return $registrations;
    }



public function find_all_by_branch($branch_id)
{
    $courseModel = new \App\Models\CourseModel(); 

        $is_admin = is_admin();

        if ($is_admin["role"] == 1) {
             $all_data = $this->where("study_center", $branch_id)->findAll();
        } else {
            $center = new \App\Models\FranchiseModel(); 
            $center_id = $center->where("center_code", $is_admin["admin"]["user_name"])->first(); 
            $all_data = $this->where("study_center", $center_id["id"])->findAll();
             
      }
 
        $registrations = [];
        foreach ($all_data as $data) {
           $course = $courseModel->where("id", $data["course"])->first();
           $franchiseModel = new \App\Models\FranchiseModel(); 
           $study_center_info = $franchiseModel->where("id", $data["study_center"])->first();
              
                    $data += ["course_info" => $course];
                    $data += ["study_center_info" => $study_center_info];
                    $registrations[] = $data; 
            
        }
         return $registrations;
}















    public function find_by_user_id($id)
    {  
        $courseModel = new \App\Models\CourseModel(); 
        $religionModel = new \App\Models\ReligionModel(); 
        $franchiseModel = new \App\Models\FranchiseModel(); 
        $stateModel = new \App\Models\StateModel(); 

        $data = $this->where("id", $id)->first();
        $registrations = [];

        $is_admin = is_admin();

        $data = $this->where("id", $id)->first();

        if ($data) {
           $course = $courseModel->where("id", $data["course"])->first();
            if (!empty($course)) {
                $data += ["course_info" => $course]; 

            } else {
                $data += ["course_info" => $course]; 
            }

            $religion = $religionModel->where("id", $data["religion"])->first();
            if (!empty($religion)) {
                $data += ["religion_info" => $religion]; 

            } else {
                $data += ["religion_info" => $religion]; 
            }

            $study_center = $franchiseModel->where("id", $data["study_center"])->first();
            if (!empty($study_center)) {
                $data += ["study_center_info" => $study_center];


            $state = $stateModel->where("id", $study_center["state"])->first();
            if (!empty($state)) {
                $data += ["study_center_state" => $state]; 

            } else {
                $data += ["study_center_state" => $state]; 
            }


                $registrations[] = $data; 

            } else {
                $data += ["study_center_info" => $study_center]; 
                $registrations[] = $data; 
            }
            return $registrations[0]; 

        } else {

            return $registrations;
        }
         
    }









    public function find_by_id($id)
    {  
        $courseModel = new \App\Models\CourseModel(); 
        $religionModel = new \App\Models\ReligionModel(); 
        $franchiseModel = new \App\Models\FranchiseModel(); 
        $stateModel = new \App\Models\StateModel(); 

        $data = $this->where("id", $id)->first();
        $registrations = [];

        $is_admin = is_admin();

        if ($is_admin["role"] == 1) {
             $data = $this->where("id", $id)->first();
        } else {
            $center = new \App\Models\FranchiseModel(); 
            $center_id = $center->where("center_code", $is_admin["admin"]["user_name"])->first(); 

            $data = $this->where("study_center", $center_id["id"])->where("id", $id)->first();
        }

        if ($data) {
           $course = $courseModel->where("id", $data["course"])->first();
            if (!empty($course)) {
                $data += ["course_info" => $course]; 

            } else {
                $data += ["course_info" => $course]; 
            }

            $religion = $religionModel->where("id", $data["religion"])->first();
            if (!empty($religion)) {
                $data += ["religion_info" => $religion]; 

            } else {
                $data += ["religion_info" => $religion]; 
            }

            $study_center = $franchiseModel->where("id", $data["study_center"])->first();
            if (!empty($study_center)) {
                $data += ["study_center_info" => $study_center];


            $state = $stateModel->where("id", $study_center["state"])->first();
            if (!empty($state)) {
                $data += ["study_center_state" => $state]; 

            } else {
                $data += ["study_center_state" => $state]; 
            }


                $registrations[] = $data; 

            } else {
                $data += ["study_center_info" => $study_center]; 
                $registrations[] = $data; 
            }
            return $registrations[0]; 

        } else {

            return $registrations;
        }
         
    }


    public function find_by_u_id($id)
    {  
        $courseModel = new \App\Models\CourseModel(); 
        $religionModel = new \App\Models\ReligionModel(); 
        $franchiseModel = new \App\Models\FranchiseModel(); 
        $stateModel = new \App\Models\StateModel(); 
 
        $registrations = [];
 
        $data = $this->where("id", $id)->first();
        
        if ($data) {
           $course = $courseModel->where("id", $data["course"])->first();
            if (!empty($course)) {
                $data += ["course_info" => $course]; 

            } else {
                $data += ["course_info" => $course]; 
            }

            $religion = $religionModel->where("id", $data["religion"])->first();
            if (!empty($religion)) {
                $data += ["religion_info" => $religion]; 

            } else {
                $data += ["religion_info" => $religion]; 
            }

            $study_center = $franchiseModel->where("id", $data["study_center"])->first();
            if (!empty($study_center)) {
                $data += ["study_center_info" => $study_center];


            $state = $stateModel->where("id", $study_center["state"])->first();
            if (!empty($state)) {
                $data += ["study_center_state" => $state]; 

            } else {
                $data += ["study_center_state" => $state]; 
            }


                $registrations[] = $data; 

            } else {
                $data += ["study_center_info" => $study_center]; 
                $registrations[] = $data; 
            }
            return $registrations[0]; 

        } else {

            return $registrations;
        }
         
    }















    public function is_duplicate_registration_no($regno, $id)
    {
        $response = $this->where("registration_no", $regno)->where("id !=", $id)->first();

        if (empty($response)) {
            return false;
        }

        else {
            return true;
        }
        
    }


    public function is_duplicate_registration_no_add($regno)
    {
        $response = $this->where("registration_no", $regno)->first();

        if (empty($response)) {
            return false;
        }

        else {
            return true;
        }
        
    }

    public function is_this_franchise_student($id)
    {
        $response = $this->where("id", $id)->first();

        $franchiseModel = new \App\Models\FranchiseModel(); 

        $franchise = $franchiseModel->where("center_code", is_admin()["admin"]["user_name"])->first();

        if (!empty($response)) {
           if ($franchise["id"] == $response["study_center"]) {
            return true;
           } else {
            return false;
           }
        }

        else {
            return false;
        }
    }


    public function count_all()
    {
        return $this->countAll();
    }


 


}
