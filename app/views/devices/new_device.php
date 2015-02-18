
		<?php 
		$ajax = isset($data['ajax']);
		if(!$ajax) {
			?>
		<div class="row">
			<h3 class="col-md-8">Add a New Device</h3>
		</div>
		<?php 
		}
		?>
		<div class="row">
			<div class="<?php echo ($ajax) ? "col-md-12" : "col-md-8"?>">
				<section class="panel">
					<div class="panel-body">
						<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url;?>devices/insert">
							<div class="form-group">
						        <label class="col-md-4 control-label" for="name">Give it a  name</label>
						        <div class="col-md-8"><input name="name" type="text" class="form-control" placeholder="Bedroom Lamp" required autofocus></div>
							</div>
							<div class="form-group">
						        <label class="col-md-4 control-label" for="chip_id">Chip_ID</label>
						        <div class="col-md-8"><input name="chip_id" type="text" class="form-control" placeholder="12312313" required></div>
							</div>
							
							<?php 
							if(!$ajax) {
								echo '<input class="btn btn-primary col-md-offset-6 col-md-6" type="submit" value="Create New Device">';
							}
							?>
						</form>
					</div>
				</section>
			</div>
			
		</div>