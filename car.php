<?php
require_once('includes/predispatch.php');
require_once('includes/header.php');

// get the database connection
require('includes/db.php');
// get the car and bid classes
require_once('classes/car.class.php');
require_once('classes/bid.class.php');

?>

<!-- main content -->
<div id="content" class="row">
	
	
	<?php
	
	try{
		// check that the ID exists and it is the correct type
		if(!isset($_GET['id']) OR empty($_GET['id']) OR !is_numeric($_GET['id'])) throw new Exception('The car ID must be specified in order to view the car information. Please go back and try again.');
		
		// get the manufacturer we are dealing with
		// ensuring we escape the GET string
		$car = $db->query('SELECT * FROM car WHERE id = '.$db->real_escape_string($_GET['id']))->fetch_object('Car');
		
		// get all of the bids for this car
		$bids = $db->query('SELECT * FROM bid WHERE car_id= '.$db->real_escape_string($_GET['id']).' ORDER BY value DESC LIMIT 10');
		?>
		
		<h2>Car - <?=$car->model?> (<?=$car->regNumber?>)</h2>
		
		<!-- car profile -->
		<div class="row">
			
			<div>
				<dl class="dl-horizontal">
					<dt>Model</dt>
						<dd><?=$car->model?></dd>
					<dt>Price</dt>
						<dd><?=$car->price?></dd>
					<dt>Registration</dt>
						<dd><?=$car->regNumber?></dd>
					<dt>Registration Date</dt>
						<dd><?=$car->regDate?></dd>
					<dt>Description</dt>
						<dd><?=$car->description?></dd>
				</dl>
			</div>
			
			<div>
				<h3>Current Bids</h3>
				<p class="text-muted">Only the 10 most recent bids.</p>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Bid Ref</th>
							<th>Bidder</th>
							<th>Bid value</th>
							<th>Submittted</th>
						</tr>
					</thead>
					<tbody>
						<?php while($bid = $bids->fetch_object("Bid")): ?>
							<tr>
								<td><?=$bid->id?></td>
								<td><?=$bid->getBidder()->username?></td>
								<td>&pound;<?=number_format($bid->value)?></td>
								<td><?=$bid->datetime?></td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
			
			
			
		</div><!-- /car profile -->
		
		<!-- car bid form -->
		<div class="row">
			<h3>Place A Bid!</h3>

			<form role="form" action="process-bid.php" method="post" class="col-md-4">
				<div class="form-group">
					<label for="bidderName">Name</label>
					<input name="name" type="text" class="form-control" id="bidderName" placeholder="Your name">
				</div>
				
				<div class="form-group">
					<label for="bidValue">Bit Amount</label>
					<div class="input-group">
						<span class="input-group-addon">&pound;</span>
						<input name="value" type="text" class="form-control" id="bidValue" placeholder="Bid Amount">
					</div>
				</div>
				
				<input name="car_id" type="hidden" id="carId" value="<?=$_GET['id']?>">
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
						
		</div><!-- /car bid form -->
	<?php
	}
	catch(Exception $e){
		echo '<div class="alert alert-danger">';
		echo 	'<strong>Error!</strong>';
		echo 	'<p>'.$e->getMessage().'</p>';
		echo '</div>';
	}
	
	?>
	
</div><!-- /main content -->


<?php require_once('includes/footer.php'); ?>