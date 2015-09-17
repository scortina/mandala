<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-Mx" lang="es-Mx" />
<head>
	<meta charset="utf-8" />
	<title>Mandala</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png" />
 
	<!-- BEGIN GLOBAL MANDATORY STYLES -->        
	<link href="<?php echo $this->config->base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $this->config->base_url();?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $this->config->base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $this->config->base_url();?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $this->config->base_url();?>assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $this->config->base_url();?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $this->config->base_url();?>assets/css/themes/grey.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo $this->config->base_url();?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
	<link href="<?php echo $this->config->base_url();?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $this->config->base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->config->base_url();?>assets/plugins/data-tables/DT_bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS -->
	<?php 
		if(isset($css_files))
		{
		foreach($css_files as $file): 
	?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php 
		endforeach; 
		}
	?>
	<?php 
		if(isset($js_files))
		{
		foreach($js_files as $file): 
	?>
		<script src="<?php echo $file; ?>"></script>
	<?php 
		endforeach; 
		}
	?>

</head>