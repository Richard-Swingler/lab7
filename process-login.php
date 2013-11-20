<?php
require_once('includes/predispatch.php');
require('includes/db.php');

try{
	if(!isset($_POST['username']) OR empty($_POST['username']) OR !is_string($_POST['username'])) throw new Exception('Missing or invalid username.');
	if(!isset($_POST['password']) OR empty($_POST['password']) OR !is_string($_POST['password'])) throw new Exception('Missing or invalid password.');
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
	echo '<pre>$_POST contains: ';
		print_r($_POST);
	echo '</pre>';
}
catch(Exception $e){
	echo $e->getMessage();
}