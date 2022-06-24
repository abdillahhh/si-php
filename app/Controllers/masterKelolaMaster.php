<?php

namespace App\Controllers;


class masterKelolaMaster extends BaseController
{
    protected $masterKelolaMasterModel;

    public function __construct()
    {
    }

    // MASTER USER
    public function masterUser()
    {
        $data = [
            'title' => 'Master User',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master User'
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
}
