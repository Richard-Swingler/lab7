<?php

/*
array of pages
this builds the navigation list

format:
filename => URL name
*/
$navArray = array(
	'index'			=> 'Home',
	'manufacturers'	=> 'Manufacturers',
	'finances'		=> 'Finances',
	'about'			=> 'About',
	'contact'		=> 'Contact Us'
);

?>

<div class="row">
	<div class="col-md-8">
		<ul class="nav nav-tabs">
			
			<?php // iterate through each nav item - also use the array key as $key ?>
			<?php foreach($navArray as $key => $nav) : ?>
				<?php
				// see if the string exists in the server script name
				// this is the name and path from the root URL of the file
				// if the current page is the item in the loop, add class="active"
				if(strstr($_SERVER['SCRIPT_NAME'], $key)) $active = 'class="active"';
				else $active = '';
				?>
				
				<?php // create the list item adding in the class="active" if needed, the href and link name ?>
				<li <?=$active; ?>><a href="<?=$key; ?>.php"><?=$nav; ?></a></li>
			<?php endforeach; ?>
			
		</ul>
	</div>
	<div class="col-md-4">
		<?php require('partials/user-controls.php');?>
	</div>
</div>