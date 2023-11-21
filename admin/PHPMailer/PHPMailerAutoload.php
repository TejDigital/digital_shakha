<?php

spl_autoload_register(function ($classname) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
    $filename = __DIR__ . DIRECTORY_SEPARATOR . $classPath . '.php';
    if (is_readable($filename)) {
        require $filename;
    }
});
