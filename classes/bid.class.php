<?php

class Bid {
	
	public $id;
	public $car_id;
	public $name;
	public $value;
	public $datetime;
	
	public function getBidder(){
		require('includes/db.php');
		require_once('classes/person.class.php');
		
		$person = $db->query('SELECT * FROM person WHERE id = '.$this->person_id)->fetch_object('Person');
		return $person;
	}
	
}