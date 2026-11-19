<?php

namespace App\Models;

use CodeIgniter\Model;

class StudyMaterialModel  extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'studymaterial';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'program_id',
    'course_id',
    'code',
    'name',
    'filepdf',
    'status',
    'semester',
    'created_at',
    'updated_at'];

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
        return $this->getStudyMaterials();
    }


    public function getByCourse($course_id)
    {
        return $this->where('course_id', $course_id)->findAll();
    }

    // public function getStudyMaterials()
    // {
    //     return $this->select('studymaterial.*, programs.title as program_name, courses.name as course_name')
    //                 ->join('programs', 'programs.id = studymaterial.program_id', 'left')
    //                 ->join('courses', 'courses.id = studymaterial.course_id', 'left')
    //                 ->findAll();
    // }

    public function getStudyMaterials()
    {
        return $this->select('studymaterial.*, programs.title as program_name, courses.name as course_name')
                    ->join('programs', 'programs.id = studymaterial.program_id', 'left')
                    ->join('courses', 'courses.id = studymaterial.course_id', 'left')
                    ->orderBy('studymaterial.id', 'DESC') // latest first
                    ->findAll();
    }
  

}






