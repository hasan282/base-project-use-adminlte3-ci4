<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
    }

    public function admin()
    {
        $data['title'] = 'Admin Page';
        $this->plugin->setup('scrollbar');
        $this->view('layout/blank', $data);
    }
}
