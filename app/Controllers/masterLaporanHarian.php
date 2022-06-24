<?php

namespace App\Controllers;


class masterLaporanHarian extends BaseController
{
    protected $masterLaporanHarianModel;

    public function __construct()
    {
    }

    public function listLaporan()
    {
        $data = [
            'title' => 'List Laporan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Daftar Laporan'
        ];
        return view('laporanHarian/listLaporan', $data);
    }
    public function inputKegiatan()
    {
        $data = [
            'title' => 'Input Kegiatan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Input Kegiatan'
        ];
        return view('laporanHarian/inputKegiatan', $data);
    }
}
