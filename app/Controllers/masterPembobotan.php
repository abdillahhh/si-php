<?php

namespace App\Controllers;

use App\Models\PekerjaanChildModel;

class MasterPembobotan extends BaseController
{
    public function insertSkor()
    {
        // Menginisialisasi model
        $pekerjaanChildModel = new PekerjaanChildModel();

        // Panggil fungsi untuk mengisi data skor secara otomatis
        $pekerjaanChildModel->insertSkorAutomatically();


        // return redirect()->to(base_url('/')); // Redirect ke halaman utama atau sesuai kebutuhan
    }
}