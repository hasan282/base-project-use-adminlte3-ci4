<?php

namespace App\Libraries;

class Plugins
{
    private $settings, $plugins, $used;
    private $header, $footer;

    public function __construct(array $setting = [])
    {
        $this->_settings($setting);
        $this->_plugindata();
        $this->used = explode('|', $this->settings['autoload']);
        $this->_createlist();
    }

    private function _plugindata()
    {
        $this->plugins = array(
            'basic' => array(
                ['url' => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback', 'tipe' => 'css|head'],
                ['url' => '(base_url)/adminlte/asset/css/adminlte.min.css', 'tipe' => 'css|head'],
                ['url' => '(base_url)/adminlte/plugins/jquery/jquery.min.js', 'tipe' => 'js|foot'],
                ['url' => '(base_url)/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'tipe' => 'js|foot'],
                ['url' => '(base_url)/adminlte/asset/js/adminlte.min.js', 'tipe' => 'js|foot'],
                ['url' => '(base_url)/asset/css/surety.css(refresher)', 'tipe' => 'css|head'],
                ['url' => '(base_url)/asset/js/all/functions.js(refresher)', 'tipe' => 'js|foot']
            ),
            'fontawesome' => array(
                ['url' => '(base_url)/adminlte/plugins/fontawesome-free/css/all.min.css', 'tipe' => 'css|head']
            ),
            'icheck' => array(
                ['url' => '(base_url)/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css', 'tipe' => 'css|head']
            ),
            'ionicon' => array(
                ['url' => 'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', 'tipe' => 'css|head']
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
                ['url' => '(base_url)/adminlte/plugins/moment/moment.min.js', 'tipe' => 'js|foot'],
                ['url' => '(base_url)/adminlte/plugins/inputmask/jquery.inputmask.min.js', 'tipe' => 'js|foot'],
                ['url' => '(base_url)/adminlte/plugins/daterangepicker/daterangepicker.js', 'tipe' => 'js|foot'],
                ['url' => '(base_url)/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', 'tipe' => 'js|foot']
            ),
            'jspdf' => array(
                ['url' => 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js', 'tipe' => 'js|foot'],
                ['url' => 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js', 'tipe' => 'js|foot']
            ),
            'pdfmake' => array(
                ['url' => '(base_url)/adminlte/plugins/pdfmake/pdfmake.min.js', 'tipe' => 'js|foot'],
                ['url' => '(base_url)/adminlte/plugins/pdfmake/vfs_fonts.js', 'tipe' => 'js|foot'],
            ),
            'select2' => array(
                ['url' => '(base_url)/adminlte/plugins/select2/css/select2.min.css', 'tipe' => 'css|head'],
                ['url' => '(base_url)/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css', 'tipe' => 'css|head'],
                ['url' => '(base_url)/adminlte/plugins/select2/js/select2.full.min.js', 'tipe' => 'js|foot']
            ),
            'dropzone' => array(
                ['url' => '(base_url)/adminlte/plugins/dropzone/min/dropzone.min.css', 'tipe' => 'css|head'],
                ['url' => '(base_url)/adminlte/plugins/dropzone/min/dropzone.min.js', 'tipe' => 'js|foot'],
                ['url' => '(base_url)/asset/js/all/upload.js(refresher)', 'tipe' => 'js|foot']
            ),
            'sweetalert' => array(
                ['url' => '(base_url)/adminlte/plugins/sweetalert2/sweetalert2.all.min.js', 'tipe' => 'js|foot']
            )
            /*
            'name' => array(
                ['url' => '(base_url)/url(refresher)', 'tipe' => 'css or js|head or foot']
            )
            */
        );
    }

    public function setup(string $list, bool $baseurl = null)
    {
        if ($baseurl !== null) $this->settings['base_url'] = $baseurl;
        $usedPlugins = explode('|', $list);
        foreach ($usedPlugins as $up) {
            if (!in_array($up, $this->used)) array_push($this->used, $up);
        }
        $this->_createlist();
    }

    public function head(bool $new_line = null)
    {
        $separator = $this->_separator($new_line);
        return implode($separator, $this->header) . $separator;
    }

    public function foot(bool $new_line = null)
    {
        $separator = $this->_separator($new_line);
        return implode($separator, $this->footer) . $separator;
    }

    private function _settings(array $setting = [])
    {
        $baseSettings = array(
            'base_url' => false,
            'new_line' => env_is('development'),
            'refresher' => false,
            'refresh_variable' => 'plug=in',
            'refresh_range' => array(100000, 999999),
            'autoload' => 'basic'
        );
        foreach ($setting as $key => $val) {
            if (in_array($key, array_keys($baseSettings))) $baseSettings[$key] = $val;
        }
        $this->settings = $baseSettings;
    }

    private function _createlist()
    {
        $headers = array();
        $footers = array();
        $baseurl = ($this->settings['base_url']) ? rtrim(base_url(), '/') : '';
        $refresher = ($this->settings['refresher']) ?
            '?' . $this->settings['refresh_variable'] . mt_rand(
                $this->settings['refresh_range'][0],
                $this->settings['refresh_range'][1]
            ) : '';
        foreach ($this->plugins as $name => $pl) {
            if (in_array($name, $this->used)) {
                foreach ($pl as $list) {
                    $url = $list['url'];
                    $tipe = explode('|', $list['tipe']);
                    $url = str_replace(
                        array('(base_url)', '(refresher)'),
                        array($baseurl, $refresher),
                        $url
                    );
                    if ($tipe[1] == 'head') array_push($headers, $this->_createtag($url, $tipe[0]));
                    if ($tipe[1] == 'foot') array_push($footers, $this->_createtag($url, $tipe[0]));
                }
            }
        }
        $this->header = $headers;
        $this->footer = $footers;
    }

    private function _createtag(string $url, string $tipe)
    {
        $source = '';
        $tags = array(
            'css' => '<link rel="stylesheet" href="(url)">',
            'js' => '<script src="(url)"></script>'
        );
        if (in_array($tipe, array_keys($tags))) {
            $source = str_replace('(url)', $url, $tags[$tipe]);
        }
        return $source;
    }

    private function _separator($newline)
    {
        $addNewLine = $this->settings['new_line'];
        if (is_bool($newline)) $addNewLine = $newline;
        return ($addNewLine) ? PHP_EOL : '';
    }
}
