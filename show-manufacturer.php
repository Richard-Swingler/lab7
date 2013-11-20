<?php
require_once('includes/predispatch.php');
require_once('includes/header.php');

// get the database connection
require('includes/db.php');
// get the manufacturer and car classes
require_once('classes/manufacturer.class.php');
require_once('classes/car.class.php');

?>

<!-- main content -->
<div id="content" class="row">
	
	
	<?php
	
	try{
		// check that the ID exists and it is the correct type
		if(!isset($_GET['id']) OR empty($_GET['id']) OR !is_numeric($_GET['id'])) throw new Exception('The manufacturer ID must be specified in order to view the cars available. Please go back and try again.');
		
		// get the manufacturer we are dealing with
		// ensuring we escape the GET string
		$manufacturer = $db->query('SELECT * FROM manufacturer WHERE id = '.$db->real_escape_string($_GET['id']))->fetch_object('Manufacturer');;
		
		// get all of the cars by this manufacturer
		$cars = $db->query('SELECT * FROM car WHERE manufacturer_id= '.$db->real_escape_string($_GET['id']));
		?>
		
		<h2>See all cars we have available from <?=$manufacturer->name?></h2>
	
		<!-- car list -->
		<div id="car-list" class="row">
			
			<?php while($car = $cars->fetch_object("Car")): ?>
				<div class="car-item">
					<div class="row">
						<div class="col-md-6"><h3><?=$car->model?></h3></div>
						<div class="col-md-4 pull-right"><a href="car.php?id=<?=$car->id?>" class="btn btn-primary pull-right">View more information</a></div>
					</div>
						
					<div class="row">
						<div class="col-md-6"><strong><?=$car->regDate?> (<?=$car->regNumber?>)</strong></div>
						<div class="col-md-4 pull-right"><p class="car-price pull-right"><strong>&pound;<?=$car->price?></strong><p></div>
					</div>
					
					<p><?=$car->description?></p>
				</div>
			<?php endwhile; ?>
			
		</div><!-- /car list -->
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