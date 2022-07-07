<?php

namespace App\Controllers;

use App\Models\MasterLaporanHarianModel;
use App\Models\MasterSatuanModel;

class masterLaporanHarian extends BaseController
{
    protected $masterLaporanHarianModel;
    protected $masterSatuanModel;

    public function __construct()
    {
        $this->masterLaporanHarianModel = new masterLaporanHarianModel();
        $this->masterSatuanModel = new masterSatuanModel();
    }

    public function listLaporan()
    {
        $list_laporan_harian = $this->masterLaporanHarianModel->getAll(session('user_id'));
        $data = [
            'title' => 'List Laporan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Daftar Laporan',
            'list_laporan_harian' => $list_laporan_harian,

            'list_satuan' => $this->masterSatuanModel->getAll(),
        ];
        //dd($data);

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
        $tanggal = $this->request->getVar('tanggal');
        $field_uraian = $this->request->getVar('field_uraian');
        $field_jumlah = $this->request->getVar('field_jumlah');
        $field_satuan = $this->request->getVar('field_satuan');
        $field_hasil = $this->request->getVar('field_hasil');

        for ($i = 1; $i <= count($field_uraian); $i++) {
            $field_bukti[] = $this->request->getFileMultiple('field_bukti' . $i);
        }

        $data_user = session('data_user');
        $folderNIP = $data_user['nip_lama_user'];
        $dirname = 'C:\xampp\htdocs\siphp\berkas/' . $folderNIP . '/' . $tanggal;

        if (!file_exists($dirname)) {
            mkdir('C:\xampp\htdocs\siphp\berkas/' . $folderNIP . '/' . $tanggal, 0777, true);
        } else {
            return redirect()->to('/listLaporan'); ///buat alert bahwa hari telah diinputkan
        }


        for ($h = 0; $h < count($field_bukti); $h++) {
            for ($i = 0; $i < count($field_bukti[$h]); $i++) {
                for ($j = 0; $j < count($field_bukti[$h]); $j++) {
                    $ekstensi[$i][$j] = $field_bukti[$h][$i]->getExtension();
                    $namaFile[$h][$i] = $tanggal;
                    $namaFile[$h][$i] .= '_kegiatan_ke-';
                    $namaFile[$h][$i] .= $h + 1;
                    $namaFile[$h][$i] .= '_bukti_dukung_ke-';
                    $namaFile[$h][$i] .= $i + 1;
                    $namaFile[$h][$i] .= '.';
                    $namaFile[$h][$i] .= $ekstensi[$i][$j];
                }
                $field_bukti[$h][$i]->move(
                    $dirname,
                    $namaFile[$h][$i]
                );
            }
        }

        $uraian_laporan = array('uraian' => $field_uraian, 'jumlah' => $field_jumlah, 'satuan' => $field_satuan, 'hasil' => $field_hasil, 'bukti_dukung' => $namaFile);
        $json_laporan = json_encode($uraian_laporan);

        $this->masterLaporanHarianModel->save([
            'user_id' => session('user_id'),
            'tgl_kegiatan' => $tanggal,
            'uraian_kegiatan' => $json_laporan,
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
