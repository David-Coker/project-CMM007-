<?php

// This funcion checks for empty fields
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
	$result;
	//check if there's data passed
	if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	}
	else {
	$result = false;
		}
	return $result;
}

function invalidUid($username) {
	$result;
	if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		$result = true;
	}
	else{
	$result = false;
		}
	return $result;
}
//Check for invalid email using the built in function
function invalidEmail($email) {
	$result;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
	$result = false;
		}
	return $result;
}
//To check if the password match
function pwdMatch($pwd, $pwdRepeat) {
	$result;
	if($pwd !== $pwdRepeat) {
		$result = true;
	}
	else{
	$result = false;
		}
	return $result;
}
//To check if the function already exist in the database
function uidExists($conn, $username, $email) {
	//The ? is used as a placeholder (to enable a  prepared statement against SQL injection)
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	//creating a prepared statement (protects the database)
	$stmt = mysqli_stmt_init($conn);
	//check for any error from the prepared statement above 
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	//The second parameter ss indicates that we are passing a string(2 strings)
	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);
	
	//To collect data from the database called $stmt
	$resultData = mysqli_stmt_get_result($stmt);
	//fetch data as an associative array
	if ($row = mysqli_fetch_assoc($resultData)) 
	//obtain data to login the user*
	{
		return $row;
	}
	else {
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
	}


function createUser($conn, $name, $email, $username, $pwd) {
	$sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
	//creating a prepared statement
	$stmt = mysqli_stmt_init($conn);
	//check for any error from the prepared statement above 
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	//hashing the password to make the login system secured

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../signup.php?error=none");
	exit();
	}

	// This funcion checks for empty fields
function emptyInputLogin($username, $pwd) {
	$result;
	//check if there's data passed
	if (empty($username) || empty($pwd)) {	
			$result = true;
	}
	else {
	$result = false;
		}
	return $result;
}	

function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username, $username);

	//error handler to check if the user credentials are true
	if ($uidExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	} 
	else if ($checkPwd ===true) {
		session_start();
		$_SESSION["userid"] = $uidExists["usersId"];
		$_SESSION["useruid"] = $uidExists["usersUid"];
		header("location: ../index.php");
		exit();
	}
}



