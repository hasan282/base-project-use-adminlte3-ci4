<?php

if (!function_exists('userdata')) {
    function userdata(?string $param = null)
    {
        $session = \Config\Services::session();
        if ($param === null) {
            $sesdata = $session->get();
            $userdata = array_filter($sesdata, function ($key) {
                return strpos($key, 'userdata_') === 0;
            }, ARRAY_FILTER_USE_KEY);
            if (!empty($userdata)) {
                $keys = array_map(function ($key) {
                    return substr($key, strlen('userdata_'));
                }, array_keys($userdata));
                $vals = array_values($userdata);
                $userdata = array_combine($keys, $vals);
            }
            return $userdata;
        } else {
            return $session->get('userdata_' . $param);
        }
    }
}

if (!function_exists('set_userdata')) {
    function set_userdata(array $data)
    {
        $set = array();
        foreach ($data as $k => $v) $set['userdata_' . $k] = $v;
        session()->set($set);
    }
}

if (!function_exists('remove_userdata')) {
    function remove_userdata($keys = null)
    {
        $session = \Config\Services::session();
        $remove = array();
        if ($keys === null) {
            $sesdata = $session->get();
            $userdata = array_filter($sesdata, function ($key) {
                return strpos($key, 'userdata_') === 0;
            }, ARRAY_FILTER_USE_KEY);
            $remove = array_keys($userdata);
        } elseif (is_string($keys)) {
            array_push($remove, 'userdata_' . $keys);
        } elseif (is_array($keys)) {
            foreach ($keys as $k) array_push($remove, 'userdata_' . $k);
        }
        $session->remove($remove);
    }
}

if (!function_exists('is_login')) {
    function is_login()
    {
        $check = array('id', 'user', 'nama', 'foto', 'office', 'role');
        $session = \Config\Services::session();
        $result = array();
        foreach ($check as $ch) array_push($result, $session->has('userdata_' . $ch));
        return (count(array_unique($result)) === 1 && !in_array(false, $result));
    }
}

if (!function_exists('login_page')) {
    function login_page(string $url)
    {
        $session = \Config\Services::session();
        $session->setFlashdata('requested_url', $url);
        return redirect()->to('');
    }
}
