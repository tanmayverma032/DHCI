<?php

namespace App\Models;

use CodeIgniter\Model;

class EventsModel extends Model
{
    protected $table      = 'events';   // Your database table name
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'description',
        'start_date',
        'end_date',
        'pdf_file'
    ];

    protected $useTimestamps = true; // optional if you have created_at & updated_at
}
