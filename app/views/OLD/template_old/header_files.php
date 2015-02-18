
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Manage your project as a team">
<meta name="author" content="JustinSchoeff">

<?php
if (! isset ( $title ))
	echo "\t" . '<title>teamPlay</title>';
else
	echo "\t<title>$title</title>";

?>


<!-- Bootstrap core CSS -->
<link href="<?php echo base_url;?>assets/css/bootstrap.min.css"
	rel="stylesheet">
<!-- teamPlay core CSS -->
<link href="<?php echo base_url;?>assets/css/main.css" rel="stylesheet">
<link href="<?php echo base_url;?>assets/css/dashboard.css"
	rel="stylesheet">
<link href="<?php echo base_url;?>assets/css/flat-ui.css"
	rel="stylesheet">
<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="<?php echo base_url;?>assets/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->