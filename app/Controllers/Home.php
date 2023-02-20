<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $this->plugin->setup('icheck');
        $this->view('layout/login');
    }

    public function admin()
    {
        $this->plugin->setup('scrollbar');
        $this->view('layout/blank');
    }
}
