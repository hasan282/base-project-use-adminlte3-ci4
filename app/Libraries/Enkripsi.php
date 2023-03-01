<?php

namespace App\Libraries;

class Enkripsi
{
    private const METHOD = 'aes128';
    private $key;

    public function __construct()
    {
        $this->key = md5('J4smine1ndah');
    }

    public static function encrtypt(string $text)
    {
    }
}
