<!DOCTYPE html>
<html lang="en" class="sb-init">
<?php
$data ['title'] = "Dashboard";
if (! isset ( $this->user_model ))
	$this->load_model ( 'user_model' );
$data ['user'] = $this->user_model->get_user ();

$this->load_view ( 'template/header_files', $data );
?>

<body>
	<section id="container">
		<?php
		$this->load_view ( 'template/top_bar', $data );
		$this->load_view ( 'template/side_bar', $data );
		?>
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper">
				<!-- Main Content Start-->
				<?php
				if (isset ( $data ['main_content'] )) {
					$content = $data ['main_content'];
				} else
					$content = "dashboard/main_dash_content";
				$this->load_view ( $content, $data );
				?>
				<!--Main Content end-->

			</section>
		</section>
	</section>
	<?php $this->load_view('template/scripts'); ?>
</body>
</html>
