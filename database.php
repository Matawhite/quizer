<?php
//connect to database
$db_host = 'localhost';
$db_name = 'quizzer';
$db_user = 'root';
$db_pass = 'root';

//creating mysqli object 
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//error handling

if($mysqli->connect_error){
	printf("connect failed: %s\n", $mysqli->connect_error);
	exit();
}

