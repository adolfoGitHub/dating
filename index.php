<?php
/*
    Author: Adolfo Gonzalez
    Date:   1/15/2019
    File:   index.php

    This is the Dating Site Control Page.
 */

//php error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


//require autoload
require_once 'vendor/autoload.php';
require_once 'model/validation.php';

//sessions
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
$f3->route('GET|POST /personal_information', function () {
    $template = new Template();

    echo $template->render('views/personal_information.html');

});

//profile route
$f3->route('GET|POST /profile', function ($f3) {
    $_SESSION = array();

    if (isset($POST['first'])) {

        $first = $_POST['first'];

        if (validName($first)) {

            $_SESSION['first'] = $first;

            $f3->reroute('/interests');

        } else {

            $f3->set("error['first']", 'First Name is required');
        }
    }

    if (isset($POST['last'])) {

        $last = $_POST['last'];

        if (validName($last)) {

            $_SESSION['last'] = $last;

            $f3->reroute('/interests');

        } else {

            $f3->set("error['last']", 'Last Name is required');
        }
    }

    if (isset($POST['age'])) {

        $age = $_POST['age'];

        if (validAge($age)) {

            $_SESSION['age'] = $age;

            $f3->reroute('/interests');

        } else {

            $f3->set("error['age']", 'Age is required');
        }
    }

    if (isset($_POST['gender'])) {

        $gender = $_POST['gender'];

        if ($gender !== '') {

            $_SESSION['gender'] = $gender;

            $f3->reroute('/interests');

        } else {

            $f3->set("error['gender']", 'Please select male or female');
        }
    }

    if (isset($_POST['phone'])) {

        $phone = $_POST['phone'];

        if (validPhone($phone)) {

            $_SESSION['phone'] = $phone;

            $f3->reroute('/interests');

        } else {

            $f3->set("error['phone']", 'Please enter your phone number');
        }
    }
    //if everything is good move on
    $template = new Template();

    echo $template->render('views/profile.html');

});

//summary route
$f3->route('GET|POST /interests', function ($f3) {
    $_SESSION = array();

    if (isset($_POST['email'])) {

        $email = $_POST['email'];

        if ($email !== '') {

            $_SESSION['email'] = $email;

            $f3->reroute('/summary');

        } else {

            $f3->set("error['email']", 'Enter a valid email please.');
        }
    }
    if (isset($_POST['state'])) {

        $state = $_POST['state'];

        if ($state !== '') {

            $_SESSION['state'] = $state;

            $f3->reroute('/summary');

        } else {

            $f3->set("error['state']", 'Please select the state you live in.');
        }
    }

    if (isset($_POST['seeking'])) {

        $seeking = $_POST['seeking'];

        if ($seeking !== '') {

            $_SESSION['seeking'] = $seeking;

            $f3->reroute('/summary');

        } else {

            $f3->set("error['seeking']", 'Please select .');
        }
    }

    $bio = $_POST['bio'];

    $_SESSION['bio'] = $bio;

    $f3->set('bio', $_SESSION['bio']);

    $template = new Template();

    echo $template->render('views/interests.html');
});


//display summary route
$f3->route('GET|POST /summary', function ($f3) {

    $_SESSION = array();

        $outdoor = $_POST['outdoor'];

        $_SESSION['outdoor'] = $outdoor;

        $f3->set('outdoor', $_SESSION['outdoor']);

        $indoor = $_POST['indoor'];

        $_SESSION['indoor'] = $indoor;

        $f3->set('indoor', $_SESSION['indoor']);

        $template = new Template();

        echo $template->render('views/summary.html');

});

//run fat free framework
$f3->run();