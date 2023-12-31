<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterPekerjaanModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'mst_pekerjaan';
    protected $allowedFields = ['kdes3','kdes4','nmkerjaan'];

    public function getProfilPegawai($nip_lama_user)
    {
        return $this
            ->table($this->table)
            ->select('mst_pegawai.*,mst_gol.*,mst_pendidikan.*,mst_satker.*,mst_fungsional.*,mst_es3.*,mst_es4.*,mst_jabatan.*')
            ->where('mst_pegawai.nip_lama', $nip_lama_user)
            ->join('mst_gol', 'mst_gol.id = mst_pegawai.gol_kd')
            ->join('mst_pendidikan', 'mst_pendidikan.kd_pendidikan = mst_pegawai.pendidikan_kd')
            ->join('mst_satker', 'mst_satker.kd_satker = mst_pegawai.satker_kd')
            ->join('mst_fungsional', 'mst_fungsional.id = mst_pegawai.fungsional_kd')
            ->join('mst_jabatan', 'mst_jabatan.id = mst_pegawai.jabatan_kd')
            ->join('mst_es3', 'mst_es3.kd_es3 = mst_pegawai.es3_kd')
            ->join('mst_es4', 'mst_es4.kd_es4 = mst_pegawai.es4_kd')
            ->get()
            ->getRowArray();
    }


    public function getProfilCetak($nip_lama_user)
    {
        return $this
            ->table($this->table)
            ->select('mst_pegawai.*,mst_fungsional.*,mst_satker.*')
            ->where('mst_pegawai.nip_lama', $nip_lama_user)
            ->join('mst_fungsional', 'mst_fungsional.id = mst_pegawai.fungsional_kd')
            ->join('mst_satker', 'mst_satker.kd_satker = mst_pegawai.satker_kd')
            ->get()
            ->getRowArray();
    }

    public function getDetailPegawaiById($id_pegawai)
    {
        return $this
            ->table($this->table)
            ->select('mst_pegawai.*,mst_gol.*,mst_pendidikan.*,mst_satker.*,mst_fungsional.*,mst_es3.*,mst_es4.*,mst_jabatan.*')
            ->where('mst_pegawai.id', $id_pegawai)
            ->join('mst_gol', 'mst_gol.id = mst_pegawai.gol_kd')
            ->join('mst_pendidikan', 'mst_pendidikan.kd_pendidikan = mst_pegawai.pendidikan_kd')
            ->join('mst_satker', 'mst_satker.kd_satker = mst_pegawai.satker_kd')
            ->join('mst_fungsional', 'mst_fungsional.id = mst_pegawai.fungsional_kd')
            ->join('mst_jabatan', 'mst_jabatan.id = mst_pegawai.jabatan_kd')
            ->join('mst_es3', 'mst_es3.kd_es3 = mst_pegawai.es3_kd')
            ->join('mst_es4', 'mst_es4.kd_es4 = mst_pegawai.es4_kd')
            ->get()
            ->getRowArray();
    }

    public function getAllPekerjaan()
    {
        return $this
            ->table($this->table)
            ->select('mst_pekerjaan.*,mst_es3.deskripsi as fungsi,mst_es4.deskripsi as subfungsi')
            ->join('mst_es3','mst_es3.kd_es3 = mst_pekerjaan.kdes3')
            ->join('mst_es4','mst_es4.kd_es4 = mst_pekerjaan.kdes4')
            ->get()
            ->getResultArray();
    }

    public function getAllPekerjaanbyFungsi($es3)
    {
        return $this
            ->table($this->table)
            ->select('mst_pekerjaan.*,mst_es3.deskripsi as fungsi,mst_es4.deskripsi as subfungsi')
            ->join('mst_es3','mst_es3.kd_es3 = mst_pekerjaan.kdes3')
            ->join('mst_es4','mst_es4.kd_es4 = mst_pekerjaan.kdes4')
            ->where('kdes3',$es3)
            ->get()
            ->getResultArray();
    }

    public function getAllPekerjaanbySubFungsi($es4)
    {
        return $this
            ->table($this->table)
            ->select('mst_pekerjaan.*,mst_es3.deskripsi as fungsi,mst_es4.deskripsi as subfungsi')
            ->join('mst_es3','mst_es3.kd_es3 = mst_pekerjaan.kdes3')
            ->join('mst_es4','mst_es4.kd_es4 = mst_pekerjaan.kdes4')
            ->where('kdes4',$es4)
            ->get()
            ->getResultArray();
    }

    public function getAllPegawaiOnDashboard()
    {
        return $this
            ->table('mst_pegawai')
            ->where('satker_kd', 1500)
            ->get()
            ->getResultArray();
    }

    public function getAllPegawaiBySatker($satker_kd)
    {
        return $this
            ->table('mst_pegawai')
            ->where('satker_kd', $satker_kd)
            ->get()
            ->getResultArray();
    }


    public function getPegawaiById($id_pegawai)
    {
        return $this
            ->table('mst_pegawai')
            ->where('id', $id_pegawai)
            ->get()
            ->getRowArray();
    }

    
    public function getPegawaiByNipLama($nip_lama)
    {
        return $this
            ->table('mst_pegawai')
            ->select('*')
            ->where('nip_lama', $nip_lama)
            ->get()
            ->getRowArray();
    }

    public function getNipLama($id_pegawai)
    {
        return $this
            ->table('mst_pegawai')
            ->select('nip_lama')
            ->where('id', $id_pegawai)
            ->get()
            ->getRowArray();
    }



    public function search($keyword)
    {
        return $this
            ->table('mst_pekerjaan')
            ->like('nip_lama', $keyword)
            ->orLike('nip_baru', $keyword)
            ->orLike('nama_pegawai', $keyword)
            ->orLike('ket_jabatan', $keyword)
            ->get()
            ->getResultArray();
    }


    public function getAllPegawaiOnBidang($satker_kd, $es3_kd)
    {
        if (intval($es3_kd) != 0) {
            return $this
                ->table('tbl_user.*,mst_pegawai.*')
                ->where('mst_pegawai.satker_kd', $satker_kd)
                ->where('mst_pegawai.es3_kd', $es3_kd)
                ->join('tbl_user', 'mst_pegawai.nip_lama = tbl_user.nip_lama_user')
                ->get()
                ->getResultArray();
        } else {
            return $this
                ->table('tbl_user.*,mst_pegawai.*')
                ->where('mst_pegawai.satker_kd', $satker_kd)
                ->join('tbl_user', 'mst_pegawai.nip_lama = tbl_user.nip_lama_user')
                ->get()
                ->getResultArray();
        }
    }
}
