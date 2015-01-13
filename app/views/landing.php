<?php
//landing view

?>
<html lang="en">
<head>
<?php
$data['title'] = "Welcome to teamPlay";
$this->load_view('template/header_files',$data);
?>

    <!-- landing CSS -->
    <link href="<?php echo base_url;?>assets/css/landing.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="landing-logo"></div>
		<div class="jumbotron row landing">
			<div class="col-md-5">
				<h2>Login</h2>
				<form class="form-signin" role="form" method="POST" action="<?php echo base_url;?>home/login">
					<input name="email" type="email" class="form-control" placeholder="Email address" required autofocus>
					<input name="password" type="password" class="form-control" placeholder="Password" required>
					<label class="checkbox pull-right">
						<input type="checkbox" value="remember-me"> Remember me
					</label>
					<input class="btn btn-primary" type="submit" value="Sign in">
				</form>
			</div>
			<div class="col-md-2">
				<div class="divider">
					<div class="landing-or">OR</div>
				</div>
			</div>
			<div class="col-md-5">
				<h2>Sign Up</h2>
				<form class="form-signup" role="form" method="POST" action="<?php echo base_url;?>home/register">
					<input name="name" type="text" class="form-control" placeholder="Your Name" required autofocus>
					<input name="email" type="email" class="form-control" placeholder="Email address" required autofocus>
					<input name="password" type="password" class="form-control" placeholder="Password" required>
					<input class="btn btn-primary" type="submit" value="Sign Up">
				</form>
			</div>
		</div>	
	</div>
</body>
</html>