<?php 
namespace App\Models;

use CodeIgniter\Model;

class BatchModel extends Model
{
    protected $table            = 'batches';
    protected $allowedFields    = ['session_id', 'status', 'batch_name', 'batch_code'];

    public function getAllBatch()
    {
        return $this->db->table('batches')
            ->join('sessions', 'sessions.id = batches.session_id', 'left')
            ->get()
            ->getResultArray();
    }
}
