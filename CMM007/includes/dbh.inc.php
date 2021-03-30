<?php
//connecting to database

$severName = "localhost";
$dbuserName = "root";
$dbPassword = "";
$dbName = "flyingshoes";

$conn = mysqli_connect($severName, $dbuserName, $dbPassword, $dbName);

if(!$conn) {
	die("connection failed" .mysqli_connect_error());
}

//connecting to the gallery table in the flyingshoes database

$severName = "localhost";
$dbuserName = "root";
$dbPassword = "";
$dbName = "flyingshoes";

$conn = mysqli_connect($severName, $dbuserName, $dbPassword, $dbName);

if(!$conn) {
	die("connection failed" .mysqli_connect_error());
}	