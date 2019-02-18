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

//session start
session_start();

//instance of the BASE CLASS
$f3 = Base::instance();

//fat-free error reporting
$f3->set('DEBUG', 3);

//validation
require_once 'model/validation.php';

//default route
$f3->route('GET|POST /', function () {
    $template = new Template();
    echo $template->render('views/home.html');
});

$indoor = array('tv', 'puzzles', 'movies', 'reading', 'cooking', 'cards', 'board', 'video');
$outdoor = array('hiking', 'walking', 'biking', 'climbing', 'swimming', 'collecting');

//personal info route
$f3->route('GET|POST /info', function ($f3) {

    $_SESSION[] = array();

    if (isset($_POST['first'])) {
        $first = $_POST['first'];
        if (validName($first)) {
            $_SESSION['first'] = $first;
        } else {
            $f3->set("error['first']", "Please enter your first name to continue on.");
        }
    }

    if (isset($_POST['last'])) {
        $last = $_POST['last'];
        if (validName($last)) {
            $_SESSION['last'] = $last;
        } else {
            $f3->set("error['last']", "Please enter your last name to continue on.");
        }
    }

    if (isset($_POST['age'])) {
        $age = $_POST['age'];
        if (validName($age)) {
            $_SESSION['age'] = $age;
        } else {
            $f3->set("error['age']", "Must be over 18 to become a member.");
        }
    }

    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        if (validName($phone)) {
            $_SESSION['phone'] = $phone;
        } else {
            $f3->set("error['phone']", "Please enter a valid phone number.");
        }
    }

    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
        $_SESSION['gender'] = $gender;
    } else {
        $f3->set("error['gender']", "Please select male or female under gender.");
    }

    $premium = $_POST['premium'];

    if ($premium === true) {
        $memberPremium = new PremiumMember($_SESSION['first'], $_SESSION['last'], $_SESSION['age'],
            $_SESSION['gender'], $_SESSION['phone']);
        $_SESSION['memberPremium'] = $memberPremium;
        $f3->reroute('/profile');

    } else {
        $member = new Member($_SESSION['first'], $_SESSION['last'], $_SESSION['age'],
            $_SESSION['gender'], $_SESSION['phone']);
        $_SESSION['member'] = $member;
        $f3->reroute('/profile');
    }

    $template = new Template();
    echo $template->render('views/info.html');

});


//summary route
$f3->route('GET|POST /profile', function ($f3) {

    $template = new Template();
    echo $template->render('views/profile.html');
});


//interests validation
$f3->route('GET|POST /interests', function ($f3) {


    $template = new Template();
    echo $template->render('views/interests.html');
});


//display summary route
$f3->route('GET|POST /summary', function () {

    $template = new Template();
    echo $template->render('views/summary.html');
});

//run fat free framework
$f3->run();