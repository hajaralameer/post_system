<?php
 spl_autoload_register(function ($class_name) {
    // Define directories to look for classes
    $directories = [
        __DIR__ . '/app/core/',
        __DIR__ . '/app/models/',
        __DIR__ . '/app/views/'
    ];

    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}