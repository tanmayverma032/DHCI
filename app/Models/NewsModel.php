<?php

namespace App\Models;
use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title','department','publish_date',
        'pdf_file','is_new','status'
    ];
}
