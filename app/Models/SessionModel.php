<?php

namespace App\Models;

use CodeIgniter\Model;

class SessionModel extends Model
{
    protected $table            = 'sessions';
    protected $allowedFields    = ['session','status','created_at'	];

}






