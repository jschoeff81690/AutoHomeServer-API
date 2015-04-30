<?php
// landing view
?>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Manage your project as a team">
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url;?>assets/css/bootstrap.min.css"
	rel="stylesheet">
<link href="<?php echo base_url;?>assets/css/dashboard.css"
	rel="stylesheet">
<link href="<?php echo base_url;?>assets/css/flat-ui.css"
	rel="stylesheet">
<link href="<?php echo base_url;?>assets/css/landing.css"
	rel="stylesheet">
<link href="<?php echo base_url;?>assets/css/font-awesome.css"
	rel="stylesheet">
</head>

<body>
	<div class="container-fluid" style="background-color: #fff;">
		<div class="row">
			<div class="blue-bar">
				<div class=" hidden-xs col-md-offset-10 col-md-1 green-bubble ">Need
					Help?</div>
			</div>
		</div>
		<div class="row">
			<div class=" col-md-offset-1 col-md-2 col-xs-7">
				<img src="<?php echo base_url;?>assets/images/logo_small.png"
					height=100px;>
			</div>
			<div class="col-md-3 col-xs-5">
				<div class="row">
					<a href="<?php echo base_url;?>"> <span class="blue-word">Auto</span>
						<span class="green-word">Home</span></a>

				</div>
				<div class="row">
					<small class="text-grey">Comfort is Waiting for you at Home</small>
				</div>

			</div>
			<div class="col-md-4 col-xs-12">
				<p class="text-center text-grey">Consumer Portal</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="padding: 0">
				<div
					style="background-color: #2ECC71; width: 100%; height: 1px; margin-top: 10px">&nbsp;</div>
			</div>
		</div>
		<div class="row thermostat-bg">
			<div class="col-md-6 col-lg-6 hidden-xs ">
				<img
					src="<?php echo base_url;?>assets/images/thermostat_nestish.jpg"
					height="380"> <span class="text-grey landing-font thermostat-text">Your
					Home, Your Way</span>

			</div>
			<div class=" col-md-6 col-lg-6 hidden-xs" style="padding-right: 0px;">
				<img class="pull-right image-responsive "
					src="<?php echo base_url;?>assets/images/display_room.jpg "
					height="400px">
			</div>

		</div>
		<div class="row green-bar">
			<div class="col-md-offset-2 col-md-10  ">

				<form class="form-inline" role="form" method="POST"
					action="<?php echo base_url;?>home/login">
					<span class="landing-font">Login to your home</span>
					<div class="form-group">
						<div class="col-md-8">
							<input type="email" class="form-control" name="email"
								placeholder="Email Address" autofocus>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-8">
							<input type="password" class="form-control" name="password"
								placeholder="password">
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Log in</button>
				</form>
			</div>
		</div>
		<div class="row" id="login">
			<div class="col-md-offset-2 col-md-3">
				<h4 class="landing-font">Create an account</h4>

				<p>Create an account today to securely log into your home.</p>
			</div>

			<div class="col-md-4">
				<form class="login-wrap" role="form" method="POST"
					action="<?php echo base_url;?>home/signup">
					<div style="margin-bottom: 3px;">
						<input name="email-signup" type="email" class="form-control"
							placeholder="Email address" required>
					</div>
					<div style="margin-bottom: 3px;">
						<input name="password-signup" type="password" class="form-control"
							placeholder="Password" required>
					</div>
					<div style="margin-bottom: 3px;">
						<label class="checkbox"> <input type="checkbox"
							value="remember-me" id="checkbox1" data-toggle="checkbox">
							Remember me <span class="pull-right"> <a data-toggle="modal"
								href="#myModal"> Forgot Password?</a>
						</span>
						</label>
					</div>
					<input class="btn btn-lg btn-login btn-block btn-primary"
						type="submit" value="Sign Up">
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<h4 class="landing-font">Comfort is Waiting For You At Home</h4>
				<p>For years,people have been talking about home automation. There
					are universal remotes, digial wall panels and apps that let you
					control the devices in your home. When you sign up with AutoHome,
					it's more than an on/off switch. It's about making your house a
					more thoughtful and conscious home. Because we connect these
					different parts of your life, we can work behind the scenes to
					deliver personalized comfort, safety and energy saving.
					Effortlessly</p>
			</div>
		</div>
		<div class="row devices">
			<div class="col-md-offset-1 col-md-2">
				<p>
					<b class="landing-font">Indoor Lighting & Room Outlets</b>
				</p>
				<img src="<?php echo base_url;?>assets/images/lightbulb-sockets.jpg"
					height="100">

			</div>
			<div class=" col-md-2">
				<p>
					<b class="landing-font">Room temperature Settings</b>
				</p>

				<img src="<?php echo base_url;?>assets/images/thermostat.jpg"
					height="100">

			</div>
			<div class=" col-md-2">
				<p class="landing-font">
					<b>Home Security Management</b>
				</p>

				<img src="<?php echo base_url;?>assets/images/motion_detector.jpg"
					height="100">

			</div>

			<div class=" col-md-2">
				<p>
					<b class="landing-font">Ambient LED Lighting Control</b>
				</p>

				<img src="<?php echo base_url;?>assets/images/hue_lights.jpg"
					height="100">

			</div>
			<div class=" col-md-2">
				<p class="landing-font">
					<b>Custom Novelty & Party Lighting</b>
				</p>

				<img src="<?php echo base_url;?>assets/images/disco.jpg"
					height="100">

			</div>
		</div>
		<div class="row grey-bar">
			<div class="  col-md-offset-2 col-md-4">
				<h3 class="landing-font">Welcome Home</h3>
				<p>Use the AutoHome App to connect to your home thermostat from a
					phone. Getting in early? Turn the lights on in your hallway.
					Expecting Guests? Get the party started.</p>
			</div>
			<div class=" col-md-2 hidden-xs">
				<img src="<?php echo base_url;?>assets/images/mobile_view.png"
					height="300">
			</div>
		</div>
		<div class="row blue-footer">
			<div class="col-md-offset-1 col-md-3">
				<p>Follow AutoHome</p>
				<span class="fa-stack fa-lg"> <i class="fa fa-square-o fa-stack-2x"></i>
					<i class="fa fa-twitter fa-stack-1x"></i>
				</span> <span class="fa-stack fa-lg"> <i
					class="fa fa-square-o fa-stack-2x"></i> <i
					class="fa fa-facebook fa-stack-1x"></i>
				</span>
			</div>
			<div class=" col-md-3 name-footer">
				<p class="text-center">AutoHome Associates LLC &#169;</p>
			</div>
		</div>
	</div>

	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://52.1.91.1/project/assets/js/bootstrap.min.js"></script>
	<script src="http://52.1.91.1/project/assets/js/flatui-checkbox.js"></script>
	<script
		src="http://52.1.91.1/project/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="http://52.1.91.1/project/assets/js/functions.js"></script>
	<!--<script src="http://52.1.91.1/project/assets/js/main.js"></script>-->

</body>
</html>
