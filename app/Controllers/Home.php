<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'User Login';
        $this->view('layout/login', $data);
    }

    public function admin()
    {
        $data['title'] = 'Dashboard';
        // $this->view('layout/content', $data);
        $this->view('layout/blank', $data);
    }

    public function coba()
    {
        echo base_url();
        $this->plugin->setup('setup');
        $this->plugin->head();
    }

    public function trial()
    {
        $this->plugin->foot();
    }
}
