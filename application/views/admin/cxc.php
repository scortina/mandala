	<link href="<?php echo $this->config->base_url();?>assets/plugins/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->config->base_url();?>assets/plugins/select2/select2_metro.css" rel="stylesheet" type="text/css" />

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
    
	<script src="<?php echo $this->config->base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo $this->config->base_url();?>assets/plugins/select2/select2.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->config->base_url();?>assets/plugins/data-tables/jquery.dataTables.min.js" type="text/javascript" ></script>
    <script src="<?php echo $this->config->base_url();?>assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
    <script src="<?php echo $this->config->base_url();?>assets/scripts/custom/table-advanced.js" type="text/javascript" ></script>
    <!-- END PAGE LEVEL PLUGINS -->

	<script src="<?php echo $this->config->base_url();?>assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/scripts/app.js" type="text/javascript"></script>
	<script src="<?php echo $this->config->base_url();?>assets/scripts/index.js" type="text/javascript"></script></script>
	<!-- END PAGE LEVEL SCRIPTS -->  
	<script>
		jQuery(document).ready(function() {
		   App.init();
		   Index.init();
		   Index.initDashboardDaterange();
		   TableAdvanced.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->