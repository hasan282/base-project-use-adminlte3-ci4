<?php

if (!function_exists('full_url')) {
    function full_url($baseurl = true)
    {
        $result = '';
        if ($baseurl) $result .= base_url() . '/';
        $result .= uri_string();
        $request = \Config\Services::request();
        $query = $request->getGet();
        if (!empty($query)) {
            $result .= '?';
            $vars = array();
            foreach ($query as $k => $v) array_push($vars, $k . '=' . $v);
            $result .= implode('&', $vars);
        }
        return $result;
    }
}
