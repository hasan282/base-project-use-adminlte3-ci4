<?php

if (!function_exists('set_routes')) {
    function set_routes($route)
    {
        $route->get('/', 'Home::index');
        $route->get('/admin', 'Home::admin');

        $route->get('home/(:segment)', 'Home::$1');
    }
}

if (!function_exists('global_options')) {
    function global_options()
    {
        return array(
            'remove_new_line' => false
        );
    }
}

/*
if (!function_exists('function_name')) {
    function function_name()
    {
    }
}
*/