<?php
// landing view
?>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Manage your project as a team">
<meta name="author" content="JustinSchoeff">
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url;?>assets/css/bootstrap.min.css"
	rel="stylesheet">
<!-- teamPlay core CSS -->
<link href="<?php echo base_url;?>assets/css/main.css" rel="stylesheet">
<link href="<?php echo base_url;?>assets/css/dashboard.css"
	rel="stylesheet">
<link href="<?php echo base_url;?>assets/css/flat-ui.css"
	rel="stylesheet">
</head>

<body>
	<div class="container">
		<img class="img-responsive center-block"
			src="<?php echo base_url;?>assets/images/landing_logo.jpg" />
		<div class="jumbotron row">
			<div class="col-md-5">
				<h2>Login</h2>
				<form class="form-signin" role="form" method="POST"
					action="<?php echo base_url;?>home/login">
					<input name="email" type="email" class="form-control"
						placeholder="Email address" required autofocus> <input
						name="password" type="password" class="form-control"
						placeholder="Password" required> <label
						class="checkbox pull-right"> <input type="checkbox"
						value="remember-me"> Remember me
					</label> <input class="btn btn-primary" type="submit"
						value="Sign in">
				</form>
			</div>
			<div class="col-md-2 "></div>
			<div class="col-md-5">
				<h2>Sign Up</h2>
				<form class="form-signup" role="form" method="POST"
					action="<?php echo base_url;?>home/register">
					<input name="name" type="text" class="form-control"
						placeholder="Your Name" required autofocus> <input name="email"
						type="email" class="form-control" placeholder="Email address"
						required autofocus> <input name="password" type="password"
						class="form-control" placeholder="Password" required> <input
						class="btn btn-primary" type="submit" value="Sign Up">
				</form>
			</div>
		</div>
	</div>
</body>
</html>