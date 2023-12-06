<?php

/**
 * global hash key for application
 */
define('HASH_KEYWORD', md5('_y0ur_k3YwoRd_i5_s3tup_!n_tH!s_vAr_'));

if (!function_exists('sha3hash')) {
    /**
     * hash string with sha3-256
     * @param string $text a string text
     * @param int $length max length 64
     */
    function sha3hash(string $text, int $length = 32): string
    {
        $chars = $length < 64 ? $length : 64;
        $offset = $chars < (64 - 1) ? floor((64 - $chars) / 2) : 0;
        $result = hash_hmac('sha3-256', $text, HASH_KEYWORD);
        return substr($result, $offset, $chars);
    }
}

if (!function_exists('myhash')) {
    /**
     * hash string with A-Z result length 32
     * @param string $text a string text
     * @param int $src type of source 1 to 9
     */
    function myhash(string $text, int $src = 1): string
    {
        $alpha = '0123456789abcdefghijklmnopqrstuvwxyz';
        $source = array(
            'bUNrp07MaFYk8o9HhCJRqsDA1Veu2wPzytif5B4QmWZ6XTGS3cELvKxdn',
            'XHZJv9NGsUiAoBFkh1QC2e6fYKPaR04TpxbV58mrdLqucny7Wtz3wMSDE',
            'dNyw9kCs5MupmPqA3aBRbJFUGxEhfTvcLKW04HYez8onDt76iXQ12rZVS',
            'hoNRdXcGmZeWQuT6pviP8Lr2U3zV04DfEsA1HJFn5BCk9bM7YatSyKqxw',
            'zp43ELhmq8HAuR9PeavrWGoCZ5QnTXyt6ikVBDsJKFbf2Mc7xSU1dNwY0',
            'pQ2vfEU91A4FzYbDSM7qmVxtaNH0Xn5LkoPeCyshi38cRTGBd6WJuZrKw',
            '45xYGM1zDmBHUTXAepFbZ38t7kf9QRnvwPsar0cNq6hJyKC2oiuVdLWES',
            'eKbSX6QBZcdvUM5VTxkW0GY4D3tfa29JPohrqHRLswzN7E8uimAnpCF1y',
            'Hof4Nc5zU6nVLCXqPtSJQRmGY9ZkAesrwua1Ty8bhK2vEWFDMx7pBd30i'
        );
        $sourcekey = $src > 0 && $src < 10 ? $src : 1;
        $beta = $source[$sourcekey];
        $betalen = strlen($beta);
        $hash = hash_hmac('sha3-256', $text, HASH_KEYWORD);
        $res1 = substr($hash, 0, 32);
        $res2 = substr($hash, -32);
        $res3 = HASH_KEYWORD;
        $res4 = md5($text);
        $result = '';
        for ($h = 0; $h < 32; $h++) {
            $pos =
                strpos($alpha, $res1[$h]) +
                strpos($alpha, $res2[$h]) -
                strpos($alpha, $res3[$h]) -
                strpos($alpha, $res4[$h]);
            if ($pos > $betalen - 1) $pos = $pos - $betalen;
            if ($pos < 0) $pos = $betalen + $pos;

            $result .= $beta[intval($pos)];
        }
        return $result;
    }
}
