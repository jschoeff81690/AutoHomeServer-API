<?php
?>
<div class="row">
	<div class="col-md-10">

		<div class="panel">
			<div class="panel-heading">

				<h4>My Recipes</h4>
				<p>Recipes allow you to control your home in ways you've never
					imagined.</p>

			</div>

			<div class="panel-body">
				<div class="row">
<?php
$recipe_count = 0; // Every 4 recipes needs a new Row so they line up correctly.
$recipes = array ();
if ($data ['user_recipes'] != false)
	$recipes = $data ['user_recipes'];

foreach ( $recipes as $recipe ) {
	
	$this_blocks = $recipe ['this_blocks'];
	$that_blocks = $recipe ['that_blocks'];
	$url = base_url . "recipes/view/" . $recipe ['recipe_id'];
	?>
			<div class="col-md-3">
						<a href="<?php echo $url;?>">
							<div class="block-recipe">
								<div class=" if-then">
									<div class="col-md-6 terques text-center">
										<p>if</p>
										<i
											class="fa <?php echo $this_blocks[0]['device_info']['fa_icon']?>"></i>
									</div>
									<div class="col-md-6 red text-center">
										<p>then</p>
										<i
											class="fa <?php echo $that_blocks[0]['device_info']['fa_icon']?>"></i>
									</div>
								</div>

								<div class="col-md-12 light-grey text-center">
									<p class="statement"><?php echo $recipe['recipe_name']?></p>
								</div>
							</div>
						</a>
					</div>	
<?php
	$recipe_count ++;
	if ($recipe_count == 4) {
		echo '</div><div class="row">';
		$recipe_count = 0;
	}
}

?>
					<!-- add a recipe -->
					<div class="col-md-3">
						<a href="<?php echo base_url . "recipes/add";?>">
							<div class="block-recipe">
								<div class="if-then">
									<div class="col-xs-12 blue-bg text-center">
										<i class="fa fa-cubes text-md"></i>
									</div>
								</div>
								<div class="col-xs-12 light-grey text-center">
									<p class="statement">Create A Recipe</p>
								</div>
							</div>
						</a>
					</div>
					<!--add recipe -->
				</div>
				<!--close row -->
			</div>
			<!--panel body -->
		</div>
		<!--panel-->
	</div>
	<!--col-md-10-->
</div>
<!-- row -->

<div class="row">
	<div class="col-md-10">
		<div class="panel">
			<div class="panel-heading">
				<h4>Popular Recipes</h4>
				<p>Enjoy some of our most popular recipes</p>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="block-recipe">
							<div class="row if-then">
								<div class="col-xs-6 terques text-center">
									<p>if</p>
									<i class="fa fa-chain-broken"></i>
								</div>
								<div class="col-xs-6 red text-center">
									<p>then</p>
									<i class="fa fa-mobile"></i>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12 light-grey text-center">
									<p class="statement">Text autohome@gmail.com when reed sensor
										is tripped.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="block-recipe">
							<div class="row if-then">
								<div class="col-xs-6 yellow text-center">
									<p>if</p>
									<i class="fa fa-clock-o"></i>
								</div>
								<div class="col-xs-6 red text-center">
									<p>then</p>
									<i class="fa fa-sliders"></i>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12 light-grey statement text-center">
									<p class="statement">Turn on LED strip in the morning</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
