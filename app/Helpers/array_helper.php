<?php

if (!function_exists('prefix_key_filter')) {
    function prefix_key_filter(array $array, string $prefix, string $value = null)
    {
        $result = array();
        foreach ($array as $key => $val) {
            $prefixCondition = (strpos($key, $prefix) === 0);
            $valueCondition = true;
            if ($value !== null) $valueCondition = ($val == $value);
            if ($prefixCondition && $valueCondition) {
                $result[] = substr($key, strlen($prefix));
            }
        }
        return $result;
    }
}
