<?php

if (!function_exists('uuid4')) {

    /**
     * @return string
     */
    function uuid4()
    {
        return \Ramsey\Uuid\Uuid::uuid4()->toString();
    }
}

if (!function_exists('datetime')) {

    /**
     * @param string $time
     * @param string $format
     *
     * @return string
     */
    function datetime($time = 'now', $format = DateTime::ISO8601)
    {
        return (new DateTime($time))->format($format);
    }
}

if (!function_exists('base_path')) {

    /**
     * @param string $path
     *
     * @return string
     */
    function base_path(string $path = '')
    {
        return __DIR__ . DIRECTORY_SEPARATOR . $path;
    }
}

if (!function_exists('app_path')) {

    /**
     * @param string $path
     *
     * @return string
     */
    function app_path(string $path = '')
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $path;
    }
}
