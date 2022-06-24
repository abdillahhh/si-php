<?php

namespace App\Controllers;

use App\Models\MasterUserLevelModel;
use App\Models\MasterMenuModel;
use App\Models\MasterAksesMenuModel;
use App\Models\MasterSubmenuModel;
use App\Models\MasterAksesSubmenuModel;
use App\Models\MasterAksesUserLevelModel;


class masterSistem extends BaseController
{
    protected $masterUserLevelModel;
    protected $masterMenuModel;
    protected $masterAksesMenuModel;
    protected $masterSubmenuModel;
    protected $masterAksesSubmenuModel;
    protected $masterAksesUserLevelModel;

    public function __construct()
    {
        $this->masterUserLevelModel = new masterUserLevelModel();
        $this->masterMenuModel = new masterMenuModel();
        $this->masterAksesMenuModel = new masterAksesMenuModel();
        $this->masterSubmenuModel = new masterSubmenuModel();
        $this->masterAksesSubmenuModel = new masterAksesSubmenuModel();
        $this->masterAksesUserLevelModel = new masterAksesUserLevelModel();
    }


    // KELOLA USER
    public function kelolaUser()
    {
        $data = [
            'title' => 'Kelola User',
            'menu' => 'Sistem',
            'subMenu' => 'Kelola User'
        ];
        return view('sistem/kelolaUser', $data);
    }


    // KELOLA LEVEL
    public function kelolaLevel()
    {
        $data = [
            'title' => 'Kelola Level',
            'menu' => 'Sistem',
            'subMenu' => 'Kelola Level'
        ];
        return view('sistem/kelolaLevel', $data);
    }



    // KELOLA MENU
    public function kelolaMenu()
    {
        $data = [
            'title' => 'Kelola Menu',
            'menu' => 'Sistem',
            'subMenu' => 'Kelola Menu',
            'list_menu' => session('list_menu'),
        ];

        return view('sistem/kelolaMenu', $data);
    }

    public function updateMenu()
    {
        $menu_id = $this->request->getVar('id');
        $this->masterMenuModel->save([
            'id' => $menu_id,
            'nama_menu' => $this->request->getVar('nama_menu'),
            'link' => $this->request->getVar('link'),
            'icon' => $this->request->getVar('icon'),
            'urutan' => $this->request->getVar('urutan'),
            'is_active' => $this->request->getVar('is_active'),
        ]);


        $list_menu = $this->masterAksesUserLevelModel->getAksesMenu(session('level_id'));

        $data1 = [
            'log' => TRUE,
            'user_id' => session('user_id'),
            'level_id' => session('level_id'),
            'list_user_level' => session('list_user_level'),
            'list_menu'  => $list_menu,
            'list_submenu' => session('list_submenu')
        ];
        session()->set($data1);

        $data = [
            'title' => 'Kelola Menu',
            'menu' => 'Sistem',
            'subMenu' => 'Kelola Menu',
            'list_menu' => session('list_menu'),
        ];

        return view('sistem/kelolaMenu', $data);
    }

    public function saveMenu()
    {

        $this->masterMenuModel->save([
            'nama_menu' => $this->request->getVar('nama_menu'),
            'link' => $this->request->getVar('link'),
            'icon' => $this->request->getVar('icon'),
            'urutan' => $this->request->getVar('urutan'),
            'is_active' => $this->request->getVar('is_active'),
        ]);

        $list_level_id = $this->masterUserLevelModel->getAllId();
        $last_menu_id = $this->masterMenuModel->getLastId();
        $menu_id = intval($last_menu_id['id']);

        for ($i = 0; $i < count($list_level_id); $i++) {
            $this->masterAksesMenuModel->save([
                'level_id' => intval($list_level_id[$i]['id']),
                'menu_id' => $menu_id,
                'view_level' => 'N',
            ]);
        }


        $list_menu = $this->masterAksesUserLevelModel->getAksesMenu(session('level_id'));

        $data1 = [
            'log' => TRUE,
            'user_id' => session('user_id'),
            'level_id' => session('level_id'),
            'list_user_level' => session('list_user_level'),
            'list_menu'  => $list_menu,
            'list_submenu' => session('list_submenu')
        ];
        session()->set($data1);

        $data = [
            'title' => 'Kelola Menu',
            'menu' => 'Sistem',
            'subMenu' => 'Kelola Menu',
            'list_menu' => session('list_menu'),
        ];

        return view('sistem/kelolaMenu', $data);
    }



    // KELOLA SUB MENU
    public function kelolaSubMenu()
    {
        $data = [
            'title' => 'Kelola Sub Menu',
            'menu' => 'Sistem',
            'subMenu' => 'Kelola Sub Menu',
            'list_submenu' => session('list_submenu'),
            'list_menu' => $this->masterMenuModel->getListMenu()
        ];
        return view('sistem/kelolaSubMenu', $data);
    }

    public function updateSubmenu()
    {
        $submenu_id = $this->request->getVar('submenu_id');
        $this->masterSubmenuModel->save([
            'id' => $submenu_id,
            'nama_submenu' => $this->request->getVar('nama_submenu'),
            'menu_id' => $this->request->getVar('menu_id'),
            'link' => $this->request->getVar('link'),
            'is_active' => $this->request->getVar('is_active'),
        ]);


        $list_submenu = $this->masterAksesUserLevelModel->getAksesSubmenu(session('level_id'));

        $data1 = [
            'log' => TRUE,
            'user_id' => session('user_id'),
            'level_id' => session('level_id'),
            'list_user_level' => session('list_user_level'),
            'list_menu'  => session('list_menu'),
            'list_submenu' => $list_submenu
        ];
        session()->set($data1);

        $data = [
            'title' => 'Kelola Sub Menu',
            'menu' => 'Sistem',
            'subMenu' => 'Kelola Sub Menu',
            'list_submenu' => session('list_submenu'),
            'list_menu' => $this->masterMenuModel->getListMenu()
        ];

        return view('sistem/kelolaSubMenu', $data);
    }
    public function saveSubmenu()
    {
        $this->masterSubmenuModel->save([
            'nama_submenu' => $this->request->getVar('nama_submenu'),
            'menu_id' => $this->request->getVar('menu_id'),
            'link' => $this->request->getVar('link'),
            'is_active' => $this->request->getVar('is_active'),
        ]);
        $list_level_id = $this->masterUserLevelModel->getAllId();
        $last_submenu_id = $this->masterSubmenuModel->getLastId();
        $submenu_id = intval($last_submenu_id['id']);


        for ($i = 0; $i < count($list_level_id); $i++) {
            $this->masterAksesSubmenuModel->save([
                'level_id' => intval($list_level_id[$i]['id']),
                'submenu_id' => $submenu_id,
                'view_level' => 'N',
                'add_level' => 'N',
                'delete_level' => 'N',
                'edit_level' => 'N',
                'print_level' => 'N',
                'upload_level' => 'N'
            ]);
        }

        $list_submenu = $this->masterAksesUserLevelModel->getAksesSubmenu(session('level_id'));

        $data1 = [
            'log' => TRUE,
            'user_id' => session('user_id'),
            'level_id' => session('level_id'),
            'list_user_level' => session('list_user_level'),
            'list_menu'  => session('list_menu'),
            'list_submenu' => $list_submenu
        ];
        session()->set($data1);

        $data = [
            'title' => 'Kelola Sub Menu',
            'menu' => 'Sistem',
            'subMenu' => 'Kelola Sub Menu',
            'list_submenu' => session('list_submenu'),
            'list_menu' => $this->masterMenuModel->getListMenu()
        ];

        return view('sistem/kelolaSubMenu', $data);
    }
}
