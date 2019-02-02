<?php
/*
    Author: Adolfo Gonzalez
    Date:   1/15/2019
    File:   index.php

    This is the Dating Site Control Page.
 */

//php error reporting
error_reporting(E_ALL);
ini_set('display_errors', 3);

//require autoload
require_once'vendor/autoload.php';
session_start();

//instance of the BASE CLASS
$f3 = Base::instance();

//fat-free error reporting
$f3->set('DEBUG', 3);

//default route
$f3->route('GET|POST /', function () {
    $template = new Template();
    echo $template->render('views/home.html');
});

//personal info route
$f3->route('GET|POST /personal_information', function() {
    $template = new Template();
    echo $template->render('views/personal_information.html');
});

//run fat free framework
$f3->run();