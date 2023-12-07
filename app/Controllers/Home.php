<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $this->plugin->set('scrollbar');
        return $this->view('layout/blank');
    }
}
