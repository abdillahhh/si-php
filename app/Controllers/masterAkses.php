<?php

namespace App\Controllers;

use App\Models\MasterUserModel;
use App\Models\MasterAksesUserLevelModel;

class masterAkses extends BaseController
{
    protected $masterUserModel;
    protected $masterAksesUserLevelModel;

    public function __construct()
    {
        $this->masterUserModel = new masterUserModel();
        $this->masterAksesUserLevelModel = new masterAksesUserLevelModel();
    }

    public function index()
    {
        return view('Login/login');
    }

    public function open()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $this->masterUserModel->getUser($username);

        if ($user == NULL) {
            session()->setFlashdata('pesan', 'username anda salah');
            return redirect()->to('/');
        }

        $list_user_level = $this->masterAksesUserLevelModel->getUserLevel($user['id_user']);


        $level_id = count($list_user_level);
        for ($i = 0; $i < count($list_user_level); $i++) {
            if ($list_user_level[$i]['level_id'] < $level_id) {
                $level_id = $list_user_level[$i]['level_id'];
            }
        }
        $list_menu = $this->masterAksesUserLevelModel->getAksesMenu($level_id);
        $list_submenu = $this->masterAksesUserLevelModel->getAksesSubmenu($level_id);
        if (password_verify($password, $user['password'])) {
            if ($user['is_active'] == 'Y') {
                $data = [
                    'log' => TRUE,
                    'user_id' => $user['id_user'],
                    'level_id' => $level_id,
                    'list_user_level' => $list_user_level,
                    'list_menu'  => $list_menu,
                    'list_submenu' => $list_submenu
                ];
            }
            session()->set($data);
            session()->setFlashdata('pesan', 'berhasil login');
            return redirect()->to('/dashboard');
        }
        session()->setFlashdata('pesan', 'password salah');
        return redirect()->to('/');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('pesan', 'berhasil Logout');
        return redirect()->to('/');
    }
}
