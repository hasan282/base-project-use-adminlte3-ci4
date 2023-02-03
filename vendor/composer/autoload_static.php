<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc1cdccdf8c6457faf23c6b7dc932c611
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'L' => 
        array (
            'Laminas\\Escaper\\' => 16,
        ),
        'C' => 
        array (
            'CodeIgniter\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Laminas\\Escaper\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-escaper/src',
        ),
        'CodeIgniter\\' => 
        array (
            0 => __DIR__ . '/..' . '/codeigniter4/framework/system',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc1cdccdf8c6457faf23c6b7dc932c611::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc1cdccdf8c6457faf23c6b7dc932c611::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc1cdccdf8c6457faf23c6b7dc932c611::$classMap;

        }, null, ClassLoader::class);
    }
}
