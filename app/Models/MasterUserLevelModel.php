<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterUserLevelModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'user_level';
    protected $allowedFields = ['nama_level'];

    public function getAllId()
    {
        return $this
            ->table($this->table)
            ->select('id')
            ->get()
            ->getResultArray();
    }
}
