<?php

if (!function_exists('mmd5')) {
    /**
     * Hash to 32-char String with md5
     * @param string $text The String Input
     * @return string The Hash 32-character
     */
    function mmd5(string $text)
    {
        $md5 = md5($text);
        $text = 'EncRypT.tH1s.' . $text . '.t0.' . $md5 . 'w1tH.md5';
        return md5($text);
    }
}
