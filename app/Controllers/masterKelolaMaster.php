<?php

namespace App\Controllers;

use App\Models\MasterPegawaiModel;
use App\Models\MasterUserModel;
use App\Models\MasterUserLevelModel;
use App\Models\MasterAksesUserLevelModel;
use App\Models\MasterEs3Model;
use App\Models\MasterGolonganModel;
use App\Models\MasterJabatanModel;
use App\Models\MasterPendidikanModel;
use App\Models\MasterSatkerModel;
use App\Models\MasterEs4Model;
use App\Models\MasterFungsionalModel;


class masterKelolaMaster extends BaseController
{
    protected $masterKelolaMasterModel;
    protected $masterPegawaiModel;
    protected $masterUserModel;
    protected $masterUserLevelModel;
    protected $masterAksesUserLevelModel;
    protected $masterEs3Model;
    protected $masterGolonganModel;
    protected $masterJabatanModel;
    protected $masterPendidikanModel;
    protected $masterSatkerModel;
    protected $masterEs4Model;
    protected $masterFungsionalModel;

    public function __construct()
    {
        $this->masterUserModel = new masterUserModel();
        $this->masterUserLevelModel = new masterUserLevelModel();
        $this->masterAksesUserLevelModel = new masterAksesUserLevelModel();
        $this->masterPegawaiModel = new MasterPegawaiModel();
        $this->masterEs3Model = new MasterEs3Model();
        $this->masterGolonganModel = new MasterGolonganModel();
        $this->masterJabatanModel = new MasterJabatanModel();
        $this->masterPendidikanModel = new MasterPendidikanModel();
        $this->masterSatkerModel = new MasterSatkerModel();
        $this->masterEs4Model = new MasterEs4Model();
        $this->masterFungsionalModel = new MasterFungsionalModel();
    }

    public function masterUser()
    {
        $list_user = $this->masterUserModel->getAllUser();

        $data = [
            'title' => 'Master User',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master User',
            'list_user' => $list_user,
            'show_data_user' => NULL,
            'show_list_level' => NULL,
            'level_tersedia' => NULL,
            'class_modal_default' => 'col-md-6',
            'class_modal_setup' => 'col-md-6 d-none'
        ];
        return view('kelolaMaster/masterUser', $data);
    }

    public function showDataUSer($user_id)
    {
        $list_user = $this->masterUserModel->getAllUser();
        $data_user = $this->masterUserModel->getProfilUser($user_id);
        $list_user_level = $this->masterAksesUserLevelModel->getUserLevel($user_id);
        $level_tersedia = $this->masterUserLevelModel->getAlllevel();

        $data = [
            'title' => 'Master User',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master User',
            'list_user' => $list_user,
            'show_data_user' => $data_user,
            'show_list_level' => $list_user_level,
            'level_tersedia' => $level_tersedia,
            'class_modal_default' => 'col-md-6 d-none',
            'class_modal_setup' => 'col-md-6'
        ];
        return view('kelolaMaster/masterUser', $data);
    }

    public function masterPegawai()
    {
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $list_pegawai = $this->masterPegawaiModel->search($keyword);
        } else {
            $list_pegawai = $this->masterPegawaiModel->getAllPegawai();
        }


        $list_bidang = $this->masterEs3Model->getAllBidang();
        $list_golongan = $this->masterGolonganModel->getAllGolongan();
        $list_jabatan = $this->masterJabatanModel->getAllJabatan();
        $list_pendidikan = $this->masterPendidikanModel->getAllPendidikan();
        $list_satker = $this->masterSatkerModel->getAllSatker();
        $list_seksi = $this->masterEs4Model->getAllSeksi();
        $list_fungsional = $this->masterFungsionalModel->getAllFungsional();

        $data_user = $this->masterUserModel->getAllUser();


