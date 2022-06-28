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

    public function getAlllevel()
    {
        return $this
            ->table($this->table)
            ->select('id')
            ->select('nama_level')
            ->get()
            ->getResultArray();
    }
    public function getLastId()
    {
        return $this
            ->table($this->table)
            ->select('id')
            ->orderBy('id', 'DESC')
            ->first();
    }
}
