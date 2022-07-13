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

    public function gantiPasswordByUser()
    {
        $user = $this->masterUserModel->getProfilUser(session('user_id'));


        $password_lama = $this->request->getVar('password_lama');
        $password_baru = $this->request->getVar('password_baru');

        if (password_verify($password_lama, $user['password'])) {
            $pass_baru = password_hash($password_baru, PASSWORD_DEFAULT);

            $data = [
                'username' => $user['username'],
                'fullname' => $user['fullname'],
                'email' => $user['email'],
                'password' => $pass_baru,
                'token' => '',
                'image' => $user['image'],
                'nip_lama_user' => $user['nip_lama_user'],
                'is_active' => $user['is_active'],
            ];
            //  d($data);

            //$this->masterUserModel->update(intval(session('user_id')), $data);

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
        } else {
            return redirect()->to('/dashboard');
        }


        return redirect()->to('/profile');
    }
}
