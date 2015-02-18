<!DOCTYPE html>
<html lang="en" class="sb-init" style="overflow: hidden;">
<?php
    $data['title'] = "Dashboard";
    $this->load_view('template/header_files',$data);
?>
<body style="">

	<section id="container">
		<!--header start-->
		<header class="header white-bg">
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars tooltips" data-placement="right"
					data-original-title="Toggle Navigation"></div>
			</div>
			<!--logo start-->
			<a
				href="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/FlatLab - Flat & Responsive Bootstrap Admin Template.html"
				class="logo">Flat<span>lab</span></a>
			<!--logo end-->
			<div class="nav notify-row" id="top_menu">
				<!--  notification start -->
				<ul class="nav top-menu">
					<!-- settings start -->
					<li class="dropdown"><a data-toggle="dropdown"
						class="dropdown-toggle"
						href="http://thevectorlab.net/flatlab/index.html#"> <i
							class="fa fa-tasks"></i> <span class="badge bg-success">6</span>
					</a>
						<ul class="dropdown-menu extended tasks-bar">
							<div class="notify-arrow notify-arrow-green"></div>
							<li>
								<p class="green">You have 6 pending tasks</p>
							</li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#">
									<div class="task-info">
										<div class="desc">Dashboard v1.3</div>
										<div class="percent">40%</div>
									</div>
									<div class="progress progress-striped">
										<div class="progress-bar progress-bar-success"
											role="progressbar" aria-valuenow="40" aria-valuemin="0"
											aria-valuemax="100" style="width: 40%">
											<span class="sr-only">40% Complete (success)</span>
										</div>
									</div>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#">
									<div class="task-info">
										<div class="desc">Database Update</div>
										<div class="percent">60%</div>
									</div>
									<div class="progress progress-striped">
										<div class="progress-bar progress-bar-warning"
											role="progressbar" aria-valuenow="60" aria-valuemin="0"
											aria-valuemax="100" style="width: 60%">
											<span class="sr-only">60% Complete (warning)</span>
										</div>
									</div>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#">
									<div class="task-info">
										<div class="desc">Iphone Development</div>
										<div class="percent">87%</div>
									</div>
									<div class="progress progress-striped">
										<div class="progress-bar progress-bar-info" role="progressbar"
											aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
											style="width: 87%">
											<span class="sr-only">87% Complete</span>
										</div>
									</div>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#">
									<div class="task-info">
										<div class="desc">Mobile App</div>
										<div class="percent">33%</div>
									</div>
									<div class="progress progress-striped">
										<div class="progress-bar progress-bar-danger"
											role="progressbar" aria-valuenow="80" aria-valuemin="0"
											aria-valuemax="100" style="width: 33%">
											<span class="sr-only">33% Complete (danger)</span>
										</div>
									</div>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#">
									<div class="task-info">
										<div class="desc">Dashboard v1.3</div>
										<div class="percent">45%</div>
									</div>
									<div class="progress progress-striped active">
										<div class="progress-bar" role="progressbar"
											aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
											style="width: 45%">
											<span class="sr-only">45% Complete</span>
										</div>
									</div>

							</a></li>
							<li class="external"><a
								href="http://thevectorlab.net/flatlab/index.html#">See All Tasks</a>
							</li>
						</ul></li>
					<!-- settings end -->
					<!-- inbox dropdown start-->
					<li id="header_inbox_bar" class="dropdown"><a
						data-toggle="dropdown" class="dropdown-toggle"
						href="http://thevectorlab.net/flatlab/index.html#"> <i
							class="fa fa-envelope-o"></i> <span class="badge bg-important">5</span>
					</a>
						<ul class="dropdown-menu extended inbox">
							<div class="notify-arrow notify-arrow-red"></div>
							<li>
								<p class="red">You have 5 new messages</p>
							</li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"> <span
									class="photo"><img alt="avatar"
										src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/avatar-mini.jpg"></span>
									<span class="subject"> <span class="from">Jonathan Smith</span>
										<span class="time">Just now</span>
								</span> <span class="message"> Hello, this is an example msg. </span>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"> <span
									class="photo"><img alt="avatar"
										src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/avatar-mini2.jpg"></span>
									<span class="subject"> <span class="from">Jhon Doe</span> <span
										class="time">10 mins</span>
								</span> <span class="message"> Hi, Jhon Doe Bhai how are you ? </span>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"> <span
									class="photo"><img alt="avatar"
										src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/avatar-mini3.jpg"></span>
									<span class="subject"> <span class="from">Jason Stathum</span>
										<span class="time">3 hrs</span>
								</span> <span class="message"> This is awesome dashboard. </span>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"> <span
									class="photo"><img alt="avatar"
										src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/avatar-mini4.jpg"></span>
									<span class="subject"> <span class="from">Jondi Rose</span> <span
										class="time">Just now</span>
								</span> <span class="message"> Hello, this is metrolab </span>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#">See all
									messages</a></li>
						</ul></li>
					<!-- inbox dropdown end -->
					<!-- notification dropdown start-->
					<li id="header_notification_bar" class="dropdown"><a
						data-toggle="dropdown" class="dropdown-toggle"
						href="http://thevectorlab.net/flatlab/index.html#"> <i
							class="fa fa-bell-o"></i> <span class="badge bg-warning">7</span>
					</a>
						<ul class="dropdown-menu extended notification">
							<div class="notify-arrow notify-arrow-yellow"></div>
							<li>
								<p class="yellow">You have 7 new notifications</p>
							</li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"> <span
									class="label label-danger"><i class="fa fa-bolt"></i></span>
									Server #3 overloaded. <span class="small italic">34 mins</span>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"> <span
									class="label label-warning"><i class="fa fa-bell"></i></span>
									Server #10 not respoding. <span class="small italic">1 Hours</span>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"> <span
									class="label label-danger"><i class="fa fa-bolt"></i></span>
									Database overloaded 24%. <span class="small italic">4 hrs</span>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"> <span
									class="label label-success"><i class="fa fa-plus"></i></span>
									New user registered. <span class="small italic">Just now</span>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"> <span
									class="label label-info"><i class="fa fa-bullhorn"></i></span>
									Application error. <span class="small italic">10 mins</span>
							</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#">See all
									notifications</a></li>
						</ul></li>
					<!-- notification dropdown end -->
				</ul>
				<!--  notification end -->
			</div>
			<div class="top-nav ">
				<!--search & user info start-->
				<ul class="nav pull-right top-menu">
					<li><input type="text" class="form-control search"
						placeholder="Search"></li>
					<!-- user login dropdown start-->
					<li class="dropdown"><a data-toggle="dropdown"
						class="dropdown-toggle"
						href="http://thevectorlab.net/flatlab/index.html#"> <img alt=""
							src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/avatar1_small.jpg">
							<span class="username">Jhon Doue</span> <b class="caret"></b>
					</a>
						<ul class="dropdown-menu extended logout">
							<div class="log-arrow-up"></div>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"><i
									class=" fa fa-suitcase"></i>Profile</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"><i
									class="fa fa-cog"></i> Settings</a></li>
							<li><a href="http://thevectorlab.net/flatlab/index.html#"><i
									class="fa fa-bell-o"></i> Notification</a></li>
							<li><a href="http://thevectorlab.net/flatlab/login.html"><i
									class="fa fa-key"></i> Log Out</a></li>
						</ul></li>
					<li class="sb-toggle-right"><i class="fa  fa-align-right"></i></li>
					<!-- user login dropdown end -->
				</ul>
				<!--search & user info end-->
			</div>
		</header>
		<!--header end-->
		<!--sidebar start-->
		<aside>
			<div id="sidebar" class="nav-collapse " tabindex="5000"
				style="overflow: hidden; outline: none;">
				<!-- sidebar menu start-->
				<ul class="sidebar-menu" id="nav-accordion">
					<li><a class="active"
						href="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/FlatLab - Flat & Responsive Bootstrap Admin Template.html">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
					</a></li>

					<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
						class="dcjq-parent"> <i class="fa fa-laptop"></i> <span>Layouts</span>
							<span class="dcjq-icon"></span></a>
						<ul class="sub" style="display: none;">
							<li><a href="http://thevectorlab.net/flatlab/boxed_page.html">Boxed
									Page</a></li>
							<li><a
								href="http://thevectorlab.net/flatlab/horizontal_menu.html">Horizontal
									Menu</a></li>
							<li><a href="http://thevectorlab.net/flatlab/header-color.html">Different
									Color Top bar</a></li>
							<li><a href="http://thevectorlab.net/flatlab/mega_menu.html">Mega
									Menu</a></li>
							<li><a
								href="http://thevectorlab.net/flatlab/language_switch_bar.html">Language
									Switch Bar</a></li>
							<li><a href="http://thevectorlab.net/flatlab/email_template.html"
								target="_blank">Email Template</a></li>
						</ul></li>

					<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
						class="dcjq-parent"> <i class="fa fa-book"></i> <span>UI Elements</span>
							<span class="dcjq-icon"></span></a>
						<ul class="sub" style="display: none;">
							<li><a href="http://thevectorlab.net/flatlab/general.html">General</a></li>
							<li><a href="http://thevectorlab.net/flatlab/buttons.html">Buttons</a></li>
							<li><a href="http://thevectorlab.net/flatlab/modal.html">Modal</a></li>
							<li><a href="http://thevectorlab.net/flatlab/toastr.html">Toastr
									Notifications</a></li>
							<li><a href="http://thevectorlab.net/flatlab/widget.html">Widget</a></li>
							<li><a href="http://thevectorlab.net/flatlab/slider.html">Slider</a></li>
							<li><a href="http://thevectorlab.net/flatlab/nestable.html">Nestable</a></li>
							<li><a href="http://thevectorlab.net/flatlab/font_awesome.html">Font
									Awesome</a></li>
						</ul></li>

					<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
						class="dcjq-parent"> <i class="fa fa-cogs"></i> <span>Components</span>
							<span class="dcjq-icon"></span></a>
						<ul class="sub" style="display: none;">
							<li><a href="http://thevectorlab.net/flatlab/grids.html">Grids</a></li>
							<li><a href="http://thevectorlab.net/flatlab/calendar.html">Calendar</a></li>
							<li><a href="http://thevectorlab.net/flatlab/gallery.html">Gallery</a></li>
							<li><a href="http://thevectorlab.net/flatlab/todo_list.html">Todo
									List</a></li>
							<li><a
								href="http://thevectorlab.net/flatlab/draggable_portlet.html">Draggable
									Portlet</a></li>
							<li><a href="http://thevectorlab.net/flatlab/tree.html">Tree View</a></li>
						</ul></li>
					<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
						class="dcjq-parent"> <i class="fa fa-tasks"></i> <span>Form Stuff</span>
							<span class="dcjq-icon"></span></a>
						<ul class="sub" style="display: none;">
							<li><a href="http://thevectorlab.net/flatlab/form_component.html">Form
									Components</a></li>
							<li><a
								href="http://thevectorlab.net/flatlab/advanced_form_components.html">Advanced
									Components</a></li>
							<li><a href="http://thevectorlab.net/flatlab/form_wizard.html">Form
									Wizard</a></li>
							<li><a
								href="http://thevectorlab.net/flatlab/form_validation.html">Form
									Validation</a></li>
							<li><a href="http://thevectorlab.net/flatlab/dropzone.html">Dropzone
									File Upload</a></li>
							<li><a href="http://thevectorlab.net/flatlab/inline_editor.html">Inline
									Editor</a></li>
							<li><a href="http://thevectorlab.net/flatlab/image_cropping.html">Image
									Cropping</a></li>
							<li><a href="http://thevectorlab.net/flatlab/file_upload.html">Multiple
									File Upload</a></li>
						</ul></li>
					<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
						class="dcjq-parent"> <i class="fa fa-th"></i> <span>Data Tables</span>
							<span class="dcjq-icon"></span></a>
						<ul class="sub" style="display: none;">
							<li><a href="http://thevectorlab.net/flatlab/basic_table.html">Basic
									Table</a></li>
							<li><a
								href="http://thevectorlab.net/flatlab/responsive_table.html">Responsive
									Table</a></li>
							<li><a href="http://thevectorlab.net/flatlab/dynamic_table.html">Dynamic
									Table</a></li>
							<li><a href="http://thevectorlab.net/flatlab/editable_table.html">Editable
									Table</a></li>
						</ul></li>
					<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
						class="dcjq-parent"> <i class=" fa fa-envelope"></i> <span>Mail</span>
							<span class="dcjq-icon"></span></a>
						<ul class="sub" style="display: none;">
							<li><a href="http://thevectorlab.net/flatlab/inbox.html">Inbox</a></li>
							<li><a href="http://thevectorlab.net/flatlab/inbox_details.html">Inbox
									Details</a></li>
						</ul></li>
					<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
						class="dcjq-parent"> <i class=" fa fa-bar-chart-o"></i> <span>Charts</span>
							<span class="dcjq-icon"></span></a>
						<ul class="sub" style="display: none;">
							<li><a href="http://thevectorlab.net/flatlab/morris.html">Morris</a></li>
							<li><a href="http://thevectorlab.net/flatlab/chartjs.html">Chartjs</a></li>
							<li><a href="http://thevectorlab.net/flatlab/flot_chart.html">Flot
									Charts</a></li>
							<li><a href="http://thevectorlab.net/flatlab/xchart.html">xChart</a></li>
						</ul></li>
					<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
						class="dcjq-parent"> <i class="fa fa-shopping-cart"></i> <span>Shop</span>
							<span class="dcjq-icon"></span></a>
						<ul class="sub" style="display: none;">
							<li><a href="http://thevectorlab.net/flatlab/product_list.html">List
									View</a></li>
							<li><a
								href="http://thevectorlab.net/flatlab/product_details.html">Details
									View</a></li>
						</ul></li>
					<li><a href="http://thevectorlab.net/flatlab/google_maps.html"> <i
							class="fa fa-map-marker"></i> <span>Google Maps </span>
					</a></li>
					<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
						class="dcjq-parent"> <i class="fa fa-comments-o"></i> <span>Chat
								Room</span> <span class="dcjq-icon"></span></a>
						<ul class="sub" style="display: none;">
							<li><a href="http://thevectorlab.net/flatlab/lobby.html">Lobby</a></li>
							<li><a href="http://thevectorlab.net/flatlab/chat_room.html">
									Chat Room</a></li>
						</ul></li>
					<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
						class="dcjq-parent"> <i class="fa fa-glass"></i> <span>Extra</span>
							<span class="dcjq-icon"></span></a>
						<ul class="sub" style="display: none;">
							<li><a href="http://thevectorlab.net/flatlab/blank.html">Blank
									Page</a></li>
							<li><a href="http://thevectorlab.net/flatlab/sidebar_closed.html">Sidebar
									Closed</a></li>
							<li><a
								href="http://thevectorlab.net/flatlab/people_directory.html">People
									Directory</a></li>
							<li><a href="http://thevectorlab.net/flatlab/coming_soon.html">Coming
									Soon</a></li>
							<li><a href="http://thevectorlab.net/flatlab/lock_screen.html">Lock
									Screen</a></li>
							<li><a href="http://thevectorlab.net/flatlab/profile.html">Profile</a></li>
							<li><a href="http://thevectorlab.net/flatlab/invoice.html">Invoice</a></li>
							<li><a href="http://thevectorlab.net/flatlab/project_list.html">Project
									List</a></li>
							<li><a
								href="http://thevectorlab.net/flatlab/project_details.html">Project
									Details</a></li>
							<li><a href="http://thevectorlab.net/flatlab/search_result.html">Search
									Result</a></li>
							<li><a href="http://thevectorlab.net/flatlab/pricing_table.html">Pricing
									Table</a></li>
							<li><a href="http://thevectorlab.net/flatlab/faq.html">FAQ</a></li>
							<li><a href="http://thevectorlab.net/flatlab/fb_wall.html">FB
									Wall</a></li>
							<li><a href="http://thevectorlab.net/flatlab/404.html">404 Error</a></li>
							<li><a href="http://thevectorlab.net/flatlab/500.html">500 Error</a></li>
						</ul></li>
					<li><a href="http://thevectorlab.net/flatlab/login.html"> <i
							class="fa fa-user"></i> <span>Login Page</span>
					</a></li>

					<!--multi level menu start-->
					<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
						class="dcjq-parent"> <i class="fa fa-sitemap"></i> <span>Multi
								level Menu</span> <span class="dcjq-icon"></span></a>
						<ul class="sub" style="display: none;">
							<li><a href="javascript:;">Menu Item 1</a></li>
							<li class="sub-menu dcjq-parent-li"><a
								href="http://thevectorlab.net/flatlab/boxed_page.html"
								class="dcjq-parent">Menu Item 2<span class="dcjq-icon"></span></a>
								<ul class="sub" style="display: none;">
									<li><a href="javascript:;">Menu Item 2.1</a></li>
									<li class="sub-menu dcjq-parent-li"><a href="javascript:;"
										class="dcjq-parent">Menu Item 3<span class="dcjq-icon"></span></a>
										<ul class="sub" style="display: none;">
											<li><a href="javascript:;">Menu Item 3.1</a></li>
											<li><a href="javascript:;">Menu Item 3.2</a></li>
										</ul></li>
								</ul></li>
						</ul></li>
					<!--multi level menu end-->

				</ul>
				<!-- sidebar menu end-->
			</div>
		</aside>
		<!--sidebar end-->
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper">
				<!--state overview start-->
				<div class="row state-overview">
					<div class="col-lg-3 col-sm-6">
						<section class="panel">
							<div class="symbol terques">
								<i class="fa fa-user"></i>
							</div>
							<div class="value">
								<h1 class="count">495</h1>
								<p>New Users</p>
							</div>
						</section>
					</div>
					<div class="col-lg-3 col-sm-6">
						<section class="panel">
							<div class="symbol red">
								<i class="fa fa-tags"></i>
							</div>
							<div class="value">
								<h1 class=" count2">947</h1>
								<p>Sales</p>
							</div>
						</section>
					</div>
					<div class="col-lg-3 col-sm-6">
						<section class="panel">
							<div class="symbol yellow">
								<i class="fa fa-shopping-cart"></i>
							</div>
							<div class="value">
								<h1 class=" count3">328</h1>
								<p>New Order</p>
							</div>
						</section>
					</div>
					<div class="col-lg-3 col-sm-6">
						<section class="panel">
							<div class="symbol blue">
								<i class="fa fa-bar-chart-o"></i>
							</div>
							<div class="value">
								<h1 class=" count4">10328</h1>
								<p>Total Profit</p>
							</div>
						</section>
					</div>
				</div>
				<!--state overview end-->

				<div class="row">
					<div class="col-lg-8">
						<!--custom chart start-->
						<div class="border-head">
							<h3>Earning Graph</h3>
						</div>
						<div class="custom-bar-chart">
							<ul class="y-axis">
								<li><span>100</span></li>
								<li><span>80</span></li>
								<li><span>60</span></li>
								<li><span>40</span></li>
								<li><span>20</span></li>
								<li><span>0</span></li>
							</ul>
							<div class="bar">
								<div class="title">JAN</div>
								<div class="value tooltips" data-original-title="80%"
									data-toggle="tooltip" data-placement="top" style="height: 80%;"></div>
							</div>
							<div class="bar ">
								<div class="title">FEB</div>
								<div class="value tooltips" data-original-title="50%"
									data-toggle="tooltip" data-placement="top" style="height: 50%;"></div>
							</div>
							<div class="bar ">
								<div class="title">MAR</div>
								<div class="value tooltips" data-original-title="40%"
									data-toggle="tooltip" data-placement="top" style="height: 40%;"></div>
							</div>
							<div class="bar ">
								<div class="title">APR</div>
								<div class="value tooltips" data-original-title="55%"
									data-toggle="tooltip" data-placement="top" style="height: 55%;"></div>
							</div>
							<div class="bar">
								<div class="title">MAY</div>
								<div class="value tooltips" data-original-title="20%"
									data-toggle="tooltip" data-placement="top" style="height: 20%;"></div>
							</div>
							<div class="bar ">
								<div class="title">JUN</div>
								<div class="value tooltips" data-original-title="39%"
									data-toggle="tooltip" data-placement="top" style="height: 39%;"></div>
							</div>
							<div class="bar">
								<div class="title">JUL</div>
								<div class="value tooltips" data-original-title="75%"
									data-toggle="tooltip" data-placement="top" style="height: 75%;"></div>
							</div>
							<div class="bar ">
								<div class="title">AUG</div>
								<div class="value tooltips" data-original-title="45%"
									data-toggle="tooltip" data-placement="top" style="height: 45%;"></div>
							</div>
							<div class="bar ">
								<div class="title">SEP</div>
								<div class="value tooltips" data-original-title="50%"
									data-toggle="tooltip" data-placement="top" style="height: 50%;"></div>
							</div>
							<div class="bar ">
								<div class="title">OCT</div>
								<div class="value tooltips" data-original-title="42%"
									data-toggle="tooltip" data-placement="top" style="height: 42%;"></div>
							</div>
							<div class="bar ">
								<div class="title">NOV</div>
								<div class="value tooltips" data-original-title="60%"
									data-toggle="tooltip" data-placement="top" style="height: 60%;"></div>
							</div>
							<div class="bar ">
								<div class="title">DEC</div>
								<div class="value tooltips" data-original-title="90%"
									data-toggle="tooltip" data-placement="top" style="height: 90%;"></div>
							</div>
						</div>
						<!--custom chart end-->
					</div>
					<div class="col-lg-4">
						<!--new earning start-->
						<div class="panel terques-chart">
							<div class="panel-body chart-texture">
								<div class="chart">
									<div class="heading">
										<span>Friday</span> <strong>$ 57,00 | 15%</strong>
									</div>
									<div class="sparkline" data-type="line" data-resize="true"
										data-height="75" data-width="90%" data-line-width="1"
										data-line-color="#fff" data-spot-color="#fff"
										data-fill-color="" data-highlight-line-color="#fff"
										data-spot-radius="4"
										data-data="[200,135,667,333,526,996,564,123,890,564,455]">
										<canvas width="315" height="75"
											style="display: inline-block; width: 315px; height: 75px; vertical-align: top;"></canvas>
									</div>
								</div>
							</div>
							<div class="chart-tittle">
								<span class="title">New Earning</span> <span class="value"> <a
									href="http://thevectorlab.net/flatlab/index.html#"
									class="active">Market</a> | <a
									href="http://thevectorlab.net/flatlab/index.html#">Referal</a>
									| <a href="http://thevectorlab.net/flatlab/index.html#">Online</a>
								</span>
							</div>
						</div>
						<!--new earning end-->

						<!--total earning start-->
						<div class="panel green-chart">
							<div class="panel-body">
								<div class="chart">
									<div class="heading">
										<span>June</span> <strong>23 Days | 65%</strong>
									</div>
									<div id="barchart">
										<canvas width="294" height="65"
											style="display: inline-block; width: 294px; height: 65px; vertical-align: top;"></canvas>
									</div>
								</div>
							</div>
							<div class="chart-tittle">
								<span class="title">Total Earning</span> <span class="value">$,
									76,54,678</span>
							</div>
						</div>
						<!--total earning end-->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<!--user info table start-->
						<section class="panel">
							<div class="panel-body">
								<a href="http://thevectorlab.net/flatlab/index.html#"
									class="task-thumb"> <img
									src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/avatar1.jpg"
									alt="">
								</a>
								<div class="task-thumb-details">
									<h1>
										<a href="http://thevectorlab.net/flatlab/index.html#">Anjelina
											Joli</a>
									</h1>
									<p>Senior Architect</p>
								</div>
							</div>
							<table class="table table-hover personal-task">
								<tbody>
									<tr>
										<td><i class=" fa fa-tasks"></i></td>
										<td>New Task Issued</td>
										<td>02</td>
									</tr>
									<tr>
										<td><i class="fa fa-exclamation-triangle"></i></td>
										<td>Task Pending</td>
										<td>14</td>
									</tr>
									<tr>
										<td><i class="fa fa-envelope"></i></td>
										<td>Inbox</td>
										<td>45</td>
									</tr>
									<tr>
										<td><i class=" fa fa-bell-o"></i></td>
										<td>New Notification</td>
										<td>09</td>
									</tr>
								</tbody>
							</table>
						</section>
						<!--user info table end-->
					</div>
					<div class="col-lg-8">
						<!--work progress start-->
						<section class="panel">
							<div class="panel-body progress-panel">
								<div class="task-progress">
									<h1>Work Progress</h1>
									<p>Anjelina Joli</p>
								</div>
								<div class="task-option">
									<select class="styled hasCustomSelect"
										style="-webkit-appearance: menulist-button; width: 117px; position: absolute; opacity: 0; height: 39px; font-size: 12px;">
										<option>Anjelina Joli</option>
										<option>Tom Crouse</option>
										<option>Jhon Due</option>
									</select><span class="customSelect styled"
										style="display: inline-block;"><span class="customSelectInner"
										style="width: 95px; display: inline-block;">Anjelina Joli</span></span>
								</div>
							</div>
							<table class="table table-hover personal-task">
								<tbody>
									<tr>
										<td>1</td>
										<td>Target Sell</td>
										<td><span class="badge bg-important">75%</span></td>
										<td>
											<div id="work-progress1">
												<canvas width="47" height="20"
													style="display: inline-block; width: 47px; height: 20px; vertical-align: top;"></canvas>
											</div>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Product Delivery</td>
										<td><span class="badge bg-success">43%</span></td>
										<td>
											<div id="work-progress2">
												<canvas width="47" height="22"
													style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas>
											</div>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Payment Collection</td>
										<td><span class="badge bg-info">67%</span></td>
										<td>
											<div id="work-progress3">
												<canvas width="47" height="22"
													style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas>
											</div>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td>Work Progress</td>
										<td><span class="badge bg-warning">30%</span></td>
										<td>
											<div id="work-progress4">
												<canvas width="47" height="22"
													style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas>
											</div>
										</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Delivery Pending</td>
										<td><span class="badge bg-primary">15%</span></td>
										<td>
											<div id="work-progress5">
												<canvas width="47" height="22"
													style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</section>
						<!--work progress end-->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8">
						<!--timeline start-->
						<section class="panel">
							<div class="panel-body">
								<div class="text-center mbot30">
									<h3 class="timeline-title">Timeline</h3>
									<p class="t-info">This is a project timeline</p>
								</div>

								<div class="timeline">
									<article class="timeline-item">
										<div class="timeline-desk">
											<div class="panel">
												<div class="panel-body">
													<span class="arrow"></span> <span class="timeline-icon red"></span>
													<span class="timeline-date">08:25 am</span>
													<h1 class="red">12 July | Sunday</h1>
													<p>Lorem ipsum dolor sit amet consiquest dio</p>
												</div>
											</div>
										</div>
									</article>
									<article class="timeline-item alt">
										<div class="timeline-desk">
											<div class="panel">
												<div class="panel-body">
													<span class="arrow-alt"></span> <span
														class="timeline-icon green"></span> <span
														class="timeline-date">10:00 am</span>
													<h1 class="green">10 July | Wednesday</h1>
													<p>
														<a href="http://thevectorlab.net/flatlab/index.html#">Jonathan
															Smith</a> added new milestone <span><a
															href="http://thevectorlab.net/flatlab/index.html#"
															class="green">ERP</a></span>
													</p>
												</div>
											</div>
										</div>
									</article>
									<article class="timeline-item">
										<div class="timeline-desk">
											<div class="panel">
												<div class="panel-body">
													<span class="arrow"></span> <span
														class="timeline-icon blue"></span> <span
														class="timeline-date">11:35 am</span>
													<h1 class="blue">05 July | Monday</h1>
													<p>
														<a href="http://thevectorlab.net/flatlab/index.html#">Anjelina
															Joli</a> added new album <span><a
															href="http://thevectorlab.net/flatlab/index.html#"
															class="blue">PARTY TIME</a></span>
													</p>
													<div class="album">
														<a href="http://thevectorlab.net/flatlab/index.html#"> <img
															alt=""
															src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/sm-img-1.jpg">
														</a> <a href="http://thevectorlab.net/flatlab/index.html#">
															<img alt=""
															src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/sm-img-2.jpg">
														</a> <a href="http://thevectorlab.net/flatlab/index.html#">
															<img alt=""
															src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/sm-img-3.jpg">
														</a> <a href="http://thevectorlab.net/flatlab/index.html#">
															<img alt=""
															src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/sm-img-1.jpg">
														</a> <a href="http://thevectorlab.net/flatlab/index.html#">
															<img alt=""
															src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/sm-img-2.jpg">
														</a>
													</div>
												</div>
											</div>
										</div>
									</article>
									<article class="timeline-item alt">
										<div class="timeline-desk">
											<div class="panel">
												<div class="panel-body">
													<span class="arrow-alt"></span> <span
														class="timeline-icon purple"></span> <span
														class="timeline-date">3:20 pm</span>
													<h1 class="purple">29 June | Saturday</h1>
													<p>Lorem ipsum dolor sit amet consiquest dio</p>
													<div class="notification">
														<i class=" fa fa-exclamation-sign"></i> New task added for
														<a href="http://thevectorlab.net/flatlab/index.html#">Denial
															Collins</a>
													</div>
												</div>
											</div>
										</div>
									</article>
									<article class="timeline-item">
										<div class="timeline-desk">
											<div class="panel">
												<div class="panel-body">
													<span class="arrow"></span> <span
														class="timeline-icon light-green"></span> <span
														class="timeline-date">07:49 pm</span>
													<h1 class="light-green">10 June | Friday</h1>
													<p>
														<a href="http://thevectorlab.net/flatlab/index.html#">Jonatha
															Smith</a> added new milestone <span><a
															href="http://thevectorlab.net/flatlab/index.html#"
															class="light-green">prank</a></span> Lorem ipsum dolor
														sit amet consiquest dio
													</p>
												</div>
											</div>
										</div>
									</article>
								</div>

								<div class="clearfix">&nbsp;</div>
							</div>
						</section>
						<!--timeline end-->
					</div>
					<div class="col-lg-4">
						<!--revenue start-->
						<section class="panel">
							<div class="revenue-head">
								<span> <i class="fa fa-bar-chart-o"></i>
								</span>
								<h3>Revenue</h3>
								<span class="rev-combo pull-right"> June 2013 </span>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6 col-sm-6 text-center">
										<div class="easy-pie-chart">
											<div class="percentage easyPieChart" data-percent="35"
												style="width: 135px; height: 135px; line-height: 135px;">
												<span>35</span>%
												<canvas width="135" height="135"></canvas>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="chart-info chart-position">
											<span class="increase"></span> <span>Revenue Increase</span>
										</div>
										<div class="chart-info">
											<span class="decrease"></span> <span>Revenue Decrease</span>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-footer revenue-foot">
								<ul>
									<li class="first active"><a href="javascript:;"> <i
											class="fa fa-bullseye"></i> Graphical
									</a></li>
									<li><a href="javascript:;"> <i class=" fa fa-th-large"></i>
											Tabular
									</a></li>
									<li class="last"><a href="javascript:;"> <i
											class=" fa fa-align-justify"></i> Listing
									</a></li>
								</ul>
							</div>
						</section>
						<!--revenue end-->
						<!--features carousel start-->
						<section class="panel">
							<div class="flat-carousal">
								<div id="owl-demo" class="owl-carousel owl-theme"
									style="opacity: 1; display: block;">
									<div class="owl-wrapper-outer">
										<div class="owl-wrapper"
											style="width: 2160px; left: -720px; display: block;">
											<div class="owl-item" style="width: 360px;">
												<div class="item">
													<h1>Flatlab is new model of admin dashboard for happy use</h1>
													<div class="text-center">
														<a href="javascript:;" class="view-all">View All</a>
													</div>
												</div>
											</div>
											<div class="owl-item" style="width: 360px;">
												<div class="item">
													<h1>Fully responsive and build with Bootstrap 3.0</h1>
													<div class="text-center">
														<a href="javascript:;" class="view-all">View All</a>
													</div>
												</div>
											</div>
											<div class="owl-item" style="width: 360px;">
												<div class="item">
													<h1>Responsive Frontend is free if you get this.</h1>
													<div class="text-center">
														<a href="javascript:;" class="view-all">View All</a>
													</div>
												</div>
											</div>
										</div>
									</div>


									<div class="owl-controls clickable">
										<div class="owl-pagination">
											<div class="owl-page">
												<span class=""></span>
											</div>
											<div class="owl-page">
												<span class=""></span>
											</div>
											<div class="owl-page active">
												<span class=""></span>
											</div>
										</div>
										<div class="owl-buttons">
											<div class="owl-prev">prev</div>
											<div class="owl-next">next</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<ul class="ft-link">
									<li class="active"><a href="javascript:;"> <i
											class="fa fa-bars"></i> Sales
									</a></li>
									<li><a href="javascript:;"> <i class=" fa fa-calendar-o"></i>
											promo
									</a></li>
									<li><a href="javascript:;"> <i class=" fa fa-camera"></i> photo
									</a></li>
									<li><a href="javascript:;"> <i class=" fa fa-circle"></i> other
									</a></li>
								</ul>
							</div>
						</section>
						<!--features carousel end-->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8">
						<!--latest product info start-->
						<section class="panel post-wrap pro-box">
							<aside>
								<div class="post-info">
									<span class="arrow-pro right"></span>
									<div class="panel-body">
										<h1>
											<strong>popular</strong> <br> Brand of this week
										</h1>
										<div class="desk yellow">
											<h3>Dimond Ring</h3>
											<p>Lorem ipsum dolor set amet lorem ipsum dolor set amet
												ipsum dolor set amet</p>
										</div>
										<div class="post-btn">
											<a href="javascript:;"> <i class="fa fa-chevron-circle-left"></i>
											</a> <a href="javascript:;"> <i
												class="fa fa-chevron-circle-right"></i>
											</a>
										</div>
									</div>
								</div>
							</aside>
							<aside class="post-highlight yellow v-align">
								<div class="panel-body text-center">
									<div class="pro-thumb">
										<img
											src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/ring.jpg"
											alt="">
									</div>
								</div>
							</aside>
						</section>
						<!--latest product info end-->
						<!--twitter feedback start-->
						<section class="panel post-wrap pro-box">
							<aside class="post-highlight terques v-align">
								<div class="panel-body">
									<h2>
										Flatlab is new model of admin dashboard <a href="javascript:;">
											http://demo.com/</a> 4 days ago by jonathan smith
									</h2>
								</div>
							</aside>
							<aside>
								<div class="post-info">
									<span class="arrow-pro left"></span>
									<div class="panel-body">
										<div class="text-center twite">
											<h1>Twitter Feed</h1>
										</div>

										<footer class="social-footer">
											<ul>
												<li><a href="http://thevectorlab.net/flatlab/index.html#"> <i
														class="fa fa-facebook"></i>
												</a></li>
												<li class="active"><a
													href="http://thevectorlab.net/flatlab/index.html#"> <i
														class="fa fa-twitter"></i>
												</a></li>
												<li><a href="http://thevectorlab.net/flatlab/index.html#"> <i
														class="fa fa-google-plus"></i>
												</a></li>
												<li><a href="http://thevectorlab.net/flatlab/index.html#"> <i
														class="fa fa-pinterest"></i>
												</a></li>
											</ul>
										</footer>
									</div>
								</div>
							</aside>
						</section>
						<!--twitter feedback end-->
					</div>
					<div class="col-lg-4">
						<div class="row">
							<div class="col-xs-6">
								<!--pie chart start-->
								<section class="panel">
									<div class="panel-body">
										<div class="chart">
											<div id="pie-chart">
												<canvas width="100" height="100"
													style="display: inline-block; width: 100px; height: 100px; vertical-align: top;"></canvas>
											</div>
										</div>
									</div>
									<footer class="pie-foot"> Free: 260GB </footer>
								</section>
								<!--pie chart start-->
							</div>
							<div class="col-xs-6">
								<!--follower start-->
								<section class="panel">
									<div class="follower">
										<div class="panel-body">
											<h4>Jonathan Smith</h4>
											<div class="follow-ava">
												<img
													src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/follower-avatar.jpg"
													alt="">
											</div>
										</div>
									</div>

									<footer class="follower-foot">
										<ul>
											<li>
												<h5>2789</h5>
												<p>Follower</p>
											</li>
											<li>
												<h5>270</h5>
												<p>Following</p>
											</li>
										</ul>
									</footer>
								</section>
								<!--follower end-->
							</div>
						</div>
						<!--weather statement start-->
						<section class="panel">
							<div class="weather-bg">
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-6">
											<i class="fa fa-cloud"></i> California
										</div>
										<div class="col-xs-6">
											<div class="degree">24�</div>
										</div>
									</div>
								</div>
							</div>

							<footer class="weather-category">
								<ul>
									<li class="active">
										<h5>humidity</h5> 56%
									</li>
									<li>
										<h5>precip</h5> 1.50 in
									</li>
									<li>
										<h5>winds</h5> 10 mph
									</li>
								</ul>
							</footer>

						</section>
						<!--weather statement end-->
					</div>
				</div>

			</section>
		</section>
		<!--main content end-->

		<!-- Right Slidebar start -->
		<div class="sb-slidebar sb-right sb-style-overlay"
			style="margin-right: -288px;">
			<h5 class="side-title">Online Customers</h5>
			<ul class="quick-chat-list">
				<li class="online">
					<div class="media">
						<a href="http://thevectorlab.net/flatlab/index.html#"
							class="pull-left media-thumb"> <img alt=""
							src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/chat-avatar2.jpg"
							class="media-object">
						</a>
						<div class="media-body">
							<strong>John Doe</strong> <small>Dream Land, AU</small>
						</div>
					</div> <!-- media -->
				</li>
				<li class="online">
					<div class="media">
						<a href="http://thevectorlab.net/flatlab/index.html#"
							class="pull-left media-thumb"> <img alt=""
							src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/chat-avatar.jpg"
							class="media-object">
						</a>
						<div class="media-body">
							<div class="media-status">
								<span class=" badge bg-important">3</span>
							</div>
							<strong>Jonathan Smith</strong> <small>United States</small>
						</div>
					</div> <!-- media -->
				</li>

				<li class="online">
					<div class="media">
						<a href="http://thevectorlab.net/flatlab/index.html#"
							class="pull-left media-thumb"> <img alt=""
							src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/pro-ac-1.png"
							class="media-object">
						</a>
						<div class="media-body">
							<div class="media-status">
								<span class=" badge bg-success">5</span>
							</div>
							<strong>Jane Doe</strong> <small>ABC, USA</small>
						</div>
					</div> <!-- media -->
				</li>
				<li class="online">
					<div class="media">
						<a href="http://thevectorlab.net/flatlab/index.html#"
							class="pull-left media-thumb"> <img alt=""
							src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/avatar1.jpg"
							class="media-object">
						</a>
						<div class="media-body">
							<strong>Anjelina Joli</strong> <small>Fockland, UK</small>
						</div>
					</div> <!-- media -->
				</li>
				<li class="online">
					<div class="media">
						<a href="http://thevectorlab.net/flatlab/index.html#"
							class="pull-left media-thumb"> <img alt=""
							src="./FlatLab - Flat & Responsive Bootstrap Admin Template_files/mail-avatar.jpg"
							class="media-object">
						</a>
						<div class="media-body">
							<div class="media-status">
								<span class=" badge bg-warning">7</span>
							</div>
							<strong>Mr Tasi</strong> <small>Dream Land, USA</small>
						</div>
					</div> <!-- media -->
				</li>
			</ul>
			<h5 class="side-title">pending Task</h5>
			<ul class="p-task tasks-bar">
				<li><a href="http://thevectorlab.net/flatlab/index.html#">
						<div class="task-info">
							<div class="desc">Dashboard v1.3</div>
							<div class="percent">40%</div>
						</div>
						<div class="progress progress-striped">
							<div style="width: 40%" aria-valuemax="100" aria-valuemin="0"
								aria-valuenow="40" role="progressbar"
								class="progress-bar progress-bar-success">
								<span class="sr-only">40% Complete (success)</span>
							</div>
						</div>
				</a></li>
				<li><a href="http://thevectorlab.net/flatlab/index.html#">
						<div class="task-info">
							<div class="desc">Database Update</div>
							<div class="percent">60%</div>
						</div>
						<div class="progress progress-striped">
							<div style="width: 60%" aria-valuemax="100" aria-valuemin="0"
								aria-valuenow="60" role="progressbar"
								class="progress-bar progress-bar-warning">
								<span class="sr-only">60% Complete (warning)</span>
							</div>
						</div>
				</a></li>
				<li><a href="http://thevectorlab.net/flatlab/index.html#">
						<div class="task-info">
							<div class="desc">Iphone Development</div>
							<div class="percent">87%</div>
						</div>
						<div class="progress progress-striped">
							<div style="width: 87%" aria-valuemax="100" aria-valuemin="0"
								aria-valuenow="20" role="progressbar"
								class="progress-bar progress-bar-info">
								<span class="sr-only">87% Complete</span>
							</div>
						</div>
				</a></li>
				<li><a href="http://thevectorlab.net/flatlab/index.html#">
						<div class="task-info">
							<div class="desc">Mobile App</div>
							<div class="percent">33%</div>
						</div>
						<div class="progress progress-striped">
							<div style="width: 33%" aria-valuemax="100" aria-valuemin="0"
								aria-valuenow="80" role="progressbar"
								class="progress-bar progress-bar-danger">
								<span class="sr-only">33% Complete (danger)</span>
							</div>
						</div>
				</a></li>
				<li><a href="http://thevectorlab.net/flatlab/index.html#">
						<div class="task-info">
							<div class="desc">Dashboard v1.3</div>
							<div class="percent">45%</div>
						</div>
						<div class="progress progress-striped active">
							<div style="width: 45%" aria-valuemax="100" aria-valuemin="0"
								aria-valuenow="45" role="progressbar" class="progress-bar">
								<span class="sr-only">45% Complete</span>
							</div>
						</div>

				</a></li>
				<li class="external"><a
					href="http://thevectorlab.net/flatlab/index.html#">See All Tasks</a>
				</li>
			</ul>
		</div>
		<!-- Right Slidebar end -->

		<!--footer start-->
		<footer class="site-footer">
			<div class="text-center">
				2013 � FlatLab by VectorLab. <a
					href="http://thevectorlab.net/flatlab/index.html#" class="go-top">
					<i class="fa fa-angle-up"></i>
				</a>
			</div>
		</footer>
		<!--footer end-->
	</section>

	<!-- js placed at the end of the document so the pages load faster -->
	<script type="text/javascript">
   var  base_url =  '<?php echo base_url;?>';
