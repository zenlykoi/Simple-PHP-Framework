<?php

function autoloader($class)
{
    $prefix = 'App\\';

    $class = preg_replace('/^' . preg_quote($prefix) . '/', '', $class);

    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    $path = ROOT_FOLDER . '\\' . $file;

    if (file_exists($path)) {
        require_once $path;
    }
}

spl_autoload_register('autoloader');