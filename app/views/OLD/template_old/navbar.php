<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url();?>landing">Better
				Bracket</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url();?>profile">Profile</a></li>
				<li><a href="#about">About</a></li>

				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">Groups<b class="caret"></b>
				</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url();?>groups/addgroup">Create Group</a>
						</li>
						<li><a href="<?php echo base_url();?>groups/create_bracket">Create
								Bracket</a></li>
						<li><a href="<?php echo base_url();?>groups/viewyourgroups">View
								Your Groups</a></li>
						<li><a href="<?php echo base_url();?>groups/viewAllGroups">View
								All Groups</a></li>
					</ul>
				</li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">More <b class="caret"></b>
				</a>
					<ul class="dropdown-menu">
						<li><a href="#">My Picks</a></li>
						<li><a href="#">Upcoming Games</a></li>
						<li><a href="<?php echo base_url();?>landing/viewPast">Past Games</a>
						</li>
						<li><a href="<?php echo base_url();?>landing/database">DB Query</a>
						</li>
						<li><a href="<?php echo base_url();?>landing/logout">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!--/.nav-collapse -->
	</div>
</div>
