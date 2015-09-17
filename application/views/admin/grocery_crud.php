	<link href="<?php echo $this->config->base_url();?>assets/plugins/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->base_url();?>assets/plugins/select2/select2_metro.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->config->base_url();?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>  
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
	<script src="<?php echo $this->config->base_url();?>assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/scripts/app.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/scripts/index.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->base_url();?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->  
	<script>
		jQuery(document).ready(function() { 
			total();
		   App.init(); // initlayout and core plugins
		   Index.init();
		   Index.initCharts(); // init index page's custom scripts
		   Index.initMiniCharts();
		});
		function total(){
			//alert('<?php echo $encabezado['consumo_total']; ?>');
			$("#div_total_venta").html('<?php echo $encabezado['consumo_total']; ?>');
		}
	</script>
	<!-- END JAVASCRIPTS -->
    
    