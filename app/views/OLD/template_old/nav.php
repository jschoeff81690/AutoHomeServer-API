
<div class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	    </button>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    
		<ul class="nav nav-pills menu col-md-8">
			<li class="pull-right"><a href="<?php echo base_url;?>home/account">Account</a></li>
			<li class="pull-right"><a href="<?php echo base_url;?>devices">Devices</a></li>
			<li role="presentation" class="dropdown pull-right">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
					Devices <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo base_url;?>devices">All Devices</a></li>
					<li><a href="<?php echo base_url;?>data_types">Device Data Types</a></li>
					<li><a href="<?php echo base_url;?>device_types">Device Types</a></li>
					<li><a href="<?php echo base_url;?>conditions">Device Conditionals</a></li>
				</ul>
			  </li>
			<li class="pull-right"><a href="<?php echo base_url;?>systems">Systems</a></li>
			<li class="pull-right"><a href="<?php echo base_url;?>home">Dashboard</a></li>
			<!-- <li class="pull-right"><a href="<?php echo base_url;?>projects/create/1">Create Project</a></li>-->
		</ul>
	</div>
</div>