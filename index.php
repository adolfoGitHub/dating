<?php
/*
    Author: Adolfo Gonzalez
    Date:   1/15/2019
    File:   index.php

    This is the Dating Site Main Page.
 */
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload
require_once('vendor/autoload.php');

//create an instance of the BASE CLASS
$f3 = Base::instance();

//turn on fat-free error reporting
$f3->set('DEBUG', 3);

//define a default route
$f3->route('GET /', function(){
    $view = new view();
    echo $view->render('views/home.html');
});

//run fat free framework
$f3->run();