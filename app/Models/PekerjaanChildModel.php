<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaanChildModel extends Model
{
    protected $table = 'tbl_pekerjaan_child';
    protected $primaryKey = 'id'; // Ganti sesuai dengan primary key di tabel
    protected $allowedFields = ['kdsatker', 'id_pekerjaan', 'statusverifikasi', 'wakturealisasi', 'waktutarget', 'kuantitasrealisasi', 'kuantitastarget', 'skor'];

    // Fungsi untuk menyimpan data verifikasi
    public function saveVerifikasi($kdsatker, $id_pekerjaan, $verifikasi)
    {
        $this->where('kdsatker', $kdsatker)
            ->where('id_pekerjaan', $id_pekerjaan)
            ->set(['statusverifikasi' => $verifikasi])
            ->update();
    }

    // Fungsi untuk mendapatkan statusverifikasi
    public function getStatusVerifikasi($kdsatker, $id_pekerjaan)
    {
        $result = $this->where('kdsatker', $kdsatker)
            ->where('id_pekerjaan', $id_pekerjaan)
            ->first();


            
        // Check if the result is not null before accessing the array offset
        if ($result !== null && isset($result['statusverifikasi'])) {
            return $result['statusverifikasi'];
        } else {
            return null; // or return a default value if needed
        }
    }

    public function insertSkorAutomatically($satker,$id_pekerjaan)
    {
        $data = $this
            ->table($this->table)
            ->select('tbl_pekerjaan_child.*,tbl_pekerjaan.waktutarget')
            ->join('tbl_pekerjaan','tbl_pekerjaan.id = tbl_pekerjaan_child.id_pekerjaan')
            ->where('tbl_pekerjaan_child.id_pekerjaan', $id_pekerjaan)
            ->where('kdsatker',$satker)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getRowArray();

            // dd($data);

        // $dataList = $this->where('statusverifikasi', 1)->findAll();

        // foreach ($dataList as $data) {
            $statusverifikasi = $data['statusverifikasi'];
            $wakturealisasi = strtotime($data['wakturealisasi']);
            $waktutarget = strtotime($data['waktutarget']);

            $selisihHari = floor(($wakturealisasi - $waktutarget) / (60 * 60 * 24));

            // Perhitungan nilai teknis
            $nilaiTeknis = 0;
        if ($statusverifikasi == 1) {
            if ($selisihHari < 0) {
                $nilaiTeknis = 5;
            } elseif ($selisihHari == 0) {
                $nilaiTeknis = 4;
            } elseif ($selisihHari == 1) {
                $nilaiTeknis = 3;
            } elseif ($selisihHari == 2) {
                $nilaiTeknis = 2;
            } elseif ($selisihHari == 3) {
                $nilaiTeknis = 1;
            } else {
                // Tidak memenuhi syarat, inputkan nilai 0
                $nilaiTeknis = 0;
            }
        }

            // Perhitungan nilai volume
            $persentaseKuantitas = ($data['kuantitasrealisasi'] / $data['kuantitastarget']) * 100;

            $nilaiVolume = 0;
            if ($statusverifikasi == 1) {
                if ($persentaseKuantitas >= 95) {
                    $nilaiVolume = 5;
                } elseif ($persentaseKuantitas >= 90 && $persentaseKuantitas <= 94) {
                    $nilaiVolume = 3;
                } elseif ($persentaseKuantitas >= 86 && $persentaseKuantitas <= 89) {
                    $nilaiVolume = 1;
                } else {
                    // Tidak memenuhi syarat, inputkan nilai 0
                    $nilaiVolume = 0;
                }
            }

            // Perhitungan skor
            $nilaiSkor = ($nilaiTeknis * 0.7) + ($nilaiVolume * 0.3);
            
            // dd($nilaiSkor);
            // Update field 'skor' pada data yang sesuai
            $this->update($data['id'], ['skor' => $nilaiSkor]);
        // }
    }
}
