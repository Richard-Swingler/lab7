<?php
require_once('includes/predispatch.php');
require('includes/db.php');

try{
	if(!isset($_POST['value']) OR empty($_POST['value']) OR !is_numeric($_POST['value']) OR $_POST['value'] <= 0) throw new Exception('Invalid bid amount. Please go back and try again.');
	if(!isset($_POST['car_id']) OR empty($_POST['car_id']) OR !is_numeric($_POST['car_id'])) throw new Exception('A car ID must be specified in order to place a bid. Please go back and try again.');
	if(!isset($_SESSION['person_id']) OR empty($_SESSION['person_id']) OR !is_numeric($_SESSION['person_id'])) throw new Exception('Missing or invalid person ID in session.');
	
	$car_id = $_POST['car_id'];
	$value = $_POST['value'];
	$person_id = $_SESSION['person_id'];
	
	// check if the bid is higher than the previous bids
	$bids = $db->query("SELECT * FROM bid WHERE car_id = $car_id AND value > $value");
	if($bids->num_rows > 0) throw new Exception('The bid value is too low.');
	
	// otherwise inset the bid record
	$bid = $db->query("INSERT INTO bid (car_id, person_id, value, datetime) VALUES ('$car_id', '$person_id', '$value', NOW())");
	
	// get the newly created DB record
	// this is the record we just made
	$bidId = $db->insert_id;
	
	header('Location: bid-complete.php?bid_id='.$bidId);
}
catch(Exception $e){
	header('Location: bid-complete.php');
}