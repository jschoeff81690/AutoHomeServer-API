<?php
$recipe = $data ['recipe'];
if (isset ( $recipe )) {
	?>
<div class="panel">
	<div class="panel-heading">
		<h4>Recipe: <?php echo $recipe['recipe_name']; ?></h4>
	</div>
<?php
}
?>
	<div class="panel-body">
		<div class="col-md-1">
			<h1>if</h1>
		</div>
		<div class="col-md-4">
			<h3>
				<a
					href="<?php echo base_url.'recipes/get_this_blocks/'.$recipe['recipe_id'];?>"
					class="thisBlockContainer"><?php echo $recipe['this_statement'];?>
				</a>
			</h3>

		</div>
		<div class="col-md-2">
			<h1>then</h1>
		</div>
		<div class="col-md-5">
			<h3>
				<a
					href="<?php echo base_url.'recipes/get_that_blocks/'.$recipe['recipe_id'];?>"
					class="thatBlockContainer "><?php echo $recipe['that_statement'];?></a>
			</h3>

		</div>


		<div class="row">
			<div class="col-md-8">
				<form class="addRecipe"
					action="<?php echo base_url;?>recipes/insert">
					<input type="hidden" name="system_id"
						value="<?php echo $data['system_id'];?>"> <input type="submit"
						class="btn btn-primary btn-lg col-md-4" value="Save Recipe">

				</form>
			</div>
		</div>
		<div id="this_block_container_modal" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header blue-bg">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">If These Happen...</h4>
					</div>
					<div class="modal-body this_block_container_body">
						<div class="row this_block_container_body_row"></div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-md-12">
								<p class="thisBlockStatement"></p>
							</div>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->


		<div id="that_block_container_modal" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header blue-bg">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Then These Will...</h4>
					</div>
					<div class="modal-body that_block_container_body">
						<div class="row that_block_container_body_row"></div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-md-12">
								<p class="thatBlockStatement"></p>
							</div>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
	</div>
</div>

