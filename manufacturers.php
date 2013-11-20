<?php
require_once('includes/predispatch.php');
require_once('includes/header.php');

// get the database connection
require('includes/db.php');
// get the manufacturer class
require_once('classes/manufacturer.class.php');

// get all of the manufacturers
$manufacturers = $db->query("SELECT * FROM manufacturer");
?>

<!-- main content -->
<div id="content" class="row">
	
	<h2>We have cars from many manufacturers around the world!</h2>
	
	<!-- manufacturer list -->
	<div id="manufacturer-list" class="row">
		
		<!-- list-group -->
		<div class="list-group col-md-6">
			<?php
			// iterate through each manufacturer and create a readable list
			while($manufacturer = $manufacturers->fetch_object('Manufacturer')): ?>
				<a href="show-manufacturer.php?id=<?=$manufacturer->id?>" class="list-group-item">
					<h4 class="list-group-item-heading"><?=$manufacturer->name?></h4>
					<p class="list-group-item-text">Country of origin: <?=$manufacturer->country?></p>
				</a>
			<?php endwhile; ?>
		</div><!-- /list-group -->
		
	</div><!-- /manufacturer list -->
	
</div><!-- /main content -->


<?php require_once('includes/footer.php'); ?>