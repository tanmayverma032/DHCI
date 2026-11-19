<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'courses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['programid','name','duration','semester','course_fees', 'course_eligibility', 'admission_fees','thumbnail','modules','description','date','status','slug'];

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
 

     public function find_all()
    {  
        $ProgramModel = new \App\Models\ProgramModel(); 

        $all_data = $this->findAll();
        $courses = [];
        foreach ($all_data as $data) {
           $program = $ProgramModel->where("id", $data["programid"])->first();
                if (!empty($program)) {
                    $data += ["program" => $program];
                    $courses[] = $data; 

                } else {
                    $data += ["program" => $program];
                    $courses[] = $data; 
                }
            
        }
        return $courses;
    }

     public function find_by_id($id)
    {  
        $programModel = new \App\Models\ProgramModel(); 

        $data = $this->where("id", $id)->first();
        $courses = []; 
            $program = $programModel->where("id", $data["program_id"])->first();
            if (!empty($program)) {
                $data += ["program" => $program];
                $courses[] = $data; 

            } else {
                $data += ["program" => $program];
                $courses[] = $data; 
            }
 
        return $courses;
    }


    public function count_all()
    {
        return $this->countAll();
    }

  
    public function getCourseNameById($course_id)
    {
        return $this->select('name')->where('id', $course_id)->first();
    }

}






