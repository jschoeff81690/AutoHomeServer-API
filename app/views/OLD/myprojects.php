<?php
//landing view
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$data['title'] = "teamPlay : my Account";
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
					<h1 class="group-title col-md-6">myProjects</h1>
					<ul class="nav nav-pills menu col-md-6">
						<li class="pull-right"><a href="<?php echo base_url;?>home/account">Account</a></li>
						<li class="pull-right"><a href="<?php echo base_url;?>home/players">teamPlayers</a></li>
						<li class="pull-right"><a href="<?php echo base_url;?>home/projects">myProjects</a></li>
						<li class="pull-right"><a href="<?php echo base_url;?>">Dashboard</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row group">
			<div class="col-md-12 group-body">

				<ul class="list-group">
				<?php
				$this->user->load_projects();
				if(isset($this->user->projects)) {
					$dump = $this->user->dump();
					foreach($this->user->projects as $project) {
						// var_dump($project);
						// echo "<p><strong>$key:</strong> $val</p>";
						?>
						<li class="list-group-item">
							<h4 class="list-group-item-heading">
								<a href="<?php echo base_url?>projects/view/<?php echo $project->_get('id'); ?>" class=""><?php echo $project->_get('name'); ?></a>
							</h4>
							<p class="list-group-item-text"><?php echo $project->_get('caption');?></p>
						</li>
					<?php
					}

				}
				else {
					echo '<h2>Oops. You don\'t have any projects. Go ahead and create one.</h2>';
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