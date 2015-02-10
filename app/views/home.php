<?php
//landing view
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$data['title'] = "Dashboard";
$this->load_view('template/header_files',$data);
?>

</head>

<body>
	<div class="container">
		<div class="row topbar">
		<!--	<a href="<?php echo base_url;?>"><div class="logo pull-left"></div></a> -->
		</div>
		<div class="row">
			
					<h1 class="group-title col-md-6">Dashboard</h1><ul class="nav nav-pills menu col-md-6">
						<li class="pull-right"><a href="<?php echo base_url;?>home/account">Account</a></li>
						<li class="pull-right"><a href="<?php echo base_url;?>home/players">Devices</a></li>
						<li class="pull-right"><a href="<?php echo base_url;?>home/projects">System</a></li>
						<!-- <li class="pull-right"><a href="<?php echo base_url;?>projects/create/1">Create Project</a></li>-->
					</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php
					$system = $this->user_model->get_system($this->user->_get('id'));
					$devices = $this->user_model->get_devices($system['system_id']);

				?>
				<div class="well col-md-12">
			
					<!-- List Current Device Types -->
					<ul class="group-body list-group">
						<?php
							
							if(!empty($devices)) {
								foreach( $devices as $device ) {	
									echo '<li class="list-group-item">'
										.'<h4 class="list-group-item-heading">'.$device['name'].'<small>'.$device['device_name'].'</small></h4>'
				    					.'<div class="row">';
				    					//form for swithc here
				    					?>
				    					<form class="form-inline col-md-3" role="form" method="POST" action="<?php echo base_url;?>requests/add">
					    					<input type="hidden" name="device_id" value="<?php echo $device['device_id'];?>">
					    					<input type="hidden" name="system_id" value="<?php echo $device['system_id'];?>">
					    					<input type="hidden" name="ip_address" value="<?php echo $device['ip_address'];?>">
					    					<div class="switch switch-square">
												<input type="checkbox" checked data-toggle="switch" name="action" value="on"/>
											</div>
											<input type="hidden" name="action_type" value="switch">
											<input class="btn btn-primary col-md-offset-6 col-md-6" type="submit" value="Update">
										</form>
										</div>
										<?php
				    					echo '</div></li>';
								}
							}
							else {
								echo '<li class="list-group-item">'
									.'This project has no devices yet. Why don\'t you go ahead and add one: <a href="#" class="addDeviceType"><span class="glyphicon glyphicon-plus"></span> Device Type</a>'
									.'</li>';
									
							}
						?>
					</ul>

				</div>
			</div>
		</div>
			
		<?php $this->load_view('template/widget'); ?>
	</div>	
		<?php $this->load_view('template/scripts'); ?>
	
</body>
</html>
