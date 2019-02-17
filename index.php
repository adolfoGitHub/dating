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
require_once('vendor/autoload.php');
//validation file
require_once('model/validation.php');

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
$f3->route('GET|POST /personal_information', function ($f3) {
    //session array
    $_SESSION = array();
    if (isset($POST['first'])) {
        $first = $_POST['first'];
        if (validName($first)) {
            $_SESSION['first'] = $first;
        } else {
            $f3->set("error['first']", 'First Name is required.');
        }
    }
    if (isset($POST['last'])) {
        $last = $_POST['last'];
        if (validName($last)) {
            $_SESSION['last'] = $last;
        } else {
            $f3->set("error['last']", 'Last Name is required.');
        }
    }
    if (isset($POST['age'])) {
        $age = $_POST['age'];
        if (validAge($age)) {
            $_SESSION['age'] = $age;
        } else {
            $f3->set("error['age']", 'Age is required.');
        }
    }
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
        $_SESSION['gender'] = $gender;
    }
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        if (validPhone($phone)) {
            $_SESSION['phone'] = $phone;
        } else {
            $f3->set("error['phone']", 'Please enter your phone number');
        }
    }
    if (!empty ($_POST['first']) and !empty($_POST['last']) and !empty($_POST['age']) and !empty($_POST['phone'])) {

        if (isset($_SESSION['membership'])) {
            $member = new PremiumMember($_SESSION['first'], $_SESSION['last'], $_SESSION['age'], $_SESSION['gender'], $_SESSION['phone']);
        } else {
            $member = new Member($_SESSION['first'], $_SESSION['last'], $_SESSION['age'], $_SESSION['gender'], $_SESSION['phone']);
        }
        $_SESSION['member'] = $member;
        $f3->reroute('/profile');
    }
    $template = new Template();
    echo $template->render('views/personal_information.html');

});

//summary route
$f3->route('GET|POST /profile', function ($f3) {
    //session variables
    $_SESSION['email'] = null;
    $_SESSION['state'] = null;
    $_SESSION['seeking'] = null;
    $_SESSION['bio'] = null;

    //check email
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;
        if (empty($_POST['email'])) {
            $f3->set("error['email']", 'Enter a valid email please.');
        }
    }
    if (isset($_POST['state'])) {
        $state = $_POST['state'];
        $_SESSION['state'] = $state;
    }
    if (isset($_POST['seeking'])) {
        $seeking = $_POST['seeking'];
        $_SESSION['seeking'] = $seeking;
    }
    if (isset($_POST['bio'])) {
        $bio = $_POST['bio'];
        $_SESSION['bio'] = $bio;
    }
    //add values to member
    $_SESSION['member']->setEmail($_SESSION['email']);
    $_SESSION['member']->setState($_SESSION['state']);
    $_SESSION['member']->setSeeking($_SESSION['seeking']);
    $_SESSION['member']->setBio($_SESSION['bio']);
    if (!empty($_POST['email']) and isset($_SESSION['membership'])) {
        $f3->reroute('/interests');
    }
    if (!empty($_POST['email'])) {
        $f3->reroute('/summary');
    }
    $template = new Template();
    echo $template->render('views/profile.html');
});

//array variables
$f3->set('indoor', array('tv', 'puzzles', 'movies', 'reading', 'cooking', 'cards', 'board', 'video'));
$f3->set('outdoor', array('hiking', 'walking', 'biking', 'climbing', 'swimming', 'collecting'));

//interests validation
$f3->route('GET|POST /interests', function ($f3) {

    $_SESSION['indoor'] = array();
    $_SESSION['outdoor'] = array();

    if (isset($_POST['indoor'])) {
        $indoor = $_POST['indoor'];
        foreach ($indoor as $activity) {
            if (validIndoor($activity)) {
                $_SESSION['indoor'][] = $activity;
            } else {
                $f3->set("error['indoor']", 'Invalid indoor interests.');
            }
        }
    }
    if (isset($_POST['outdoor'])) {
        $outdoor = $_POST['outdoor'];
        foreach ($outdoor as $activity) {
            if (validOutdoor($activity)) {
                $_SESSION['outdoor'][] = $activity;
            } else {
                $f3->set("error['outdoor']", 'Invalid outdoor interests.');
            }
        }
    }
    if ($f3->get("error['indoor']") == null and $f3->get("error['outdoor']") == null) {
        if (isset($_POST['submit'])) {
            if (isset($_SESSION['membership'])) {
                $_SESSION['member']->setInDoorInterests($_SESSION['indoor']);
                $_SESSION['member']->setOutDoorInterests($_SESSION['outdoor']);
            }
            $f3->reroute('/summary');
        }
    }
    $template = new Template();
    echo $template->render('views/interests.html');
});

//display summary route
$f3->route('GET|POST /summary', function ($f3) {

    $template = new Template();
    echo $template->render('views/summary.html');
});

//run fat free framework
$f3->run();