<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterLaporanPekerjaanModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'tbl_pekerjaan';
    protected $allowedFields = ['kdes3','kdes4','created_by', 'waktutarget', 'satuan','kdkerjaan','kuantitastarget','kuantitasrealisasi','wakturealisasi','statuspenyelesaian'];

    //Get dari tabel pekerjaan
    public function getAllPekerjaan()
    {
        return $this
            ->table($this->table)
            ->select('*')
            ->get()
            ->getResultArray();
    }
    public function getAll($user_id)
    {
        return $this
            ->table($this->table)
            ->select('*')
            ->where('created_by', $user_id)
            ->get()
            ->getResultArray();
    }

    public function getAllByUser($user_id)
    {

        return $this
            ->table($this->table)
            ->where('created_by', $user_id)
            ->orderBy('waktutarget', 'DESC');
    }


    public function getTotalProvinsi($user_id)
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('mst_pekerjaan');

        // $subquery = $this->db->table('tbl_pekerjaan_child')
        //     ->select('id_pekerjaan, SUM(kuantitasrealisasi) AS kuantitasrealisasi, wakturealisasi')
        //     ->groupBy('id_pekerjaan');
        $subquery = '(SELECT id_pekerjaan, SUM(kuantitasrealisasi) AS kuantitasrealisasi, MAX(wakturealisasi) as wakturealisasi FROM tbl_pekerjaan_child GROUP BY id_pekerjaan) AS subquery';

        $a =  $this
            ->table($this->table)
            ->select('tbl_pekerjaan.*,mst_pekerjaan.nmkerjaan,kuantitasrealisasi,wakturealisasi')
            ->join('mst_pekerjaan','mst_pekerjaan.id = tbl_pekerjaan.kdkerjaan','left')
            ->join($subquery,'tbl_pekerjaan.id = subquery.id_pekerjaan','left')
            ->where('tbl_pekerjaan.created_by', $user_id)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    // dd($a);
        return $a;
    }

    public function getTotalProvinsiByFungsi($user_es3)
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('mst_pekerjaan');

        // $subquery = $this->db->table('tbl_pekerjaan_child')
        //     ->select('id_pekerjaan, SUM(kuantitasrealisasi) AS kuantitasrealisasi, wakturealisasi')
        //     ->groupBy('id_pekerjaan');
        $subquery = '(SELECT id_pekerjaan, COALESCE(SUM(kuantitasrealisasi),0) AS kuantitasrealisasi, MAX(wakturealisasi) as wakturealisasi FROM tbl_pekerjaan_child GROUP BY id_pekerjaan) AS subquery';

        $a =  $this
            ->table($this->table)
            ->select('tbl_pekerjaan.*,mst_pekerjaan.nmkerjaan,kuantitasrealisasi,wakturealisasi,(kuantitasrealisasi/kuantitastarget*100) as percentage')
            ->join('mst_pekerjaan','mst_pekerjaan.id = tbl_pekerjaan.kdkerjaan','left')
            ->join($subquery,'tbl_pekerjaan.id = subquery.id_pekerjaan','left')
            ->where('tbl_pekerjaan.kdes3', $user_es3)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    // dd($a);
        return $a;
    }

    public function getTotalByUserDate($tgl_awal, $tgl_akhir, $user_id)
    {
        return $this
            ->table($this->table)
            ->where('created_by', $user_id)
            ->where('waktutarget >=', $tgl_awal)
            ->where('waktutarget <=', $tgl_akhir)
            ->orderBy('waktutarget', 'ASC')
            ->get()
            ->getResultArray();
    }




    public function getAllYear($user_id)
    {
        return $this
            ->table($this->table)
            ->select('waktutarget')
            ->where('created_by', $user_id)
            ->get()
            ->getResultArray();
    }


    public function getLaporan($user_id, $laporan_id)
    {
        return $this
            ->table($this->table)
            ->select('tbl_pekerjaan.id,mst_pekerjaan.nmkerjaan,tbl_pekerjaan.created_at,tbl_pekerjaan.updated_at, tbl_pekerjaan_child.bukti, tbl_pekerjaan_child.kuantitastarget,tbl_pekerjaan.waktutarget,tbl_pekerjaan_child.statuspenyelesaiiantarget,tbl_pekerjaan_child.statuspenyelesaiianwaktu,tbl_pekerjaan_child.kdsatker,mst_satker.satker,tbl_pekerjaan_child.kuantitasrealisasi,tbl_pekerjaan_child.wakturealisasi  ,tbl_pekerjaan_child.statusverifikasi')
            ->join('mst_pekerjaan','mst_pekerjaan.id = tbl_pekerjaan.kdkerjaan','left')
            ->join('tbl_pekerjaan_child','tbl_pekerjaan.id = tbl_pekerjaan_child.id_pekerjaan')
            ->join('mst_satker','mst_satker.kd_satker = tbl_pekerjaan_child.kdsatker','left')
            ->where('tbl_pekerjaan.created_by', $user_id)
            ->where('tbl_pekerjaan.id', $laporan_id)
            ->get()
            ->getResultArray();
    }

    public function getMaxDate($user_id)
    {
        return $this
            ->table($this->table)
            ->select('waktutarget')
            ->orderBy('waktutarget', 'DESC')
            ->where('created_by', $user_id)
            ->get()
            ->getRowArray();
    }


    public function search($user_id, $keyword)
    {
        return $this
            ->table($this->table)
            ->where('created_by', $user_id)
            ->where('waktutarget', $keyword);
    }


    public function getUserIdbyLaporanId($laporan_id)
    {
        return $this
            ->table($this->table)
            ->select('created_by')
            ->where('id', $laporan_id)
            ->get()
            ->getRowArray();
    }

    //Get dari tabel master pekerjaan
    public function getMasterPekerjaan()
    {
        return $this
            ->table($this->table_mst)
            ->select('*')
            ->get()
            ->getResultArray();
    }

    public function getMasterPekerjaanByUser($user_level, $user_es3, $user_es4)
    
    {
        $db = \Config\Database::connect();
        $builder = $db->table('mst_pekerjaan');
        

        if ($user_level == 5) {
            return $builder
                ->select('*')
                ->where('kdes3',$user_es3)
                ->get()
                ->getResultArray();
        } else {
            
            $a = $builder
            ->select('*')
            ->where('kdes4',$user_es4)
            ->get()
            ->getResultArray();
            return $a;

            
        }
    }

    public function countByFungsi($year, $month)
    {
        $subquery = "(SELECT kdes3, COUNT(tbl_pekerjaan.kdes3) as count, created_at 
        FROM tbl_pekerjaan
        WHERE YEAR(created_at) = '$year' AND MONTH(created_at) = '$month' 
        GROUP BY kdes3) as a";
        
        $builder = $this->db->table('mst_es3');
        $builder->select('kd_es3, count');
        $builder->join($subquery, 'a.kdes3 = mst_es3.kd_es3', 'left');
        $builder->groupBy('kd_es3');

        $result = $builder->get()->getResultArray();

        // $data = [];
        // foreach ($result as $row) {
        //     $data[$row->kd_satker] = $row->count;
        // }

        return $result;

        // return $this->table($this->table)
        //     ->select('mst_satker.kd_satker,COUNT(*) as total_pekerjaan')
        //     ->join('mst_satker','mst_satker.kd_satker = tbl_pekerjaan_child.kdsatker','left')
        //     ->groupBy('kdsatker')
        //     ->get()
        //     ->getResultArray();
    }

    public function savePenyelesaian($id, $penyelesaian)
    {
        $this->where('id', $id)
            ->set(['statuspenyelesaian' => $penyelesaian])
            ->update();
    }

    public function totalByPenyelesaian($year, $month)
    {
        $builder = $this->db->table('tbl_pekerjaan');
        $builder->select('statuspenyelesaian, COUNT(*) as count')
                ->where('YEAR(tbl_pekerjaan.created_at)', $year)
                ->where('MONTH(tbl_pekerjaan.created_at)', $month)
                ->groupBy('statuspenyelesaian');
        
        $result = $builder->get()->getResultArray();
    
        return $result;
    }

    public function countByFungsiAll()
    {
        $builder = $this->db->table('mst_es3');
        $builder->select('kd_es3, COUNT(tbl_pekerjaan.kdes3) as count');
        $builder->join('tbl_pekerjaan', 'tbl_pekerjaan.kdes3 = mst_es3.kd_es3', 'left');
        $builder->groupBy('kd_es3');

        $result = $builder->get()->getResultArray();

        // $data = [];
        // foreach ($result as $row) {
        //     $data[$row->kd_satker] = $row->count;
        // }

        return $result;

        // return $this->table($this->table)
        //     ->select('mst_satker.kd_satker,COUNT(*) as total_pekerjaan')
        //     ->join('mst_satker','mst_satker.kd_satker = tbl_pekerjaan_child.kdsatker','left')
        //     ->groupBy('kdsatker')
        //     ->get()
        //     ->getResultArray();
    }

    public function totalByPenyelesaianAll()
    {
        $builder = $this->db->table('tbl_pekerjaan');
        $builder->select('statuspenyelesaian, COUNT(*) as count')
                ->groupBy('statuspenyelesaian');
        
        $result = $builder->get()->getResultArray();
    
        return $result;
    }

}
