<?php 
require_once('includes/predispatch.php');
require('includes/db.php');

// get the car and bid classes
require_once('classes/car.class.php');
require_once('classes/bid.class.php');

require_once('includes/header.php');
?>


<!-- main content -->
<div id="content" class="row">
	
	<h2>Placing your bid&hellip;</h2>
	
	<?php
	if(isset($_GET['bid_id']) AND !empty($_GET['bid_id']) AND is_numeric($_GET['bid_id'])){
		
		// get the bid we are dealing with
		// ensuring we escape the GET string
		$bid = $db->query('SELECT * FROM bid WHERE id = '.$db->real_escape_string($_GET['bid_id']))->fetch_object('Bid');
		
		// get the car we placed a bid on
		$car = $db->query('SELECT * FROM car WHERE id = '.$bid->car_id)->fetch_object('Car');
		
		$regDate = new DateTime($car->regDate);
		
	?>
		<div class="alert alert-success">
			<strong>Congratulations!</strong>
			<p>You have successfully placed a bid for <strong>&pound;<?=number_format($bid->value)?></strong> on the <strong><a href="car.php?id=<?=$car->id?>"><?=$regDate->format('Y')?> <?=$car->model?></a></strong>.</p>
		</div>
	<?php
	}
	else{
	?>	
		<div class="alert alert-danger">
			<strong>Error!</strong>
			<p>Your bid was unsuccessful for an unknown reason. Please try placing a bid again.</p>
		</div>
	<?php
	}
	?>
	
	
</div><!-- /main content -->


<?php require_once('includes/footer.php'); ?>