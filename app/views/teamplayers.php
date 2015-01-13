<?php
//landing view
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$data['title'] = "teamPlay : teamPlayer";
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
					<h1 class="group-title col-md-6">All the teamPlayers</h1>
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
				if(isset($users)) {
					foreach($users as $user) {
						echo '<li class="list-group-item">';
						$dump = $user->dump();
						foreach($dump as $key=> $val) {
							echo "<p><strong>$key:</strong> $val</p>";
						}
						echo '</li>';
					}

				}
				else echo '<h2>Oops. There must have been an error, try again. </h2>';
				?>	
				</ul>
			</div>
		</div>
	
			
		<?php $this->load_view('template/widget'); ?>
	</div>	
		<?php $this->load_view('template/scripts'); ?>
	
</body>
</html>