<?php

namespace App\Libraries;

class Plugins
{
    private $settings, $plugins, $used;
    private $header, $footer;

    public function __construct()
    {
        $this->_settings();
        $this->_plugindata();
        $this->used = array('basic');
        $this->_createlist();
    }

    private function _plugindata()
    {
        $this->plugins = array(
            'basic' => array(
                ['url' => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback', 'tipe' => 'css|head'],
                ['url' => '(base_url)/adminlte/dist/css/adminlte.min.css', 'tipe' => 'css|head'],
                ['url' => '(base_url)/adminlte/plugins/jquery/jquery.min.js', 'tipe' => 'js|head'],
                ['url' => '(base_url)/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'tipe' => 'js|foot'],
                ['url' => '(base_url)/adminlte/dist/js/adminlte.min.js', 'tipe' => 'js|foot']
            ),
            'fontawesome' => array(
                ['url' => '(base_url)/adminlte/plugins/fontawesome-free/css/all.min.css', 'tipe' => 'css|head']
            ),
            'icheck' => array(
                ['url' => '(base_url)/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css', 'tipe' => 'css|head']
            ),
            'scrollbar' => array(
                ['url' => '(base_url)/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css', 'tipe' => 'css|head'],
                ['url' => '(base_url)/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js', 'tipe' => 'js|foot']
            ),
            'toastr' => array(
                ['url' => '(base_url)/adminlte/plugins/toastr/toastr.min.css', 'tipe' => 'css|head'],
                ['url' => '(base_url)/adminlte/plugins/toastr/toastr.min.js', 'tipe' => 'js|foot']
            ),
            'dateinput' => array(
                ['url' => '(base_url)/adminlte/plugins/daterangepicker/daterangepicker.css', 'tipe' => 'css|head'],
                ['url' => '(base_url)/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css', 'tipe' => 'css|head'],
                ['url' => '(base_url)/adminlte/plugins/moment/moment.min.js', 'tipe' => 'js|head'],
                ['url' => '(base_url)/adminlte/plugins/inputmask/jquery.inputmask.min.js', 'tipe' => 'js|foot'],
                ['url' => '(base_url)/adminlte/plugins/daterangepicker/daterangepicker.js', 'tipe' => 'js|foot'],
                ['url' => '(base_url)/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', 'tipe' => 'js|foot']
            ),
            /*
            'name' => array(
                ['url' => '(base_url)/url(refresher)', 'tipe' => 'css or js|head or foot']
            )
            */
        );
    }

    public function setup(string $list, bool $base_url = null)
    {
        if ($base_url !== null) $this->settings['base_url'] = $base_url;
        $usedPlugins = explode('|', $list);
        foreach ($usedPlugins as $up) {
            if (!in_array($up, $this->used)) array_push($this->used, $up);
        }
    }

    public function head(bool $new_line = null)
    {
        d($this->settings);
        d($this->plugins);

        var_dump(array_keys($this->plugins));
    }

    public function foot(bool $new_line = null)
    {
        echo 'Plugin Bottom';
    }

    private function _settings()
    {
        $globalOption = global_options();
        $this->settings = array(
            'base_url' => false,
            'new_line' => !$globalOption['remove_new_line'],
            'refresher' => false,
            'refresh_variable' => 'plug=in',
            'refresh_range' => array(1000, 9999)
        );
    }

    private function _createlist()
    {
        $this->header = array();
        $this->footer = array();
        foreach ($this->plugins as $name => $pl) {
        }
    }
}
