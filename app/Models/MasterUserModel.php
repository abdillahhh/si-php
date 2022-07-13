<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterUserModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'tbl_user';
    protected $allowedFields = ['username', 'fullname', 'email', 'password', 'token', 'image', 'nip_lama_user',  'is_active'];

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

    public function getProfilUser($user_id)
    {
        return $this
            ->table('tbl_user')
            ->where('id', $user_id)
            ->first();
    }

    public function getAllUser()
    {
        return $this
            ->table('tbl_user')
            ->get()
            ->getResultArray();
    }
}
