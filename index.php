<?php 
require_once('includes/predispatch.php');
require_once('includes/header.php');

?>

<!-- main content -->
<div id="content" class="row">
	
	
	<div class="col-md-7">
		<p>Welcome to Boyd's Used Motors!!! We have some of the finest cars with only minor problems.</p>
		
		<p>We have been voted best car company in the UK by our employees 8 years running. <br/>Boyd's Used Motors has been running for over 13 years selling reliable used cars to the first person to walk in the door.</p>
		
		<p>We saw you coming and made a special price just for you! That's the quality service you can expect from our friendly staff.</p>
	</div>
	
	<!-- sidebar -->
	<div id="sidebar" class="col-md-4 pull-right">
		<img src="img/sales-boyd.png" width="100%" class="img-rounded"></img>
		<p class="caption text-muted">Our trustworthy staff, sales lad Boyd!</p>
		
		<img src='img/car-blue.png' id="car" height="256px" />
		<h4>View our range of colours available for new cars today!</h4>
		
		<p class="btn btn-primary" onClick="changeCar()">Click here to get a random car colour</p>
	</div><!-- /sidebar -->
	
	
	
</div><!-- /main content -->


<?php require_once('includes/footer.php'); ?>