<?php

namespace App\Models;

use CodeIgniter\Model;

class AdmissionModel extends Model
{
    protected $table = 'student_admissions';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'father_name',
        'mother_name',
        'phone',
        'dob',
        'address',
        'pincode',
        'marksheet_10',
        'marksheet_12',
        'aadhaar_card',
        'photo',
        'created_at'
    ];
}