<?php

namespace App\Models;

use CodeIgniter\Model;

class Certificate extends Model
{
    protected $table            = 'certificates';
    protected $allowedFields    = ['student_id', 'file', 'upload_user_id'];
}
