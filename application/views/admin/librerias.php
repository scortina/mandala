
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo $this->config->base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/excanvas.min.js"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	 
	<script src="<?php echo $this->config->base_url();?>assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/bootstrap-daterangepicker/date.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>     
	<script src="<?php echo $this->config->base_url();?>assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/jQuery-Currency-master/jquery.currency.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
	
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo $this->config->base_url();?>assets/scripts/app.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/scripts/index.js" type="text/javascript"></script>  
	<script src="<?php echo $this->config->base_url();?>assets/scripts/joseFactura.js" type="text/javascript"></script> 
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	
	<!-- END PAGE LEVEL SCRIPTS -->  
	<script>
		jQuery(document).ready(function() {
		   App.init();
		   Index.init();
	   		$(".fechascampos").datepicker({
	            dateFormat: "dd/mm/yy",
	            defaultDate: "+0w",
	            changeMonth: true,
	            changeYear: true,
	            
	        });
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>