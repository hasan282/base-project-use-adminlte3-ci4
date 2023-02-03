<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $helpers = [];
    private $dataviews, $options;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->dataviews = array();
        $this->options = global_options();
        $this->_autoloaders();
    }

    /**
     * Print html view with option setup
     * @param string view file path
     * @param array data send parameter (optional)
     */
    protected function view(string $view, $data = array())
    {
        $dataview = (empty($data)) ? $this->dataviews : $data;
        $resource = view($view, $dataview);
        if ($this->options['remove_new_line'])
            $resource = trim(preg_replace('/\s\s+/', ' ', $resource));
        echo $resource;
    }

    protected function data(array $data)
    {
        $this->dataviews = $data;
    }

    private function _autoloaders()
    {
        $this->session = \Config\Services::session();
        $this->plugin = new \App\Libraries\Plugins;
    }
}
