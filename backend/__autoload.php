<?php

function __autoload ($class)
{
    $class= str_replace('\\', '/', $class);
    $classFile= "./{$class}.php";
    if (file_exists($classFile)) {
        require_once($classFile);
    }
}

function debug($data) 
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}