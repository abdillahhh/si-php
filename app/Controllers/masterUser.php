<?php

namespace App\Controllers;

use App\Models\MasterUserModel;
use App\Models\MasterPegawaiModel;

class masterUser extends BaseController
{
    protected $masterUserModel;
    protected $masterPegawaiModel;

    public function __construct()
    {
        $this->masterUserModel = new masterUserModel();
        $this->masterPegawaiModel = new masterPegawaiModel();
    }

    public function profile()
    {
        $data_profil_user = $this->masterUserModel->getProfilUser(session('user_id'));
        $data_pegawai_user = $this->masterPegawaiModel->getProfilPegawai($data_profil_user['nip_lama_user']);

        $data = [
            'title' => 'Profile User',
            'menu' => '',
            'subMenu' => '',
            'list_level' => session('list_user_level'),
            'data_profil_user' => $data_profil_user,
            'data_pegawai_user' => $data_pegawai_user
        ];
        //dd($data);

        return view('Profile/index', $data);
    }
}
