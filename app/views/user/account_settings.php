		<div class="row">
		<h3 class="col-md-6">Account Settings</h3>
		</div>
		<div class="row group">
			<div class="col-md-12 group-body">
				<?php
				if(isset($this->user)) {
					$dump = $this->user->dump();
					foreach($dump as $key=> $val) {
						echo "<p><strong>$key:</strong> $val</p>";
					}

				}
				?>
			</div>
		</div>