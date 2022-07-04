<?php

namespace App\Controllers;

use App\Models\MasterCalendarModel;

class masterDashboard extends BaseController
{
    protected $masterDashboardModel;
    protected $masterCalendarModel;

    public function __construct()
    {
        $this->masterCalendarModel = new masterCalendarModel();
    }

    public function index()
    {
        $event_data = $this->masterCalendarModel->getEvents();
        foreach ($event_data as $row) {
            $events[] = array(
                'title' => $row['judul_kegiatan'],
                'start' => $row['tgl_kegiatan'],
                'backgroundColor' => '#E2D7E1',
                'borderColor' => '#E2D7E1',
                'textColor' => 'black',
                'allDay' => true,
            );
        }
        $events_json = json_encode($events);

        $data = [
            'title' => 'Dashboard',
            'menu' => 'Dashboard',
            'subMenu' => '',
            'events' => $events_json
        ];

        return view('Dashboard/index', $data);
    }
}
