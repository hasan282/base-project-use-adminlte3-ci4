<?php

if (!function_exists('env_is')) {
    /** Cek Environment saat ini
     * @param string $env tipe environtment
     */
    function env_is(string $env)
    {
        // $environtment = getenv('CI_ENVIRONMENT') ?: 'production';
        $environtment = getenv('SELF_ENVIRONMENT') ?: 'production';
        return ($env == $environtment);
    }
}

function setAllRoutes($routes)
{
    $routes->get('/', 'Home::index');
    $routes->get('/admin', 'Home::admin');
}
