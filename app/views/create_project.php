<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$data['title'] = "teamPlay : create new Project";
$this->load_view('template/header_files',$data);
?>

</head>

<body>
	<div class="container">
		<div class="row topbar">
			<a href="<?php echo base_url;?>"><div class="logo pull-left"></div></a>
		</div>
		<div class="row">
			<div class="group col-md-8 col-md-offset-2">
				<div class="row">
					<h1 class="group-title col-md-6">Create a new Project</h1>
				</div>
				<div class="group-body">
					<?php 
					if(function_exists('_step'.$step)) {
						$func = '_step'.$step;
						$func($this);
					}
					else{
						echo '<pre>';
						var_dump(false);
						echo '</pre>';
					}?>
					<br><br>
				</div>
			</div>
		</div>
		<?php
		$this->load_view('template/widget');?>
	</div>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?php echo base_url;?>assets/js/bootstrap.min.js"></script>
	<script src="http://localhost/teamPlay/assets/js/widget.js"></script>
</body>
</html>

<?php
function _step1(&$app) {
	_create_bar(1);
	?>
<div class="row">
	<form class="form-horizontal col-md-12 create_project" role="form" method="POST" action="<?php echo base_url;?>projects/create/1">
		<div class="form-group">
	        <label class="col-md-4 control-label" for="project_name">Project Name</label>
	        <div class="col-md-8"><input name="project_name" type="text" class="form-control" placeholder="Project Name" required autofocus></div>
		</div>
		<div class="form-group">
	        <label class="col-md-4 control-label" for="project_description">Project Description</label>
	        <div class="col-md-8"><input name="project_description" type="text" class="form-control" placeholder="Project Description" required></div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4" for="month">Finish Date</label>
			<div class="col-md-2">
				<select class="form-control" name="month">
					<option value="01">January</option>
					<option value="02">February</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
			</div>
			<div class="col-md-2">
				<select class="form-control" name="day">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
			</div>
			<div class="col-md-2">
				<select class="form-control" name="year">
					<option value="2014">2014</option>
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
				</select>
			</div>
		</div>
		<input class="btn btn-primary col-md-offset-8 col-md-4" type="submit" value="Continue to Step 2">
	</form>
</div>
<?php
}

function _step2(&$app){	
	_create_bar(2);
	echo '<p>Let\'s add some teamPlayers.<br> It\'s simple. Just click on a user to add them.</p>';
	?>
<div class="row">
<form class="form-horizontal col-md-12 create_project" role="form" method="POST" action="<?php echo base_url;?>projects/create/2">
	<?php

	$users = $app->user_model->get_all_users();

	foreach($users as $user) {
		if($user->_get('id') != $_SESSION['uid']) {
	?>
	<div class="checkbox">
	  <label>
	    <input type="checkbox" name="user<?php echo $user->_get('id');?>" value="<?php echo $user->_get('id');?>">
	    <?php echo 'Name: '.$user->_get('name').'<br>';?>
	    <?php echo 'Email: '.$user->_get('email').'<br>';?>
	  </label>
	</div>
	<?php
		}// eof if


	} //eof foreach
	?>

		<input class="btn btn-primary col-md-offset-8 col-md-4" type="submit" value="Continue to Step 3">
	</form>
</div><?php

}

function _step3(&$app){
	
	_create_bar(3);
echo '<p>Let\'s add some extra info, you can <em>skip</em> this step if you\'d like.<br> </p>';
	?>
<div class="row">
	<form class="form-horizontal col-md-12 create_project" role="form" method="POST" action="<?php echo base_url;?>projects/create/3">
		<div class="form-group">
	        <label class="col-md-4 control-label" for="project_name">Company</label>
	        <div class="col-md-8"><input name="company" type="text" 
class="form-control" placeholder="Company Name" autofocus></div>
		</div>
		<div class="form-group">
	        <label class="col-md-4 control-label" for="project_name">Website</label>
	        <div class="col-md-8"><input name="website" type="text" class="form-control" placeholder="Website" autofocus></div>
		</div>
		<div class="form-group">
	        <label class="col-md-4 control-label" for="project_name">Contact Info:</label>
	        <div class="col-md-8"><input name="contact" type="text" class="form-control" placeholder="Website" autofocus></div>
		</div>
		<div class="btn group col-md-4 col-md-offset-6">
			<input class="btn btn-success" type="submit" name="skip" value="Skip and Finish">
			<input class="btn btn-primary" type="submit" name="finish" value="Finish with Extras">
		</div>
	</form>
</div><?php

}

function _create_bar($step_num){
	$steps = array(1=>'Details',2=>'teamPlayers',3=>'Extras');
	echo '<ul class="row project-step-bar">';
	foreach($steps as $num => $step){
		echo '<li class="col-md-4">'.$step;
		echo '<span class="glyphicon '.($step_num > $num ? "glyphicon-ok-circle" :"glyphicon-record" ).($step_num == $num ? " current" :"" ).'"></span>';
		echo '	</li>';
	}
	echo '</ul>';
}
?>

