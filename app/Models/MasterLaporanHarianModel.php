<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterLaporanHarianModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'mst_laporanharian';
    protected $allowedFields = ['user_id', 'judul_kegiatan', 'tgl_kegiatan', 'waktu_mulai', 'waktu_selesai', 'uraian_kegiatan', 'hasil_kegiatan', 'kd_target', 'bukti_dukung', 'status'];


    public function getAll($user_id)
    {
        return $this
            ->table($this->table)
            ->select('*')
            ->where('user_id', $user_id)
            ->get()
            ->getResultArray();
    }
}
