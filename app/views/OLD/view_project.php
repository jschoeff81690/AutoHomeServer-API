<?php
//landing view
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$data['title'] = "teamPlay : View Project";
$this->load_view('template/header_files',$data);
?>

</head>

<body>
	<div class="container">
		<div class="row topbar">
			<a href="<?php echo base_url;?>"><div class="logo pull-left"></div></a>
		</div>

		<div class="row">
			<div class="group col-md-12">
				<div class="row">
					<h1 class="group-title col-md-6"><?php echo $project->_get('name');?></h1>
					<ul class="nav nav-pills menu col-md-6">
						<li class="pull-right"><a href="#" class="addMessage"><span class="glyphicon glyphicon-plus"></span> Message</a></li>
						<li class="pull-right"><a href="#" class="addTask"><span class="glyphicon glyphicon-plus"></span> Task</a></li>
						<li class="pull-right"><a href="<?php echo base_url;?>home/projects">myProjects</a></li>
						<li class="pull-right"><a href="<?php echo base_url;?>">Dashboard</a></li>
					</ul>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="row">
						<div class="btn-group btn-group-justified">
							<a id="project-tasks-link" href="#" class="btn btn-primary project-tab active">
								<span class="glyphicon glyphicon-stats"></span> Tasks
							</a>
							<a id="project-messages-link" href="#" class="btn btn-primary project-tab" >
								<span class="glyphicon glyphicon-envelope"></span> Messages
							</a>
							<a id="project-teamplayers-link" href="#" class="btn btn-primary project-tab" >
								<span class="glyphicon glyphicon-user"></span> teamPlayers
							</a>
						</div>
						</div>
						<div class="row">
							<div id="project-tasks" class="col-md-12 project-tab-content">
								<div class="row">
									<h3 class="group-title col-md-6">teamTasks</h3>
									<h3 class="col-md-6"><a href="#" class="addTask pull-right"><span class="glyphicon glyphicon-plus"></span> Task</a></h3>
								</div>
								<ul class="group-body list-group">
									<?php
									$tasks = $project->_get('tasks');
									if(!empty($tasks))
										foreach( $tasks as $task ) {
										echo '<li class="list-group-item">'
											.'<h4 class="list-group-item-heading">'.$task['name'].'<span class="badge pull-right alert-info">Due: '.$task['due'].'</span></h4>'
					    					.'<p class="list-group-item-text">'.$task['details'].'</p>'	
											.'</li>';
										}
									else {
										echo '<li class="list-group-item">'
											.'This project has no tasks yet. Why don\'t you go ahead and add one: <a href="#" class="addTask"><span class="glyphicon glyphicon-plus"></span> Task</a></li>'
											.'</li>';
									}
								?>
								</ul>
							</div>
							<div id="project-messages" class="col-md-12 project-tab-content hidden">
								<div class="row">
									<h3 class="group-title col-md-6">teamMessages</h3>
									<h3 class="col-md-6"><a href="#" class="addMessage pull-right"><span class="glyphicon glyphicon-plus"></span> Message</a></h3>
								</div>
								<ul class="group-body list-group">
									<?php
									$messages = $project->_get('messages');
									if(!empty($messages))
										foreach( $messages as $message ) {
										echo '<li class="list-group-item">'
											.'<h4 class="list-group-item-heading">'.$message['sender_name'].'<span class="badge pull-right alert-info">Sent: '.$message['send_date'].'</span></h4>'
					    					.'<p class="list-group-item-text">'.$message['content'].'</p>'	
											.'</li>';
										}
									else {
										echo '<li class="list-group-item">'
											.'This project has no Messages yet. Why don\'t you go ahead and add one: <a href="#" class="addMessage"><span class="glyphicon glyphicon-plus"></span> Message</a></li>'
											.'</li>';
									}
								?>
								</ul>
							</div>
							<div id="project-teamplayers" class="col-md-12 project-tab-content hidden">
								<h3 class="group-title">teamPlayers</h3>
								<ul class="group-body list-group">
								<?php
									$players = $project->_get('players');
									if(!empty($players))
										foreach( $players as $player ) {
										echo '<li class="list-group-item">'
											.'<h4 class="list-group-item-heading">'.$player['name'].'<span class="badge pull-right alert-info">Joined: '.$player['date_joined'].'</span></h4>'
					    					.'<p class="list-group-item-text">'.$player['email'].'</p>'	
											.'</li>';
										}
									else {
										echo '<li class="list-group-item">'
											.'This project has no Messages yet. Why don\'t you go ahead and add one: <a href="#" class="addMessage"><span class="glyphicon glyphicon-plus"></span> Message</a></li>'
											.'</li>';
									}
								?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-12 well">
						<?php
						echo '<h2>Project Information: </h2>';
					echo '<p>Company: '.$project->_get('company').'</p>';
					echo '<p>Website: '.$project->_get('site').'</p>';
					echo '<p>Contact Information: '.$project->_get('contact').'</p>';
					echo '<p>Descriptioon: '.$project->_get('description').'</p>';
					echo '<p>Finish Date: '.$project->_get('finish').'</p>';
					echo '<p>Created: '.$project->_get('date_created').'</p>';
						?>	
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
		
			
		<?php $this->load_view('template/widget'); ?>
		<div class="hidden" id="project_id"><?php echo $project->_get('id'); ?></div>
		<div class="hidden" id="user_id"><?php echo $user_id; ?></div>
	</div>	
		<?php $this->load_view('template/scripts'); ?>
</body>
</html>