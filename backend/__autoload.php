<?php
// echo '<pre>';

// fixing autoload register
spl_autoload_register("myAutoload");

function myAutoload ($class)
{
    // echo __FILE__.'<br>';
    $class= str_replace('\\', '/', $class);
    $classFile= "./{$class}.php";
    if (file_exists($classFile)) {
        require_once $classFile;
        // echo "Loaded: {$classFile}<br>";
    } else {
        $lastDash= strrpos($classFile, '/');
        $classFile= substr($classFile, 0 , $lastDash).'.php';
        if (file_exists($classFile)) {
            require_once $classFile;
            // echo "Loaded: {$classFile}<br>";
        }
    }
}

// debug 
function debug($data) 
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}