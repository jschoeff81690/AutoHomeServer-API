<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage your project as a team">
    <meta name="author" content="JustinSchoeff">
    
    <?php 
    if(!isset($title)) 
        echo "\t".'<title>AutoHome</title>';
    else
        echo "\t<title>$title</title>";
    
    ?>
    
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url;?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url;?>assets/css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="<?php echo base_url;?>assets/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url;?>assets/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo base_url;?>assets/css/owl.carousel.css" type="text/css">

<!--right slidebar-->
<link href="<?php echo base_url;?>assets/css/slidebars.css" rel="stylesheet">

<!-- Custom styles for this template -->

<link href="<?php echo base_url;?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url;?>assets/css/style-responsive.css" rel="stylesheet">


<link href="<?php echo base_url;?>assets/css/flat-ui.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
.jqstooltip {
    position: absolute;
    left: 0px;
    top: 0px;
    display: block;
    visibility: hidden;
    background: rgb(0, 0, 0) transparent;
    background-color: rgba(0, 0, 0, 0.6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,
        endColorstr=#99000000);
    -ms-filter:
        "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
    color: white;
    font: 10px arial, san serif;
    text-align: left;
    white-space: nowrap;
    border: 1px solid white;
    z-index: 10000;
}

.jqsfield {
    color: white;
    padding: 5px 5px 8px 5px;
    font: 10px arial, san serif;
    text-align: left;
}
</style>

</head>