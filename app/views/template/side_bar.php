<?php

//format 
//link: Display Text => URL
//sub-menu: Display Text => array of menu items in same format

$submenu1 = array(
	"item1" => array('#',"bicycle"),
	"item2" => array('#',"fighter-jet"),
	"item3" => array('#',"file")
	);
$devices = array(
	"View Devices" => array(base_url.'devices/',"cube"),
	"Add Device" => array(base_url.'devices/add',"plus"),
	"item3" => array('#',"file")
	);
$menu = array(
	"Dashboard"=> array(base_url.'home/',"dashboard"),
	"Devices"=> array($devices,'tablet'),
	"a sub menu"=> array($submenu1, "circle"),
	"Recipes"=> array(base_url.'recipes/','folder')
	);

function display($menu, $active) {

	
	foreach($menu as $text=> $value) {
		if(isset($value[0]) && is_array($value[0])) {
			?><li class="sub-menu dcjq-parent-li"><a href="javascript:;"
				class="dcjq-parent"> <i class="fa fa-<?php echo $value[1]; ?>"></i> <span><?php echo $text; ?></span>
					<span class="dcjq-icon"></span></a>
				<ul class="sub" style="display: none;">
					
		    		<?php display($value[0], $active); ?>
				</ul></li>

		<?php
		}
		else {
			echo '<li><a '.(strtolower($text) == strtolower($active) ? 'class="active" ' : "")
			 .'href="'.$value[0].'">'
				.'<i class="fa fa-'.$value[1].'"></i> <span>'.$text.'</span>'
				.'</a></li>';
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
					if(isset($data['active_link']))
						$active = $data['active_link'];
					else
						$active = "dashboard";
					display($menu, $active);
					?>
				</ul>
				<!-- sidebar menu end-->
			</div>
		</aside>
		
		<!--sidebar end-->