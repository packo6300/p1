<?php
spl_autoload_register(function ($name) {
    $class =$name.'.php';    
    include $class;
});

