<?php

namespace App\Controllers;


class masterUser extends BaseController
{
    protected $masterUserModel;

    public function __construct()
    {
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile User',
            'menu' => '',
            'subMenu' => ''
        ];
        return view('Profile/index', $data);
    }
}
