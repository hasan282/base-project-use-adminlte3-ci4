<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $this->view('layout/login');
    }

    public function admin()
    {
        $this->view('layout/blank');
    }
}
