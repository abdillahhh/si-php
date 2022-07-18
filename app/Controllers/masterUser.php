<?php

namespace App\Controllers;

use App\Models\MasterUserModel;
use App\Models\MasterPegawaiModel;
use App\Models\MasterEs3Model;
use App\Models\MasterEs4Model;

class masterUser extends BaseController
{
    protected $masterUserModel;
    protected $masterPegawaiModel;
    protected $masterEs3Model;
    protected $masterEs4Model;


    public function __construct()
    {
        $this->masterUserModel = new masterUserModel();
        $this->masterPegawaiModel = new masterPegawaiModel();
        $this->masterEs3Model = new MasterEs3Model();
        $this->masterEs4Model = new MasterEs4Model();
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
            'data_pegawai_user' => $data_pegawai_user,
            'list_bidang' => $this->masterEs3Model->getAllBidang(),
            'list_seksi' => $this->masterEs4Model->getAllSeksi()
        ];
        //dd($data);

        return view('Profile/index', $data);
    }

    public function gantiPasswordByUser()
    {
        $user = $this->masterUserModel->getProfilUser(session('user_id'));


        $password_lama = $this->request->getVar('password_lama');
        $password_baru = $this->request->getVar('password_baru');


        if (password_verify($password_lama, $user['password'])) {

            $lower_pass = strtolower($password_baru);
            $pass_baru = password_hash($lower_pass, PASSWORD_DEFAULT);


            $this->masterUserModel->save([
                'id' => intval(session('user_id')),
                'username' => $user['username'],
                'fullname' => $user['fullname'],
                'email' => $user['email'],
                'password' => $pass_baru,
                'token' => '',
                'image' => $user['image'],
                'nip_lama_user' => $user['nip_lama_user'],
                'is_active' => $user['is_active'],
            ]);
            session()->setFlashdata('pesan', 'Ganti Password Berhasil');
            session()->setFlashdata('icon', 'success');
        } else {
            return redirect()->to('/dashboard');
        }


        return redirect()->to('/profile');
    }
}
