<?php
require_once('includes/predispatch.php');
require('includes/db.php');

try{
	if(!isset($_POST['username']) OR empty($_POST['username']) OR !is_string($_POST['username'])) throw new Exception('Missing or invalid username.');
	if(!isset($_POST['password']) OR empty($_POST['password']) OR !is_string($_POST['password'])) throw new Exception('Missing or invalid password.');
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	//searches for an entry matching the username entered in the database.
	$query = $db->query("SELECT * FROM person WHERE username='$username'");
	//check if there is a row returned (a.k.a if the entry exists)
	$numrows = mysqli_num_rows($query);
	//Check if username and password exist in the database
	if ($numrows != 0 ){

		$row = mysqli_fetch_assoc($query);
		
		if($password == $row['password']){
			echo '<pre>$_POST contains: ';
			print_r($_POST);
			echo '</pre>';
	
		}
		else{
			die("incorrect password!");
		}
	}
	else{
		die("incorrect username");
	}
	//Side-note a bit insecure tro mention that only one of the two credentials are wrong as it could help intruders deduce usernames or guess password.
	//assign id, logged and username to session
	$_SESSION["loggedIn"] = true;
	$_SESSION["username"] = $username;
	$_SESSION["person_id"] = $row['id'];
	
	print_r($_SESSION);


	
}
catch(Exception $e){
	echo $e->getMessage();
}