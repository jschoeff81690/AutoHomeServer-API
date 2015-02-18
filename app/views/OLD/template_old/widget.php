<?php
//widget code
//needs to get user info
if(!isset($this->user_model))
	$this->load_model('user_model');
$user = $this->user_model->get_user();
?>
<div class="widget">
			<div class="btn widget-button">
				<ul class="menu-icon">
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
			<div class="widget-wrapper">
				<h3 class="widget-title"><?php echo $user->_get('name');?></h3>
				<div class="widget-body">
					<div class="widget-row widget-border-top widget-border-bottom btn-group btn-group-justified">
						<a href="#" class="btn btn-primary active widget-tab" id="widget-projects-link">
							<span class="glyphicon glyphicon-th-list"></span> Projects
						</a>
						<a href="#" class="btn btn-primary widget-tab" id="widget-updates-link">
							<span class="glyphicon glyphicon-calendar"></span> Updates
						</a>
					</div>
					<div id="widget-projects" class="widget-tab-content">
						<!-- <h4 class="col-md-11 col-md-offset-1">Projects:</h4> -->
			<?php
			//$user->load_projects(6);
			if(isset($user->projects)) {
				foreach($user->projects as $project) {
					?>
					<div class="row widget-recent">
						<div class="col-md-12">
							<a href="<?php echo base_url?>projects/view/<?php echo $project->_get('id'); ?>" class="col-md-10 col-md-offset-1 btn btn-success"><?php echo $project->_get('name'); ?></a>
						</div>
					</div>
					<?php
				}
			}
			else {

				//User has no projects :(
				echo '<a href="'.base_url.'projects/create/1">Create new Project</a>';
			}
			?>		</div>
					<div id="widget-updates" class="widget-tab-content hidden">
						<!-- <h4 class="col-md-11 col-md-offset-1">Updates:</h4> -->
			<?php
			//$user->load_recent_updates(6);
			if(isset($user->updates)) {
				foreach($user->updates as $update) {
					if($update['type'] == "message") {
					?>
					<div class="row widget-recent">
						<div class="col-md-12 update">
							<?php echo '<h4><span class="glyphicon glyphicon-envelope text-warning"></span> '.$update['sender'].' <small>sent a message in <a href="'.base_url.'projects/view/'.$update['project_id'].'">'.$update['project_name'].'</a></small></h4><br>';
							$past_time ="";
							$past_type = "";
							$time = explode(':', $update['created']);
							if($time[0] > 0 ) {
								if($time[0] > 24) {
									$past_time = intval( $time[0] / 24 );
									$past_type = "days";
								}
								else  {
									$past_time = $time[0];
									$past_type = "hours";
								}
							}
							else if($time[1] > 1) {
								$past_time = $time[1];
								$past_type = "minutes";
							}
							else {
								$past_time = $time[2];
								$past_type = "seconds";
							}
							echo '<p>'. $past_time.' '.$past_type.' ago.</p>';
							?>
						</div>
					</div>
					<?php
					}
					else {
					?>
					<div class="row widget-recent">
						<div class="col-md-12 update">
							<?php echo '<h4><span class="glyphicon glyphicon-stats text-danger"></span> '.$update['name'].' <small>created in <a href="'.base_url.'projects/view/'.$update['project_id'].'">'.$update['project_name'].'</a></small></h4>';
							$past_time ="";
							$past_type = "";
							$time = explode(':', $update['created']);
							if($time[0] > 0 ) {
								if($time[0] > 24) {
									$past_time = intval( $time[0] / 24 );
									$past_type = "days";
								}
								else  {
									$past_time = $time[0];
									$past_type = "hours";
								}
							}
							else if($time[1] > 1) {
								$past_time = $time[1];
								$past_type = "minutes";
							}
							else {
								$past_time = $time[2];
								$past_type = "seconds";
							}
							echo '<p>'. $past_time.' '.$past_type.' ago.</p>';
							?>
							<!-- <a href="<?php echo base_url?>projects/view/<?php echo $update['project_id']; ?>" class="col-md-10 col-md-offset-1 btn btn-success"><?php echo $update['name']; ?></a> -->
						</div>
					</div>
					<?php

					}
				}
			}
			else {

				//User has no projects :(
				echo '<a href="'.base_url.'projects/create/1">Create new Project</a>';
			}
			?>		</div>
				</div>
				<div class="widget-row widget-border-top btn-group btn-group-justified">
					<a href="<?php echo base_url;?>home/account" class="btn btn-default">
						<span class="glyphicon glyphicon-cog"></span> Account Settings
					</a>
					<a href="<?php echo base_url;?>home/logout" class="btn btn-default"> Logout
					</a>
				</div>
			</div>
			
		</div>