<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterUserModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'tbl_user';
    protected $allowedFields = ['username', 'fullname', 'email', 'password', 'token', 'level_id', 'image', 'nip_lama_user',  'is_active'];

    public function get_data_login($username, $tbl)
    {
        $builder = $this->db->table($tbl);
        $builder->where('username', $username);
        $log = $builder->get()->getRow();
        return $log;
    }

    public function getUser($username)
    {
        return $this
            ->table('tbl_user')
            ->where('username', $username)
            ->first();
    }

  
}
