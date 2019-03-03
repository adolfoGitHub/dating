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
	require_once 'model/database.php';
	
	//session start
	session_start();
	
	//instance of the BASE CLASS
	$f3 = Base ::instance();
	
	//fat-free error reporting
	$f3 -> set('DEBUG', 3);
	
	//default route
	$f3 -> route('GET|POST /', function()
	{
		$template = new Template();
		echo $template -> render('views/home.html');
	});
	
	//interests arrays
	$indoors = ['tv', 'puzzles', 'movies', 'reading', 'cooking', 'cards', 'board', 'video'];
	$outdoors = ['hiking', 'walking', 'biking', 'climbing', 'swimming', 'collecting'];
	
	//personal info route
	$f3 -> route('GET|POST /info', function($f3)
	{
		//instantiate session array
		$_SESSION[] = [];
		//validate first name
		if(isset($_POST['fname'])) {
			$fname = $_POST['fname'];
			if(validName($fname)) {
				$_SESSION['fname'] = $fname;
			}
			else {
				$f3 -> set("errors['fname']", "Please enter your first name.");
			}
		}
		//validate lname name
		if(isset($_POST['lname'])) {
			$lname = $_POST['lname'];
			if(validName($lname)) {
				$_SESSION['lname'] = $lname;
			}
			else {
				$f3 -> set("errors['lname']", "Please enter your last name.");
			}
		}
		//validate age
		if(isset($_POST['age'])) {
			$age = $_POST['age'];
			if(validAge($age)) {
				$_SESSION['age'] = $age;
			}
			else {
				$f3 -> set("errors['age']", "Must be over 18 to become a member.");
			}
		}
		//validate phone number
		if(isset($_POST['phone'])) {
			$phone = $_POST['phone'];
			if(validPhone($phone)) {
				$_SESSION['phone'] = $phone;
			}
			else {
				$f3 -> set("errors['phone']", "Please enter a valid phone number.");
			}
		}
		//check gender field
		if(isset($_POST['gender'])) {
			$gender = $_POST['gender'];
			$_SESSION['gender'] = $gender;
		}
		
		//check if premium member
		if(isset($_POST['premium'])) {
			$_SESSION['premium'] = $_POST['premium'];
		}
		
		//check that fields are filled out if not display errors
		if( !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['age']) && !empty($_POST['gender']) &&
		    !empty($_POST['phone'])) {
			if( !isset($errors['fname']) && !isset($errors['lname']) && !isset($errors['age']) &&
			    !isset($errors['gender']) && !isset($errors['phone'])) {
				//if not premium member
				if( !isset($_SESSION['premium'])) {
					$member = new Member($_SESSION['fname'], $_SESSION['lname'], $_SESSION['age'], $_SESSION['gender'],
						$_SESSION['phone']);
				}
				else {
					$member =
						new PremiumMember($_SESSION['fname'], $_SESSION['lname'], $_SESSION['age'], $_SESSION['gender'],
							$_SESSION['phone']);
				}
				$_SESSION['member'] = $member;
				$f3 -> reroute('/profile');
			}
		}
		//new template for info page
		$template = new Template();
		echo $template -> render('views/info.html');
		
	});
	
	//profile route
	$f3 -> route('GET|POST /profile', function($f3)
	{
		//variables
		$_SESSION['email'] = NULL;
		$_SESSION['state'] = NULL;
		$_SESSION['seeking'] = NULL;
		$_SESSION['bio'] = NULL;
		
		//check if set email
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
			$_SESSION['email'] = $email;
			if(empty($_POST['email'])) {
				$f3 -> set("errors['email']", "Email is not valid.");
			}
		}
		//check state
		if(isset($_POST['state'])) {
			$state = $_POST['state'];
			$_SESSION['state'] = $state;
		}
		//check seeking
		if(isset($_POST['seeking'])) {
			$seeking = $_POST['seeking'];
			$_SESSION['seeking'] = $seeking;
		}
		//check bio
		if(isset($_POST['bio'])) {
			$bio = $_POST['bio'];
			$_SESSION['bio'] = $bio;
		}
		//insert values into member
		$_SESSION['member'] -> setEmail($_SESSION['email']);
		$_SESSION['member'] -> setState($_SESSION['state']);
		$_SESSION['member'] -> setSeeking($_SESSION['seeking']);
		$_SESSION['member'] -> setBio($_SESSION['bio']);
		
		//if not premium
		if( !empty($_POST['email'])) {
			$f3 -> reroute('/summary');
		}
		
		//if premium
		if( !empty($_POST['email']) and isset($_SESSION['premium'])) {
			$f3 -> reroute('/interests');
		}
		
		$template = new Template();
		echo $template -> render('views/profile.html');
	});
	
	//interests validation
	$f3 -> route('GET|POST /interests', function($f3)
	{
		//variables
		$_SESSION['indoors'] = [];
		$_SESSION['outdoors'] = [];
		
		//check indoor interests
		if(isset($_POST['indoors'])) {
			$indoors = $_POST['indoors'];
			foreach($indoors as $activity) {
				if(validOutdoors($activity)) {
					$_SESSION['indoors'][] = $activity;
				}
				else {
					$f3 -> set("errors'outdoors']", "Please select valid indoor interests.");
				}
			}
		}
		
		//check outdoors interests
		if(isset($_POST['outdoors'])) {
			$outdoors = $_POST['outdoors'];
			foreach($outdoors as $activity) {
				if(validOutdoors($activity)) {
					$_SESSION['outdoors'][] = $activity;
				}
				else {
					$f3 -> set("errors'outdoors']", "Please select valid outdoor interests.");
				}
			}
		}
		
		//display errors
		if($f3 -> get("errors['indoors']") == NULL && $f3 -> get("errors['outdoors']") == NULL) {
			//on submit
			if(isset($_POST['submit'])) {
				//if premium
				if(isset($_SESSION['premium'])) {
					$_SESSION['member'] -> setIndoorInterests($_SESSION['indoors']);
					$_SESSION['member'] -> setOutdoorInterests($_SESSION['outdoors']);
				}
				//reroute
				$f3 -> reroute('/summary');
			}
		}
		//render new template
		$template = new Template();
		echo $template -> render('views/interests.html');
	});
	
	//display summary route
	$f3 -> route('GET|POST /summary', function()
	{
		//database
		global $dbh;
		$dbh = new Database();
		
		$dbh -> insertMember($_SESSION['fname'], $_SESSION['lname'], $_SESSION['age'], $_SESSION['gender'],
			$_SESSION['phone'], $_SESSION['email'], $_SESSION['state'], $_SESSION['seeking'], $_SESSION['bio'], 1, '',
			$_SESSION['outdoors'] . $_SESSION['indoors']);
		
		//render new template
		$template = new Template();
		echo $template -> render('views/summary.html');
	});
	
	$f3 -> route('GET|POST /admin', function($f3)
	{
		$dbh = new database();
		//print_r($_POST['member_id']);
		$f3 -> set('members', $dbh -> getMembers());
		$template = new Template();
		echo $template -> render('views/admin.html');
	});
	//run fat free framework
	$f3 -> run();