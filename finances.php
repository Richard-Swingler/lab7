<?php 
require_once('includes/predispatch.php');
require_once('includes/header.php');

?>

<!-- main content -->
<div id="content" class="row">
	
	
	<h2>Need Financial Help?</h2>
	
	<!-- trade-in calculator -->
	<div class="col-md-6">
		<h3>Find the trade-in price of your car</h3>
		
		<form id="calculate_car_price" action="" method="GET">
			
			<div class="row">
				<p class="col-md-4">Purchase price</p>
				<input type="text" name="carPurchasePrice" value="" class="col-md-4"/>
			</div>
			
			<div class="row">
				<p class="col-md-4">Age</p>
				<select name="carAge" class="col-md-4">
					<option value="1">1 year</option>
					<option value="2">2 years</option>
					<option value="3">3 years</option>
					<option value="4">4 years</option>
					<option value="5">5 years</option>
					<option value="6">6 years</option>
					<option value="7">7 years</option>
					<option value="8">8 or more</option>
				</select>
			</div>
			
			<div class="row">
				<input type="submit" class="btn btn-primary col-md-offset-4" value="Calculate the price!" onClick="calculateCarValue(this.form)" />
			</div>
			
		</form>
		
	</div><!-- /trade-in calculator -->
	
	
	<!-- borrow calculator -->
	<div class="col-md-6">
		<h3>Need to borrow some money to buy that dream hot rod?</h3>

		<div class="row">
			<p class="col-md-4">How much to borrow?</p>
			<input type="text" id="borrowValue" name="borrowValue" value="" class="col-md-4"/>
		</div>
		
		<div class="row">
			<p class="col-md-4">Age</p>
			<select id="borrowTime" name="borrowTime" class="col-md-4">
				<option value="1">1 month</option>
				<option value="12">1 year</option>
				<option value="24">2 years</option>
				<option value="60">5 years</option>
				<option value="120">10 years</option>
				<option value="240">20 years</option>
				<option value="1200">My lifetime</option>
			</select>
		</div>

		<div class="row">
			<input type="submit" class="btn btn-primary col-md-offset-4" value="Calculate your loan" onClick="calculateLoan()" />
		</div>
		
		<div>
			<p><span id="borrowTotalMonthly" class="calculatorOutput"></span></p>
			<p><span id="borrowTotal" class="calculatorOutput"></span></p>
		</div>
		
	</div><!-- /borrow calculator -->
	
	
</div><!-- /main content -->


<?php require_once('includes/footer.php'); ?>