<?php

namespace App\Controllers;

use App\Models\MasterPegawaiModel;
use App\Models\MasterUserModel;


class masterKelolaMaster extends BaseController
{
    protected $masterKelolaMasterModel;
    protected $masterPegawaiModel;

    public function __construct()
    {
        $this->masterUserModel = new masterUserModel();
        $this->masterPegawaiModel = new MasterPegawaiModel();
    }

    // MASTER USER
    public function masterUser()
    {
        $list_user = $this->masterUserModel->getAllUser();
        //dd($list_user);


        $data = [
            'title' => 'Master User',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master User',
            'list_user' => $list_user
        ];
        return view('kelolaMaster/masterUser', $data);
    }

    // MASTER PEGAWAI
    public function masterPegawai()
    {
        $data = [
            'title' => 'Master Pegawai',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master Pegawai'
        ];
        return view('kelolaMaster/masterPegawai', $data);
    }

    // MASTER KEGIATAN
    public function masterKegiatan()
    {
        $data = [
            'title' => 'Master Kegiatan',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master Kegiatan'
        ];
        return view('kelolaMaster/masterKegiatan', $data);
    }

    // TAMBAH USER
    public function tambahUser()
    {
        $data = [
            'title' => 'Tambah User',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master User'
        ];
        return view('kelolaMaster/tambahUser', $data);
    }

    public function get_autofillPegawai()
    {
        $model = new MasterPegawaiModel();

        $request = \Config\Services::request();
        $kode = $request->getPostGet('term');
        $pegawai = $model
            ->like('nama_pegawai', $kode)
            ->orderBy('nama_pegawai', 'ASC')
            ->findAll();
        $hasil = array();
        foreach ($pegawai as $rt) :
            $hasil[] = [
                "label" => $rt['nama_pegawai']
            ];
        endforeach;
        echo json_encode($hasil);
    }
}
