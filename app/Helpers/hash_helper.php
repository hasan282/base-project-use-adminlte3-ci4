<?php

if (!function_exists('sha3hash')) {
    /**
     * hash string with sha3-256
     * @param string $text a string text
     * @param int $length max length 64
     */
    function sha3hash(string $text, int $length = 32): string
    {
        $key = '_y0ur_k3YwoRd_i5_s3tup_!n_tH!s_vAr_';

        $chars = $length < 64 ? $length : 64;
        $offset = $chars < (64 - 1) ? floor((64 - $chars) / 2) : 0;
        $result = hash_hmac('sha3-256', $text, $key);

        return substr($result, $offset, $chars);
    }
}
