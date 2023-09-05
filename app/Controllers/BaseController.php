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

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     * @var array
     */
    protected $helpers = ['cookie', 'enkripsi', 'format', 'user', 'form'];
    protected $plugin;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->_autoloaders();
    }

    /**
     * Call a Views and Remove a New Line
     * @param string $view Path of View
     * @param array $data Data to Send
     * @param bool $return Return Source Code (default false)
     */
    protected function view(string $view, array $data = [], $return = false)
    {
        $data['adminPlugins'] = $this->plugin;
        $source = view($view, $data);
        if (env_is('production')) $source = nl2space($source);
        if ($return) {
            return $source;
        } else {
            echo $source;
        }
    }

    private function _autoloaders()
    {
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->plugin = new \App\Libraries\Plugins(array(
            'refresher' => true, 'autoload' => 'basic|fontawesome'
        ));
    }
}
