<?php
//To check if the user comes into this page the correct path use te PHP function isset

if (isset($_POST['submit']))
{

//
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';
//check for error in signup process

	//for empty statement error
	if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false)
//If there is an error take the user back to signup page with error message
	{
	header("location: ../signup.php?error=emptyinput");
	exit();
	}
	
	if (invalidUid($username) !== false) {
	header("location: ../signup.php?error=invalidUid");
	exit();
	}

	//The function invalidEmail check if the password match
	if (invalidEmail($email) !== false) {
	header("location: ../signup.php?error=invalidemail");
	exit();
	}

	//The function pwdMatch checks if password match, if they don't the error message pops up
	if (pwdMatch($pwd, $pwdRepeat) !== false) {
	header("location: ../signup.php?error=passwordsdontmatch");
	exit();
	}
	if (uidExists($conn, $username, $email) !==false) {
	header("location: ../signup.php?error=usernametaken");
	exit();
	}
	createUser($conn, $name, $email, $username, $pwd);
	}

	//This command sends the user back to the signup page, the user gets access after all checks are completed.

else {
		header("location: ../signup.php");
	exit();
}