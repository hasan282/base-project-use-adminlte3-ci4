<?php

namespace App\Libraries;

class Api
{
    private $key, $url, $uri;

    public function __construct(array $setup = [])
    {
        $this->_initSetup($setup);
    }

    public function userdata(string $user, string $pass)
    {
        $this->uri = 'data/user';
        $data = $this->_curlGet(['user' => $user, 'pass' => $pass]);
        if ($data['code'] === 200 && $data['data'] != null) {
            return (array) $data['data'][0];
        } else {
            return null;
        }
    }

    public function blankoAvailable(string $asuransi, int $rows = 1)
    {
        if (!env_is('production'))
            $this->url = SURETY_LOCALHOST;
        $this->uri = 'data/blanko';
        $data = $this->_curlGet(array(
            'data' => 'available',
            'asuransi' => $asuransi,
            'office' => userdata('office_id'),
            'rows' => $rows
        ));
        if ($data['code'] === 200 && $data['status']) {
            return $data['data'];
        } else {
            return array();
        }
    }

    public function blankoMark($blankoid)
    {
        if (!env_is('production'))
            $this->url = SURETY_LOCALHOST;
        $this->uri = 'data/blanko';
        $data = $this->_curlPost(
            array('data' => 'marking'),
            array('blanko' => $blankoid)
        );
        if ($data['code'] === 200 && $data['status']) {
            return $data['data'];
        } else {
            return false;
        }
    }

    public function blankoUse(string $blanko, array $data)
    {
        if (!env_is('production'))
            $this->url = SURETY_LOCALHOST;
        $this->uri = 'data/blanko';
        $data = $this->_curlPost(
            array('data' => 'use', 'blanko' => $blanko),
            $data
        );
        if ($data['code'] === 200 && $data['status']) {
            return $data['data'];
        } else {
            return false;
        }
    }

    public function blankoCrash(string $blanko, array $data)
    {
        if (!env_is('production'))
            $this->url = SURETY_LOCALHOST;
        $this->uri = 'data/blanko';
        $data = $this->_curlPost(
            array('data' => 'crash', 'blanko' => $blanko),
            $data
        );
        if ($data['code'] === 200 && $data['status']) {
            return $data['data'];
        } else {
            return false;
        }
    }

    // ----- CORE FUNCTIONS ------------------------------------------

    private function _curlGet(array $params = [], $raw_output = false)
    {
        $result = array();
        $content = $this->url . $this->uri . '?key=' . $this->key;
        foreach ($params as $k => $v) $content .= '&' . $k . '=' . $v;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $content);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $out = curl_exec($curl);
        $result_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($raw_output) {
            $result = array('code' => $result_code, 'output' => $out);
        } else {
            $decoded = json_decode($out);
            $result_status = $decoded->status ?? false;
            $result_data = $decoded->data ?? null;
            $result = array(
                'code' => $result_code,
                'status' => $result_status,
                'data' => $result_data
            );
        }
        curl_close($curl);
        return $result;
    }

    private function _curlPost(array $query = [], array $form_data = [], $raw_output = false)
    {
        $queryString = array_merge(
            array('key' => $this->key),
            $query
        );
        $url = $this->url . $this->uri . '?' . http_build_query($queryString);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($form_data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curl);
        $result_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($raw_output) {
            $result = array('code' => $result_code, 'output' => $output);
        } else {
            $decoded = json_decode($output);
            $result_status = $decoded->status ?? false;
            $result_data = $decoded->data ?? null;
            $result = array(
                'code' => $result_code,
                'status' => $result_status,
                'data' => $result_data
            );
        }
        curl_close($curl);
        return $result;
    }

    private function _initSetup(array $setup)
    {
        $setting = array(
            'key' => '71f87404ce4103f6211d220131ef5b10',
            'url' => SURETY_DOMAIN,
            'uri' => ''
        );
        foreach ($setting as $k => $v) $this->{$k} = $v;
    }
}
