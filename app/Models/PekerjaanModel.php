<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaanModel extends Model
{
    protected $table = 'tbl_pekerjaan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['waktutarget', 'kuantitastarget'];

    public function getWaktuTarget($id_pekerjaan)
    {
        return $this->find($id_pekerjaan)['waktutarget'];
    }

    public function getKuantitasTarget($id_pekerjaan)
    {
        return $this->find($id_pekerjaan)['kuantitastarget'];
    }
}