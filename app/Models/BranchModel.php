<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model
{
    protected $table            = 'branch_applications';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'institute_name',
        'phone_number',
        'email',
        'city',
        'own_institute',
        'available_space',
        'preferred_courses',
        'message'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'institute_name' => 'required|min_length[3]|max_length[255]',
        'phone_number'   => 'required|min_length[10]|max_length[15]',
        'email'          => 'required|valid_email|max_length[255]',
        'city'           => 'required|min_length[2]',
        'own_institute'  => 'required|in_list[Yes,No]',
    ];

    protected $validationMessages = [];
    protected $skipValidation     = false;
}