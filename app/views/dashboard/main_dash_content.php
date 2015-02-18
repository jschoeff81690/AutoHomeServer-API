	<div class="row">
		<div class="col-lg-8 col-sm-8">
			<?php
			$system = $this->user_model->get_system ( $this->user->_get ( 'id' ) );
			$devices = $this->user_model->get_devices ( $system ['system_id'] );

			?>
			<!-- List Current Device Types -->
			<div class="panel">
				<ul class="group-body list-group">
					<?php

					if (! empty ( $devices )) {
						foreach ( $devices as $device ) {
							echo '<li class="list-group-item">'
							. '<h4 class="list-group-item-heading">'. $device ['name'] . '<small>' . $device ['device_name'] . '</small></h4>'
							. '<div class="row">';
						// form for swithc here
							?>
								<form class="form-inline col-md-3" role="form" method="POST" action="<?php echo base_url;?>requests/add">
									<input type="hidden" name="device_id" value="<?php echo $device['device_id'];?>"> 
									<input type="hidden" name="system_id" value="<?php echo $device['system_id'];?>"> 
									<input type="hidden" name="ip_address" value="<?php echo $device['ip_address'];?>">
									<div class="switch switch-square">
										<input type="checkbox" checked data-toggle="switch" name="action" value="on" />
									</div>
									<input type="hidden" name="action_type" value="switch"> 
									<input class="btn btn-primary" type="submit" value="Update">
								</form>

						
							<?php
							echo '</div></li>';
						}
					} else {
						echo '<li class="list-group-item">' . 'This project has no devices yet. Why don\'t you go ahead and add one: <a href="#" class="addDeviceType"><span class="glyphicon glyphicon-plus"></span> Device Type</a>' . '</li>';
					}
					?>
				</ul>
			</div>
		</div>
	</div>