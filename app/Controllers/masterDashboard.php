<?php

namespace App\Controllers;


class masterDashboard extends BaseController
{
    protected $masterDashboardModel;

    public function __construct()
    {
        //$this->masterDashboardModel = new masterDashboardModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'menu' => 'Dashboard',
            'subMenu' => ''
        ];
        return view('Dashboard/index', $data);
    }
}
