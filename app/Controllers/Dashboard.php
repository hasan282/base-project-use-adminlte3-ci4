<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->plugin->setup('scrollbar');
        $this->view('layout/blank', $data);
    }
}
