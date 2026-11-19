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
        'whatsapp',
        'email',
        'course',
        'address',
        'pincode',
        'marksheet10',
        'marksheet12',
        'aadhaar',
        'photo',
        'otp_verified'
    ];
}