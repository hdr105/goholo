<!DOCTYPE html>
<html lang="en">
<head>
	<title>Goholo | Contact us</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/affiliate/images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/affiliate/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/affiliate/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/affiliate/fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/affiliate/vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/affiliate/vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/affiliate/vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/affiliate/vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/affiliate/vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/affiliate/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/affiliate/css/main.css">

</head>
<body>


	<div class="container-contact100">
		<div class="contact100-map" ></div>

		<div class="wrap-contact100">

			<?php

			if ($success) {
			?>
			<div class="alert alert-success">
				We have recieved your inquiry. We will get back to you soon.
			</div>

			<?php
		}
		if ($error) {
		?>

		<div class="alert alert-danger">
			Server issue! Inquiry not recieved.
		</div>

		<?php
	}

	?>
	<form class="contact100-form validate-form" action="" method="post">
		<span class="contact100-form-title">
			Contact Us
		</span>

		<div class="wrap-input100 validate-input" data-validate="Please enter your name">
			<input class="input100" type="text" name="name" placeholder="Full Name">
			<span class="focus-input100"></span>
		</div>

		<div class="wrap-input100 validate-input" data-validate = "Please enter email: e@a.x">
			<input class="input100" type="text" name="email" placeholder="Email">
			<span class="focus-input100"></span>
		</div>

		<div class="wrap-input100 validate-input" data-validate = "Please enter your message">
			<textarea class="input100" name="message" placeholder="Your Message"></textarea>
			<span class="focus-input100"></span>
		</div>

		<div class="container-contact100-form-btn">
			<input type="hidden" name="userid" value="<?=$userid?>">
			<input type="submit" value="Send Email" class="contact100-form-btn">
		</div>
	</form>
</div>
</div>




<script src="<?php echo base_url(); ?>assets/affiliate/vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="<?php echo base_url(); ?>assets/affiliate/vendor/animsition/js/animsition.min.js"></script>

<script src="<?php echo base_url(); ?>assets/affiliate/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/affiliate/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/affiliate/vendor/select2/select2.min.js"></script>

<script src="<?php echo base_url(); ?>assets/affiliate/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/affiliate/vendor/daterangepicker/daterangepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/affiliate/vendor/countdowntime/countdowntime.js"></script>

<script src="<?php echo base_url(); ?>assets/affiliate/js/main.js"></script>

</body>
</html>
