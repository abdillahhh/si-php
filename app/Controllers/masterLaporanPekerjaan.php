<?php

namespace App\Controllers;


use App\Models\masterLaporanPekerjaanModel;
use App\Models\MasterSatuanModel;
use App\Models\MasterUserModel;
use App\Models\MasterPegawaiModel;
use App\Models\MasterEs3Model;
use App\Models\MasterSatkerModel;
use App\Models\MasterAssignmentPekerjaanModel;
use App\Models\MasterProgressPekerjaanModel;
use App\Models\PekerjaanChildModel;
use CodeIgniter\Session\Session;
use PHPUnit\Framework\Test;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class masterLaporanPekerjaan extends BaseController
{
    protected $masterLaporanPekerjaanModel;
    protected $masterSatuanModel;
    protected $masterUserModel;
    protected $masterPegawaiModel;
    protected $masterEs3Model;
    protected $masterSatkerModel;
    protected $masterAssignmentPekerjaanModel;
    protected $masterProgressPekerjaanModel;
    protected $pekerjaanChildModel;

    public function __construct()
    {
        $this->masterLaporanPekerjaanModel = new masterLaporanPekerjaanModel();
        $this->masterSatuanModel = new masterSatuanModel();
        $this->masterUserModel = new masterUserModel();
        $this->masterPegawaiModel = new masterPegawaiModel();
        $this->masterEs3Model = new masterEs3Model();
        $this->masterSatkerModel = new MasterSatkerModel();
        $this->masterAssignmentPekerjaanModel = new MasterAssignmentPekerjaanModel();
        $this->masterProgressPekerjaanModel = new MasterProgressPekerjaanModel();
        $this->pekerjaanChildModel = new PekerjaanChildModel();
    }

    public function listPekerjaan()
    {

        $all_year = $this->masterLaporanPekerjaanModel->getAllYear(session('user_id'));
        if ($all_year != NULL) {
            for ($i = 0; $i < count($all_year); $i++) {
                $data = explode('-', $all_year[$i]['waktutarget']);
                $tahun[] = $data[0];
            }
        } else {
            $tahun = NULL;
        }
        if ($tahun != NULL) {
            $tahun_tersedia[] = $tahun[0];
            for ($i = 1; $i < count($tahun); $i++) {
                if ($tahun[$i - 1] != $tahun[$i]) {
                    $tahun_tersedia[] = $tahun[$i];
                }
                ;
            }
        } else {
            $tahun_tersedia = NULL;
        }
        $keyword = $this->request->getVar('keyword');
        $itemsCount = 10;
        $tanggal_input_terakhir = $this->masterLaporanPekerjaanModel->getMaxDate(session('user_id'));

        $data = [
            'title' => 'List Pekerjaan',
            'menu' => 'Laporan Pekerjaan',
            'subMenu' => 'Input Pekerjaan',
            'total' => count($this->masterLaporanPekerjaanModel->getTotalProvinsi(session('user_id'))),
            'list_full_laporan_harian' => $this->masterLaporanPekerjaanModel->getTotalProvinsi(session('user_id')),
            'pager' => $this->masterLaporanPekerjaanModel->getAllByUser(session('user_id'))->pager,
            'itemsCount' => $itemsCount,
            'list_satuan' => $this->masterSatuanModel->getAll(),
            'list_pekerjaan' => $this->masterLaporanPekerjaanModel->getMasterPekerjaanByUser(session('level_id'), session('es3'), session('es4')),
            'list_satker' => $this->masterSatkerModel->getAllSatker(),
            'modal_edit' => '',
            'modal_detail' => '',
            'kantor' => session('es3'),
            'laporan_harian_tertentu' => NULL,
            'tanggal_input_terakhir' => $tanggal_input_terakhir,
            'tahun_tersedia' => $tahun_tersedia,
            'statusverifikasi'=>1,
            'keyword' => $keyword

        ];

        // dd($data);



        if (session('es3') == '98') {
            $data = [
                'title' => 'List Laporan',
                'menu' => 'Laporan Harian',
                'subMenu' => 'Daftar Laporan',
                'total' => count($this->masterLaporanPekerjaanModel->getTotalProvinsi(session('user_id'))),
                'list_full_laporan_harian' => $this->masterAssignmentPekerjaanModel->getTotalKab(session('data_pegawai')['satker_kd'], session('es4')),
                'pager' => $this->masterLaporanPekerjaanModel->getAllByUser(session('user_id'))->pager,
                'itemsCount' => $itemsCount,
                'list_satuan' => $this->masterSatuanModel->getAll(),
                'list_pekerjaan' => $this->masterLaporanPekerjaanModel->getMasterPekerjaanByUser(session('level_id'), session('es3'), session('es4')),
                'list_satker' => $this->masterSatkerModel->getAllSatker(),
                'kantor' => session('es3'),
                'modal_edit' => '',
                'modal_detail' => '',
                'laporan_harian_tertentu' => NULL,
                'tanggal_input_terakhir' => $tanggal_input_terakhir,
                'tahun_tersedia' => $tahun_tersedia,
                'keyword' => $keyword

            ];

        }
        return view('laporanPekerjaan/listPekerjaan', $data);
    }

    public function saveLaporanPekerjaan()
    {
        $urlberkas = rootbaseurl("/myDrive/siphp/berkas/");
        $tanggal = $this->request->getVar('tanggal');
        $field_jumlah = $this->request->getVar('field_jumlah');
        $field_satuan = $this->request->getVar('field_satuan');
        $field_pekerjaan = $this->request->getVar('field_pekerjaan');
        $field_deadline = $this->request->getVar('field_deadline');
        



        $data = [];
        for ($i = 0; $i < count($field_pekerjaan); $i++) {

            $row = [
                'created_by' => session('user_id'),
                'kdes3' => session('es3'),
                'kdes4' => session('es4'),
                'kuantitastarget' => $field_jumlah[$i],
                'satuan' => $field_satuan[$i],
                'kdkerjaan' => $field_pekerjaan[$i],
                'waktutarget' => $field_deadline[$i],
                // 'uraian_kegiatan' => $json_laporan,
            ];

            array_push($data, $row);
        }

        $this->masterLaporanPekerjaanModel->insertBatch($data);
        // session()->setFlashdata('pesan', 'Kegiatan Berhasil Ditambahkan');
        // session()->setFlashdata('icon', 'success');
        
        return redirect()->to('/listPekerjaan');
        //return redirect()->to('laporanPekerjaan/listPekerjaan');
    }

    public function updateLaporanPekerjaan()
    {
        $field_jumlah = $this->request->getVar('field_jumlah');
        $field_satuan = $this->request->getVar('field_satuan');
        $field_deadline = $this->request->getVar('field_deadline');

        $row = [
            'kuantitastarget' => $field_jumlah[0],
            'satuan' => $field_satuan[0],
            'waktutarget' => $field_deadline[0],
        ];


        // dd($row);

        $this->masterLaporanPekerjaanModel->update($this->request->getVar('id_kerjaan'), $row);
        // session()->setFlashdata('pesan', 'Kegiatan Berhasil Ditambahkan');
        // session()->setFlashdata('icon', 'success');
        return redirect()->to('/listPekerjaan');
    }

    public function detailKegiatan()
    {
        $data = [
            'title' => 'Detail Kegiatan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Daftar Laporan'
        ];
        return view('laporanHarian/detailKegiatan', );
    }

    public function showDetailLaporanPekerjaan($laporan_id)
    {
        $keyword = $this->request->getVar('keyword');
        $all_year = $this->masterLaporanPekerjaanModel->getAllYear(session('user_id'));
        if ($all_year != NULL) {
            for ($i = 0; $i < count($all_year); $i++) {
                $data = explode('-', $all_year[$i]['waktutarget']);
                $tahun[] = $data[0];
            }
        } else {
            $tahun = NULL;
        }
        if ($tahun != NULL) {
            $tahun_tersedia[] = $tahun[0];
            for ($i = 1; $i < count($tahun); $i++) {
                if ($tahun[$i - 1] != $tahun[$i]) {
                    $tahun_tersedia[] = $tahun[$i];
                }
                ;
            }
        } else {
            $tahun_tersedia = NULL;
        }
        $keyword = $this->request->getVar('keyword');
        $itemsCount = 10;
        $tanggal_input_terakhir = $this->masterLaporanPekerjaanModel->getMaxDate(session('user_id'));
        // Call the getStatusVerifikasi method from the PekerjaanChildModel
        $verifikasiStatus = $this->pekerjaanChildModel->getStatusVerifikasi(session('satker_kd'),$laporan_id);
        // Add the $verifikasiStatus to the $data array
        // $data['verifikasi_status'] = $verifikasiStatus;
        $data = [
            'title' => 'List Laporan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Daftar Laporan',
            'verifikasi_status' => $verifikasiStatus,
            'total' => count($this->masterLaporanPekerjaanModel->getTotalProvinsi(session('user_id'))),
            'list_full_laporan_harian' => $this->masterLaporanPekerjaanModel->getTotalProvinsi(session('user_id')),
            'pager' => $this->masterLaporanPekerjaanModel->getAllByUser(session('user_id'))->pager,
            'itemsCount' => $itemsCount,
            'list_satuan' => $this->masterSatuanModel->getAll(),
            'list_pekerjaan' => $this->masterLaporanPekerjaanModel->getMasterPekerjaanByUser(session('level_id'), session('es3'), session('es4')),
            'list_satker' => $this->masterSatkerModel->getAllSatker(),
            'modal_edit' => '',
            'modal_detail' => 'modal-detail',
            'kantor' => session('es3'),
            'laporan_harian_tertentu' => $this->masterLaporanPekerjaanModel->getLaporan(session('user_id'), $laporan_id),
            'tanggal_input_terakhir' => $tanggal_input_terakhir,
            'tahun_tersedia' => $tahun_tersedia,
            'keyword' => $keyword
        ];

        // dd($data);



        if (session('es3') == '98') {
            $data = [
                'title' => 'List Laporan',
                'menu' => 'Laporan Harian',
                'subMenu' => 'Daftar Laporan',
                'total' => count($this->masterLaporanPekerjaanModel->getTotalProvinsi(session('user_id'))),
                'list_full_laporan_harian' => $this->masterAssignmentPekerjaanModel->getTotalKab(session('data_pegawai')['satker_kd'], session('es4')),
                'pager' => $this->masterLaporanPekerjaanModel->getAllByUser(session('user_id'))->pager,
                'itemsCount' => $itemsCount,
                'list_satuan' => $this->masterSatuanModel->getAll(),
                'list_pekerjaan' => $this->masterLaporanPekerjaanModel->getMasterPekerjaanByUser(session('level_id'), session('es3'), session('es4')),
                'list_satker' => $this->masterSatkerModel->getAllSatker(),
                'kantor' => session('es3'),
                'modal_edit' => '',
                'modal_detail' => 'modal-detail',
                'laporan_harian_tertentu' => $this->masterLaporanPekerjaanModel->getLaporan(session('user_id'), $laporan_id),
                'tanggal_input_terakhir' => $tanggal_input_terakhir,
                'tahun_tersedia' => $tahun_tersedia,
                'keyword' => $keyword

            ];
        }
        // dd($data);
        return view('laporanPekerjaan/listPekerjaan', $data);
    }

    public function hapusPekerjaan($laporan_id)
    {
        // dd($laporan_id);
        $this->masterLaporanPekerjaanModel->delete($laporan_id, true);

        $keyword = $this->request->getVar('keyword');
        $all_year = $this->masterLaporanPekerjaanModel->getAllYear(session('user_id'));
        if ($all_year != NULL) {
            for ($i = 0; $i < count($all_year); $i++) {
                $data = explode('-', $all_year[$i]['waktutarget']);
                $tahun[] = $data[0];
            }
        } else {
            $tahun = NULL;
        }
        if ($tahun != NULL) {
            $tahun_tersedia[] = $tahun[0];
            for ($i = 1; $i < count($tahun); $i++) {
                if ($tahun[$i - 1] != $tahun[$i]) {
                    $tahun_tersedia[] = $tahun[$i];
                }
                ;
            }
        } else {
            $tahun_tersedia = NULL;
        }
        $keyword = $this->request->getVar('keyword');
        $itemsCount = 10;
        $tanggal_input_terakhir = $this->masterLaporanPekerjaanModel->getMaxDate(session('user_id'));


        $data = [
            'title' => 'List Laporan',
            'menu' => 'Laporan Harian',
            'subMenu' => 'Daftar Laporan',
            'total' => count($this->masterLaporanPekerjaanModel->getTotalProvinsi(session('user_id'))),
            'list_full_laporan_harian' => $this->masterLaporanPekerjaanModel->getTotalProvinsi(session('user_id')),
            'pager' => $this->masterLaporanPekerjaanModel->getAllByUser(session('user_id'))->pager,
            'itemsCount' => $itemsCount,
            'list_satuan' => $this->masterSatuanModel->getAll(),
            'list_pekerjaan' => $this->masterLaporanPekerjaanModel->getMasterPekerjaanByUser(session('level_id'), session('es3'), session('es4')),
            'list_satker' => $this->masterSatkerModel->getAllSatker(),
            'modal_edit' => '',
            'modal_detail' => '',
            'kantor' => session('es3'),
            'laporan_harian_tertentu' => NULL,
            'tanggal_input_terakhir' => $tanggal_input_terakhir,
            'tahun_tersedia' => $tahun_tersedia,
            'keyword' => $keyword

        ];

        // dd($data);



        if (session('es3') == '98') {
            $data = [
                'title' => 'List Laporan',
                'menu' => 'Laporan Harian',
                'subMenu' => 'Daftar Laporan',
                'total' => count($this->masterLaporanPekerjaanModel->getTotalProvinsi(session('user_id'))),
                'list_full_laporan_harian' => $this->masterAssignmentPekerjaanModel->getTotalKab(session('data_pegawai')['satker_kd'], session('es4')),
                'pager' => $this->masterLaporanPekerjaanModel->getAllByUser(session('user_id'))->pager,
                'itemsCount' => $itemsCount,
                'list_satuan' => $this->masterSatuanModel->getAll(),
                'list_pekerjaan' => $this->masterLaporanPekerjaanModel->getMasterPekerjaanByUser(session('level_id'), session('es3'), session('es4')),
                'list_satker' => $this->masterSatkerModel->getAllSatker(),
                'kantor' => session('es3'),
                'modal_edit' => '',
                'modal_detail' => '',
                'laporan_harian_tertentu' => NULL,
                'tanggal_input_terakhir' => $tanggal_input_terakhir,
                'tahun_tersedia' => $tahun_tersedia,
                'keyword' => $keyword

            ];

        }
        return view('laporanPekerjaan/listPekerjaan', $data);
    }

    public function saveAssignmentPekerjaan()
    {
        $satker = array('1501', '1502', '1503', '1504', '1505', '1506', '1507', '1508', '1509', '1571', '1572');
        switch (session('es3')) {
            case 1:
                $kd_es4 = 11;
                break;
            case 2:
                $kd_es4 = 22;
                break;
            case 3:
                $kd_es4 = 33;
                break;
            case 4:
                $kd_es4 = 44;
                break;
            case 5:
                $kd_es4 = 55;
                break;
            case 6:
                $kd_es4 = 66;
                break;
            default:
                break;
        }
        ;

        $data = [];
        for ($i = 0; $i < 11; $i++) {
            if ($this->request->getVar('field_target_' . $satker[$i]) != 0) {
                $row = [
                    'kdsatker' => $satker[$i],
                    'id_pekerjaan' => $this->request->getVar('id_kerjaan'),
                    'kdes3' => 98,
                    'kdes4' => $kd_es4,
                    'kuantitastarget' => $this->request->getVar('field_target_' . $satker[$i]),
                    'assign' => 1,
                ];
                array_push($data, $row);
            }
        }
        ;
        // dd($data);
        // exit();


        $this->masterAssignmentPekerjaanModel->upsertData($data);
        return redirect()->to('/listPekerjaan');
    }

    public function updateRealisasiPekerjaan()
    {
        $satker = array('1501', '1502', '1503', '1504', '1505', '1506', '1507', '1508', '1509', '1571', '1572');
        switch (session('es3')) {
            case 1:
                $kd_es4 = 11;
                break;
            case 2:
                $kd_es4 = 22;
                break;
            case 3:
                $kd_es4 = 33;
                break;
            case 4:
                $kd_es4 = 44;
                break;
            case 5:
                $kd_es4 = 55;
                break;
            case 6:
                $kd_es4 = 66;
                break;
            default:
                break;
        };

        //$tanggal = $this->request->getVar('tanggal');
        $id = $this->request->getVar('id_kerjaan');
        $status_waktu = 0;
        $status_target = 0;
        $statusverifikasi = 0;
        $data = [];
        $currentDate = date('Y-m-d');
        

        $dataPekerjaan = $this->masterAssignmentPekerjaanModel->getWhere(['id' => $id, 'kdsatker' => session('kdsatker')])
            ->getRow();
        // d($dataPekerjaan);
        $id_tbl_pekerjaan = $dataPekerjaan -> id_pekerjaan;
        // d($id_tbl_pekerjaan);
        $dataTarget = $this->masterLaporanPekerjaanModel->getWhere(['id' => $id_tbl_pekerjaan])
            ->getRow();
        // dd($dataTarget);
        

        //if(strtotime($currentDate) <= strtotime($dataTarget->waktutarget)) {
          //  $status_waktu = 1; };

         /* if ($this->request->getFile('field_bukti_realisasi')->isValid()) {
            $buktiRealisasi = $this->request->getFile('field_bukti_realisasi');
            $folderTanggal = date('Y-m-d');
            $folderPath = WRITEPATH . 'bukti/' . $folderTanggal;
    
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
    
            $newName = $buktiRealisasi->getRandomName();
            $buktiRealisasi->move($folderPath, $newName);
    
            $buktiPath = $folderTanggal . '/' . $newName;
        } else {
            $buktiPath = $this->request->getVar('field_bukti_realisasi');
        }
    
        if ($this->request->getVar('field_kuantitas_realisasi') >= $dataPekerjaan->kuantitastarget) {
            $status_target = 1;
        }*/
    
        d($this->request->getVar('field_kuantitas_realisasi'));
        d($dataPekerjaan -> kuantitastarget);
        if($this->request->getVar('field_kuantitas_realisasi') >= $dataPekerjaan -> kuantitastarget) {
          $status_target = 1;  }
        
          $buktiRealisasi = $this->request->getFile('field_bukti_realisasi');

          if ($buktiRealisasi->isValid() && !$buktiRealisasi->hasMoved()) {
            $allowedExtensions = ['png', 'jpg', 'pdf'];
            $fileExtension = strtolower($buktiRealisasi->getExtension());
        
            if (!in_array($fileExtension, $allowedExtensions)) {
                // Menampilkan pesan error jika tipe file tidak diizinkan.
                echo "File type not allowed. Please upload a PNG or JPG file.";
            } else {
                $newName = $buktiRealisasi->getRandomName();
                $buktiRealisasi->move('./bukti', $newName);
                $buktiPath = 'bukti/' . $newName;
                } 
            } else {
              $buktiPath = $this->request->getVar('field_bukti_realisasi');
             }

        $row = [
            'created_by' => session('user_id'),
            'id_pekerjaan' => $this->request->getVar('id_kerjaan'),
            'kdsatker' => session('kdsatker'),
            'kdes3' => 98,
            'kdes4' => session('es4'),
            'kuantitasrealisasi' => $this->request->getVar('field_kuantitas_realisasi'),
            //'bukti' => $this->request->getVar('field_bukti_realisasi'),
            'bukti' => $buktiPath,
            'wakturealisasi' => $this->request->getVar('field_waktu_realisasi'),
            //'wakturealisasi' => $currentDate,
        ];
        array_push($data, $row);

        $rowUpdate = [
            'kuantitasrealisasi' => $this->request->getVar('field_kuantitas_realisasi'),
            //'wakturealisasi' => $currentDate,
            'bukti' => $buktiPath,
            //'bukti' => $this->request->getVar('field_bukti_realisasi'),
            'wakturealisasi' => $this->request->getVar('field_waktu_realisasi'),
            'statuspenyelesaiiantarget' => $status_target,
            'statuspenyelesaiianwaktu' => $status_waktu,
            'statusverifikasi' => $statusverifikasi
        ];

        if ($this->request->getVar('field_kuantitas_realisasi') > 0) {
            // Set status menjadi 0 jika ada realisasi yang diinput
            $rowUpdate['statusverifikasi'] = 0;
        }
        // print_r($data);
        // dd($rowUpdate);
        // $id = ($this->request->getVar('id_kerjaan'));
        // exit();

        $this->masterProgressPekerjaanModel->insertBatch($data);

        $this->masterAssignmentPekerjaanModel->update($this->request->getVar('id_kerjaan'), $rowUpdate);
        return redirect()->to('/listPekerjaan');

    }

    public function getData()
    {
        // Retrieve the ID from the AJAX request
        $id = $this->request->getPost('id');

        // get data 
        $data = $this->masterLaporanPekerjaanModel->getLaporan(session('user_id'), $id);

        // Return the data as JSON
        return $this->response->setJSON($data);
    }

    // public function getStatus()
    // {
    //     $kdsatker = $this->request->getPost('kdsatker');
    //     $id_pekerjaan = $this->request->getPost('id_pekerjaan');
    //     // Panggil model atau lakukan operasi update ke database sesuai dengan data yang diterima
    //     $pekerjaanChildModel = new PekerjaanChildModel();
    //     $statusverifikasi = $pekerjaanChildModel->getStatusVerifikasi($kdsatker, $id_pekerjaan);
        
    //     $data['statusverifikasi'] = $statusverifikasi;

    //     return view('verifikasi_view', $data);
    // }

    public function insert()
    {
        $id = $this->request->getPost('id');
        $verifikasi = $this->request->getPost('verifikasi');

        // Validasi data jika diperlukan

        // Simpan data ke dalam database
        $pekerjaanChildModel = new PekerjaanChildModel();
        $data = [
            'statusverifikasi' => $verifikasi
        ];
        $pekerjaanChildModel->update($id, $data);

        // Redirect ke halaman yang diinginkan
        // return redirect()->to(base_url('/listPekerjaan'))->with('status', 'Verifikasi berhasil disimpan.');
    }

    public function updateStatus()
    {
        $kdsatker = $this->request->getPost('kdsatker');
        $id_pekerjaan = $this->request->getPost('id_pekerjaan');
        $verifikasi = $this->request->getPost('statusverifikasi');

        // Validasi data jika diperlukan
        
        // Simpan data ke dalam database
        $pekerjaanChildModel = new PekerjaanChildModel();
        $pekerjaanChildModel->saveVerifikasi($kdsatker, $id_pekerjaan, $verifikasi);

         // Load model PekerjaanChildModel
         $pekerjaanChildModel = new PekerjaanChildModel();

         // Panggil fungsi untuk mengisi data secara otomatis
         $pekerjaanChildModel->insertSkorAutomatically($kdsatker,$id_pekerjaan);
        // Redirect kembali ke halaman sebelumnya atau halaman lain yang sesuai
        return redirect()->to(previous_url())->with('status', 'Verifikasi berhasil disimpan.');
        // return view('laporanPekerjaan/listPekerjaan', $data);
    }

    public function updatePenyelesaian()
    {
        $id = $this->request->getPost('id');
        $penyelesaian = $this->request->getPost('statuspenyelesaian');

        // Validasi data jika diperlukan

        // Ubah nilai 0 menjadi null jika sesuai kondisi
        if ($penyelesaian == 0) {
            $penyelesaian = null;
        }
        
        // Simpan data ke dalam database
        $masterLaporanPekerjaanModel = new MasterLaporanPekerjaanModel();
        $masterLaporanPekerjaanModel->savePenyelesaian($id, $penyelesaian);

        return redirect()->to(previous_url())->with('status', 'Status berhasil disimpan.');
    }
    
}
