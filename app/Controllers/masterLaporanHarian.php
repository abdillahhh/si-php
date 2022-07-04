<?php

namespace App\Controllers;

use App\Models\MasterLaporanHarianModel;
use App\Models\MasterTargetModel;

class masterLaporanHarian extends BaseController
{
    protected $masterLaporanHarianModel;
    protected $masterTargetModel;

    public function __construct()
    {
        $this->masterLaporanHarianModel = new masterLaporanHarianModel();
        $this->masterTargetModel = new masterTargetModel();
    }

    public function listLaporan()
    {
        $data = [
            'title' => 'List Laporan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Daftar Laporan',
            'list_laporan_harian' => $this->masterLaporanHarianModel->getAll(session('user_id')),
            'list_target' => $this->masterTargetModel->getAll(),
        ];

        return view('laporanHarian/listLaporan', $data);
    }
    public function inputKegiatan()
    {
        $data = [
            'title' => 'Input Kegiatan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Input Kegiatan',
            'list_target' => $this->masterTargetModel->getAll(),
        ];

        return view('laporanHarian/inputKegiatan', $data);
    }
    public function saveLaporanHarian()
    {

        $this->masterLaporanHarianModel->save([
            'user_id' => session('user_id'),
            'judul_kegiatan' => $this->request->getVar('judul_kegiatan'),
            'tgl_kegiatan' => $this->request->getVar('tgl_kegiatan'),
            'waktu_mulai' => $this->request->getVar('waktu_mulai'),
            'waktu_selesai' => $this->request->getVar('waktu_selesai'),
            'uraian_kegiatan' => $this->request->getVar('uraian_kegiatan'),
            'hasil_kegiatan' => $this->request->getVar('hasil_kegiatan'),
            'kd_target' => $this->request->getVar('kd_target'),
            'bukti_dukung' => $this->request->getVar('bukti_dukung'),
            'status' => $this->request->getVar('status'),
        ]);
        return redirect()->to('/listLaporan');
    }

    public function detailKegiatan()
    {
        $data = [
            'title' => 'Detail Kegiatan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Daftar Laporan'
        ];
        return view('laporanHarian/detailKegiatan', $data);
    }

    public function updateLaporanHarian()
    {
        $this->masterLaporanHarianModel->save([
            'id' => $this->request->getVar('id_kegiatan'),
            'user_id' => session('user_id'),
            'judul_kegiatan' => $this->request->getVar('judul_kegiatan'),
            'tgl_kegiatan' => $this->request->getVar('tgl_kegiatan'),
            'waktu_mulai' => $this->request->getVar('waktu_mulai'),
            'waktu_selesai' => $this->request->getVar('waktu_selesai'),
            'uraian_kegiatan' => $this->request->getVar('uraian_kegiatan'),
            'hasil_kegiatan' => $this->request->getVar('hasil_kegiatan'),
            'kd_target' => $this->request->getVar('kd_target'),
            'bukti_dukung' => $this->request->getVar('bukti_dukung'),
            'status' => $this->request->getVar('status'),
        ]);
        return redirect()->to('/listLaporan');
    }
}
