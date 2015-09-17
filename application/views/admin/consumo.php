	<link href="<?php echo $this->config->base_url();?>assets/plugins/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->base_url();?>assets/plugins/select2/select2_metro.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->config->base_url();?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo $this->config->base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/excanvas.min.js"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/respond.min.js"></script>    
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js" type="text/javascript" ></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/select2/select2.min.js" type="text/javascript" ></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/scripts/app.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/scripts/index.js" type="text/javascript"></script></script>
    <script src="<?php echo $this->config->base_url();?>assets/plugins/bootstrap-daterangepicker/date.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->base_url();?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->  
	<script>
		jQuery(document).ready(function() { 
		   App.init();
		   Index.init();
		   Index.initCalendar();
		   Index.initDashboardDaterange();
    		$('#dashboard-report-range').show();
		});
		
		function mostrar_rango(){
			var fecha='/'+$('#dashboard-report-range span').html();
			<?php
			$var = "";
			if($this->uri->segment(3) != ""){
				$var= "/".$this->uri->segment(3);
			}
			?>
			var url= "<?php echo site_url().$this->uri->segment(1)."/".$this->uri->segment(2).$var; ?>"+fecha;
			window.location.href = url;

		}
	</script>
	<!-- END JAVASCRIPTS -->
    
    