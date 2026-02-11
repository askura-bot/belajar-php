<?php

spl_autoload_register(function ($class) {
    $class = str_replace('App\\', '', $class);
    require __DIR__ . '/../app/' . $class . '.php';
});

