<?php
// scripts.php
// page included to add necessary scripts for every page
//
$device_id = 0;
if(isset($data['device_id']))
	$device_id = $data['device_id'];
?>
<!-- js placed at the end of the document so the pages load faster -->
<script type="text/javascript">
	var base_url =  '<?php echo base_url;?>';
	var device_id = <?php echo $device_id;?>;
</script>

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo base_url;?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url;?>assets/js/functions.js"></script>


<script src="<?php echo base_url;?>assets/js/main.js"></script>
<script src="<?php echo base_url;?>assets/js/widget.js"></script>
<!-- FLAT UI -->
<!-- Load JS here for greater good =============================-->
<script
	src="<?php echo base_url;?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script
	src="<?php echo base_url;?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url;?>assets/js/bootstrap-select.js"></script>
<script src="<?php echo base_url;?>assets/js/bootstrap-switch.js"></script>
<script src="<?php echo base_url;?>assets/js/flatui-checkbox.js"></script>
<script src="<?php echo base_url;?>assets/js/flatui-radio.js"></script>
<script src="<?php echo base_url;?>assets/js/jquery.tagsinput.js"></script>
<script src="<?php echo base_url;?>assets/js/jquery.placeholder.js"></script>
<script src="<?php echo base_url;?>assets/js/jquery.knob.js"></script>
<script src="<?php echo base_url;?>assets/js/knob.js"></script>

<script class="include" type="text/javascript"
	src="<?php echo base_url;?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo base_url;?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url;?>assets/js/jquery.nicescroll.js"
	type="text/javascript"></script>
<script src="<?php echo base_url;?>assets/js/jquery.sparkline.js"
	type="text/javascript"></script>
<script src="<?php echo base_url;?>assets/js/jquery.easy-pie-chart.js"></script>
<script src="<?php echo base_url;?>assets/js/owl.carousel.js"></script>
<script src="<?php echo base_url;?>assets/js/jquery.customSelect.min.js"></script>
<script src="<?php echo base_url;?>assets/js/respond.min.js"></script>
<!--<script src='<?php echo base_url;?>assets/js/spectrum.js'></script> -->

<!--right slidebar-->
<script src="<?php echo base_url;?>assets/js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="<?php echo base_url;?>assets/js/common-scripts.js"></script>

<!--script for this page-->
<script src="<?php echo base_url;?>assets/js/sparkline-chart.js"></script>
<script src="<?php echo base_url;?>assets/js/easy-pie-chart.js"></script>
<script src="<?php echo base_url;?>assets/js/count.js"></script>
<script type="text/javascript"
	src="http://52.1.91.1/project/assets/js/highcharts.js"></script>

<script type="text/javascript"
	src="<?php echo base_url;?>assets/js/tinycolorpicker.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/d3/2.10.0/d3.v2.js"></script>


<script type="text/javascript"
	src="<?php echo base_url;?>assets/js/xcharts.min.js"></script>

<script type="text/javascript"
	src="<?php echo base_url;?>assets/js/sugar.min.js"></script>

<script type="text/javascript"
	src="<?php echo base_url;?>assets/js/daterangepicker.js"></script>
<script type="text/javascript"
	src="<?php echo base_url;?>assets/js/Chart.js"></script>
<script type="text/javascript"
	src="<?php echo base_url;?>assets/js/script.js"></script>
