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
			<div class="group col-md-12">
				<div class="group-body">
					
	<?php
	if(isset($this->user)) {
		//$this->user->load_projects(10);
		if(isset($this->user->projects)) {
			foreach($this->user->projects as $project) {
				?>
				<div class="row recent-projects">
					<div class="col-md-3 recent-title"><a href="<?php echo base_url?>projects/view/<?php echo $project->_get('id'); ?>"><?php echo $project->_get('name'); ?></a></div>
					<div class="col-md-9 recent-info"><?php echo $project->_get('description'); ?></div>
				</div>
				<?php
			}
		}
		else {

			//User has no projects :(
			?>
			<div class="row recent-projects">
				<div class="col-md-3 recent-title"><a href="<?php echo base_url?>systems/add">Create new System</a></div>
				<div class="col-md-9 recent-info">You don't currently have a systems. :( Why Don't you go ahead and create one.</div>
			</div>
			<?php
		}
	}
	?>
				
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="group col-md-6">
				<h3 class="group-title">Recent Tasks</h3>

				
				<ul class="group-body list-group">
				<?php
					if(isset($this->user)) {
						// $this->user->load_recent_tasks(5);
						if(!empty($this->user->tasks)) {
							foreach($this->user->tasks as $task) {
								?>
								<li class="list-group-item">
									<div class="row">
										<div class="col-md-8">
											<h4 class="list-group-item-heading"><?php echo $task['name']; ?> <small><a href="<?php echo base_url?>projects/view/<?php echo $task['project_id']; ?>"><?php echo $task['project_name']; ?></a></small></h4>
										</div>
										<div class="col-md-4">
											<span class="badge alert-info">Due: <?php echo $task['due']; ?></span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<p class="list-group-item-text" style="overflow:hidden;"><?php echo $task['details']; ?></p>
										</div>
									</div>
								</li>
								<?php
							}
						}
						else {

							//User has no projects :(
							?>
							<div class="row recent-projects">
								<div class="col-md-3 recent-title"><a href="<?php echo base_url?>projects/create/1">Create new Project</a></div>
								<div class="col-md-9 recent-info">You don't currently have any projects. :( Why Don't you go ahead and create one.</div>
							</div>
							<?php
						}
					}
						?>
				</ul>
				
			</div>
			<div class="group col-md-6">
				<h3 class="group-title">Recent Project Messages</h3>

				<ul class="group-body list-group">
				<?php
					if(isset($this->user)) {
						// $this->user->load_recent_messages(5);
						if(!empty($this->user->messages)) {
							foreach($this->user->messages as $message) {
								?>
								<li class="list-group-item">
									<div class="row">
										<div class="col-md-8">
											<h4 class="list-group-item-heading"><?php echo $message['sender']; ?> <small><a href="<?php echo base_url?>projects/view/<?php echo $message['project_id']; ?>"><?php echo $message['project_name']; ?></a></small></h4>
										</div>
										<div class="col-md-4">
											<span class="badge alert-info">Sent: <?php echo $message['created']; ?></span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<p class="list-group-item-text" style="overflow:hidden;"><?php echo $message['content']; ?></p>
										</div>
									</div>
								</li>
								<?php
							}
						}
						else {

							//User has no projects :(
							?>
							<div class="row recent-projects">
								<p>Tests From /relay/</p>
								<ul>
								<?php
								foreach($tests as $test) {
									echo '<li><b>Data:</b>'.$test['data'].'</li>';
								}
								?>
								</ul>
								<div class="col-md-9 recent-info">You don't currently have any Messages. </div>
							</div>
							<?php
						}
					}
						?>
				</ul>
			</div>
		</div>
			
		<?php $this->load_view('template/widget'); ?>
	</div>	
		<?php $this->load_view('template/scripts'); ?>
	
</body>
</html>
