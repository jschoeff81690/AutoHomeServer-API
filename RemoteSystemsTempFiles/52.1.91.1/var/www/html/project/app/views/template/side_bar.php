<?php

// format
// link: Display Text => URL
// sub-menu: Display Text => array of menu items in same format
$recipes = array (
		"View Recipes" => array (
				base_url . 'recipes/',
				"sliders" 
		),
		"Create Recipe" => array (
				base_url . 'recipes/add',
				"plus" 
		) 
);

$devices = array (
		"Outlets" => array (
				base_url . 'devices/outlets',
				"plug" 
		),
		"Ambience" => array (
				base_url . 'devices/ambience',
				"lightbulb-o" 
		),
		"Security" => array (
				base_url . 'devices/security',
				"lock" 
		) 
);
$menu = array (
		"Dashboard" => array (
				base_url . 'home/',
				"dashboard" 
		),
		"My Home" => array (
				base_url . 'places/',
				'home' 
		),
		"Devices" => array (
				$devices,
				'tablet' 
		),
		"Recipes" => array (
				base_url . 'recipes/',
				'cubes' 
		) 
);

function display($menu, $active) {
	foreach ( $menu as $text => $value ) {
		if (isset ( $value [0] ) && is_array ( $value [0] )) {
			?><li class="sub-menu dcjq-parent-li"><a href="javascript:;"
	class="dcjq-parent <?php echo (strtolower ( $text ) == strtolower ( $active ) ? "active" : "");?>">
		<i class="fa fa-<?php echo $value[1]; ?>"></i> <span><?php echo $text; ?></span>
		<span class="dcjq-icon"></span>
</a>
	<ul class="sub" style="display: none;">
					
		    		<?php display($value[0], $active); ?>
				</ul></li>

<?php
		} else {
			echo '<li><a ' . (strtolower ( $text ) == strtolower ( $active ) ? 'class="active" ' : "") . 'href="' . $value [0] . '">' . '<i class="fa fa-' . $value [1] . '"></i> <span>' . $text . '</span>' . '</a></li>';
		}
	}
}
?>
<!--sidebar start-->
<aside>
	<div id="sidebar" class="nav-collapse " tabindex="5000"
		style="overflow: hidden; outline: none;">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">
			
			<?php
			if (isset ( $data ['active_link'] ))
				$active = $data ['active_link'];
			else
				$active = "dashboard";
			display ( $menu, $active );
			?>
		</ul>
		<!-- sidebar menu end-->
	</div>
</aside>

<!--sidebar end-->
