<?php

namespace App\Models;

use CodeIgniter\Model;

class Liveclass extends Model
{
    protected $table            = 'liveclasses';
    protected $allowedFields    = ['metting_name', 'branch_id', 'session_id', 'batch_id', 'metting_date', 'metting_time', 'duration', 'metting_link', 'discription', 'status'];


    public function getAlldata()
    {
        return $this->db->table('liveclasses')
            ->join('sessions', 'sessions.id = liveclasses.session_id', 'left')
            ->join('franchises', 'franchises.id = liveclasses.branch_id', 'left')
            ->join('batches', 'batches.id = liveclasses.batch_id', 'left')
            ->get()
            ->getResultArray();
    }
}