</script>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/bootstrap.min.js"></script>
	<script class="include" type="text/javascript"
		src="<?php echo base_url;?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="<?php echo base_url;?>assets/js/jquery.scrollTo.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/jquery.nicescroll.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url;?>assets/js/jquery.sparkline.js"
		type="text/javascript"></script>
	<script src="<?php echo base_url;?>assets/js/jquery.easy-pie-chart.js"></script>
	<script src="<?php echo base_url;?>assets/js/owl.carousel.js"></script>
	<script
		src="<?php echo base_url;?>assets/js/jquery.customSelect.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/respond.min.js"></script>

	<!--right slidebar-->
	<script src="<?php echo base_url;?>assets/js/slidebars.min.js"></script>

	<!--common script for all pages-->
	<script src="<?php echo base_url;?>assets/js/common-scripts.js"></script>
	<div id="ascrail2000" class="nicescroll-rails"
		style="width: 3px; z-index: auto; cursor: default; position: fixed; height: 732px; opacity: 0; background: rgb(64, 64, 64);">
		<div
			style="position: relative; top: 0px; float: right; width: 3px; height: 677px; border-radius: 10px; background-color: rgb(232, 64, 63); background-clip: padding-box;"></div>
	</div>
	<div id="ascrail2000-hr" class="nicescroll-rails"
		style="height: 3px; z-index: auto; position: fixed; cursor: default; display: none; width: 207px; opacity: 0; background: rgb(64, 64, 64);">
		<div
			style="position: relative; top: 0px; height: 3px; width: 210px; border-radius: 10px; background-color: rgb(232, 64, 63); background-clip: padding-box;"></div>
	</div>
	<div id="ascrail2001" class="nicescroll-rails"
		style="width: 6px; z-index: 1000; cursor: default; position: fixed; top: 0px; height: 100%; right: 0px; opacity: 0; background: rgb(64, 64, 64);">
		<div
			style="position: relative; top: 0px; float: right; width: 6px; height: 266px; border-radius: 10px; background-color: rgb(232, 64, 63); background-clip: padding-box;"></div>
	</div>
	<div id="ascrail2001-hr" class="nicescroll-rails"
		style="height: 6px; z-index: 1000; position: fixed; left: 0px; width: 100%; bottom: 0px; cursor: default; display: none; opacity: 0; background: rgb(64, 64, 64);">
		<div
			style="position: relative; top: 0px; height: 6px; width: 1440px; border-radius: 10px; background-color: rgb(232, 64, 63); background-clip: padding-box;"></div>
	</div>

	<!--script for this page-->
	<script src="<?php echo base_url;?>assets/js/sparkline-chart.js"></script>
	<script src="<?php echo base_url;?>assets/js/easy-pie-chart.js"></script>
	<script src="<?php echo base_url;?>assets/js/count.js"></script>

	<script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>



</body>
</html>