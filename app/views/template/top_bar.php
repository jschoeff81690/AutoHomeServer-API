		
		<!--topbar start-->
		<header class="header white-bg">

			<div class="sidebar-toggle-box">
				<div class="fa fa-bars" data-original-title="Toggle Navigation" data-placement="right">
				</div>
			</div>
			<a class="logo">Auto<span>Home</span></a>

			<div class="nav notify-row" id="top_menu"></div>
			<div class="top-nav">
				<!--search & user info start-->
				<ul class="nav pull-right top-menu">
					<!-- user login dropdown start-->
					<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"> 
							</span><span class="username"><?php echo $this->user->_get('name');?></span> <b class="caret"></b>
					</a>
						<ul class="dropdown-menu extended">
							<li><a href="<?php echo base_url;?>home/account" >
									<span class="glyphicon glyphicon-cog"></span> Account Settings
								</a>
							</li>
							<li>
								<a href="<?php echo base_url;?>home/logout"> Logout
								</a>
							</li>
						</ul></li>
					<!-- user login dropdown end -->
				</ul>
			</div>
		</header>

		<!--topbar end-->