        $data = [
            'title' => 'Master Pegawai',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master Pegawai',
            'list_user' => $data_user,
            'list_pegawai' => $list_pegawai,
            'list_bidang' => $list_bidang,
            'list_golongan' => $list_golongan,
            'list_jabatan' => $list_jabatan,
            'list_pendidikan' => $list_pendidikan,
            'list_satker' => $list_satker,
            'list_seksi' => $list_seksi,
            'list_fungsional' => $list_fungsional,
            'pegawai_tertentu' => null,
            'modal_edit' => '',
            'modal_detail' => '',
            'detail_pegawai' => null,
            'image_pegawai' => null,
            'keyword' => $keyword


        ];
       // dd($data);
        return view('kelolaMaster/masterPegawai', $data);
    }

    public function savePegawai()
    {
        $this->masterPegawaiModel->save([
            'nip_lama' => $this->request->getVar('nip_lama'),
            'nip_baru' => $this->request->getVar('nip_baru'),
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'gol_kd' => $this->request->getVar('gol_kd'),
            'tmt' => $this->request->getVar('tmt'),
            'jabatan_kd' => $this->request->getVar('jabatan_kd'),
            'ket_jabatan' => $this->request->getVar('ket_jabatan'),
            'pendidikan_kd' => $this->request->getVar('pendidikan_kd'),
            'tahun_pdd' => $this->request->getVar('tahun_pdd'),
            'jk' => $this->request->getVar('jk'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'satker_kd' => $this->request->getVar('satker_kd'),
            'es3_kd' => $this->request->getVar('es3_kd'),
            'es4_kd' => $this->request->getVar('es4_kd'),
            'fungsional_kd' => $this->request->getVar('fungsional_kd'),

        ]);

        return redirect()->to('/masterPegawai');
    }


    public function showEditPegawai($id_pegawai)
    {

        $list_pegawai = $this->masterPegawaiModel->getAllPegawai();
        $list_bidang = $this->masterEs3Model->getAllBidang();
        $list_golongan = $this->masterGolonganModel->getAllGolongan();
        $list_jabatan = $this->masterJabatanModel->getAllJabatan();
        $list_pendidikan = $this->masterPendidikanModel->getAllPendidikan();
        $list_satker = $this->masterSatkerModel->getAllSatker();
        $list_seksi = $this->masterEs4Model->getAllSeksi();
        $list_fungsional = $this->masterFungsionalModel->getAllFungsional();

        $data_user = $this->masterUserModel->getAllUser();

        $data = [
            'title' => 'Master Pegawai',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master Pegawai',
            'list_user' => $data_user,
            'list_pegawai' => $list_pegawai,
            'list_bidang' => $list_bidang,
            'list_golongan' => $list_golongan,
            'list_jabatan' => $list_jabatan,
            'list_pendidikan' => $list_pendidikan,
            'list_satker' => $list_satker,
            'list_seksi' => $list_seksi,
            'list_fungsional' => $list_fungsional,
            'pegawai_tertentu' => $this->masterPegawaiModel->getPegawaiById($id_pegawai),
            'modal_edit' => 'modal-edit',
            'modal_detail' => '',
            'detail_pegawai' => null,
            'image_pegawai' => null,
            'keyword' => ''


        ];
        //dd($data);
        return view('kelolaMaster/masterPegawai', $data);
    }

    public function updatePegawai()
    {
        $id = $this->request->getVar('id_pegawai_tertentu');


        $this->masterPegawaiModel->save([
            'id' => intval($id),
            'nip_lama' => $this->request->getVar('nip_lama'),
            'nip_baru' => $this->request->getVar('nip_baru'),
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'gol_kd' => $this->request->getVar('gol_kd'),
            'tmt' => $this->request->getVar('tmt'),
            'jabatan_kd' => $this->request->getVar('jabatan_kd'),
            'ket_jabatan' => $this->request->getVar('ket_jabatan'),
            'pendidikan_kd' => $this->request->getVar('pendidikan_kd'),
            'tahun_pdd' => $this->request->getVar('tahun_pdd'),
            'jk' => $this->request->getVar('jk'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'satker_kd' => $this->request->getVar('satker_kd'),
            'es3_kd' => $this->request->getVar('es3_kd'),
            'es4_kd' => $this->request->getVar('es4_kd'),
            'fungsional_kd' => $this->request->getVar('fungsional_kd'),

        ]);

        return redirect()->to('/masterPegawai');
    }


    public function showDetailPegawai($id_pegawai)
    {

        $detail_pegawai = $this->masterPegawaiModel->getDetailPegawaiById($id_pegawai);
        $image_pegawai = $this->masterUserModel->getImage($detail_pegawai['nip_lama']);
        $list_pegawai = $this->masterPegawaiModel->getAllPegawai();
        $list_bidang = $this->masterEs3Model->getAllBidang();
        $list_golongan = $this->masterGolonganModel->getAllGolongan();
        $list_jabatan = $this->masterJabatanModel->getAllJabatan();
        $list_pendidikan = $this->masterPendidikanModel->getAllPendidikan();
        $list_satker = $this->masterSatkerModel->getAllSatker();
        $list_seksi = $this->masterEs4Model->getAllSeksi();
        $list_fungsional = $this->masterFungsionalModel->getAllFungsional();
        $data_user = $this->masterUserModel->getAllUser();

        $data = [
            'title' => 'Master Pegawai',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master Pegawai',
            'list_user' => $data_user,
            'list_pegawai' => $list_pegawai,
            'list_bidang' => $list_bidang,
            'list_golongan' => $list_golongan,
            'list_jabatan' => $list_jabatan,
            'list_pendidikan' => $list_pendidikan,
            'list_satker' => $list_satker,
            'list_seksi' => $list_seksi,
            'list_fungsional' => $list_fungsional,
            'pegawai_tertentu' => null,
            'detail_pegawai' => $detail_pegawai,
            'image_pegawai' => $image_pegawai,
            'modal_edit' => '',
            'modal_detail' => 'modal-detail',
            'keyword' => ''


        ];
        // dd($data);
        return view('kelolaMaster/masterPegawai', $data);
    }





    public function masterKegiatan()
    {
        $data = [
            'title' => 'Master Kegiatan',
            'menu' => 'Kelola Master',
            'subMenu' => 'Master Kegiatan'
        ];
        return view('kelolaMaster/masterKegiatan', $data);
    }

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
