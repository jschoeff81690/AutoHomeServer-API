<?php
//landing view
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$data['title'] = "Dashboard : New System";
$this->load_view('template/header_files',$data);
?>

</head>

<body>
	<div class="container">
		<div class="row topbar">
		<!--	<a href="<?php echo base_url;?>"><div class="logo pull-left"></div></a> -->
		</div>
		<div class="row">
			
					<h1 class="group-title col-md-6">Add a New System</h1><ul class="nav nav-pills menu col-md-6">
						<li class="pull-right"><a href="<?php echo base_url;?>home/account">Account</a></li>
						<li class="pull-right"><a href="<?php echo base_url;?>home/players">Devices</a></li>
						<li class="pull-right"><a href="<?php echo base_url;?>home/projects">System</a></li>
						<li class="pull-right"><a href="<?php echo base_url;?>">Dashboard</a></li>
						<!-- <li class="pull-right"><a href="<?php echo base_url;?>projects/create/1">Create System</a></li>-->
					</ul>
		</div>
		<div class="row">
			<div class="well col-md-12">
					<form class="form-horizontal col-md-6" role="form" method="POST" action="<?php echo base_url;?>systems/add/1">
						<div class="form-group">
					        <label class="col-md-4 control-label" for="system_name">System Name</label>
					        <div class="col-md-8"><input name="system_name" type="text" class="form-control" placeholder="System Name" required autofocus></div>
						</div>
						<div class="form-group">
					        <label class="col-md-4 control-label" for="system_description">System Description</label>
					        <div class="col-md-8"><input name="system_description" type="text" class="form-control" placeholder="System Description" required></div>
						</div>
						<input class="btn btn-primary col-md-offset-8 col-md-4" type="submit" value="Create New System">
					</form>
			</div>
			
		</div>
		
			
		<?php $this->load_view('template/widget'); ?>
	</div>	
		<?php $this->load_view('template/scripts'); ?>
	
</body>
</html>
