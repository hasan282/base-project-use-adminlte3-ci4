<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $this->plugin->set(['fontawesome', 'select2']);
        return $this->view('layout/blank');
    }
}
