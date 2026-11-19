<?php

namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    protected $table         = 'course_enquiries';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'email', 'phone', 'course', 'message', 'created_at', 'updated_at'];
}
