<body class="page-header-fixed">
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				</a>
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="<?php echo $this->config->base_url();?>assets/img/menu-toggler.png" alt="" />
				</a>           
				<ul class="nav pull-right">
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" width="29px" height="29px" src="<?php echo $this->config->base_url()."assets/uploads/users/".$this->session->userdata('user_img'); ?>" />
						<span class="username">
						<?php		
						if($this->session->userdata('is_logged_in')){
							echo $this->session->userdata('user_nombre');		
						}
						?>
						</span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo site_url('user/configuracion/edit/'.$this->session->userdata('user_id'))?>"><i class="icon-cog"></i> Configuración</a></li>
                         <li><a href="<?php echo site_url('user/logout')?>"><i class="icon-off"></i> Salir</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
    
	<div class="page-container">
		<div class="page-sidebar nav-collapse collapse">
			<div class="logo">
				<img src="<?php echo $this->config->base_url();?>assets/img/logo.png" alt="" /> 
			</div>			
			<ul class="page-sidebar-menu">
				<li>
					<div class="sidebar-toggler hidden-phone"></div>
				</li>
              <li class="tooltips" data-placement="right" data-original-title="Dashboard">
					<a href="<?php echo site_url('user/dashboard') ?>">
                    <i class="icon-home"></i>
                    <span class="title"> Dashboard </span>
                    </a>
              </li>
              
              <li>
            	 <a href="<?php echo site_url('cxc/pendientes') ?>">
                <i class="icon-pushpin"></i>
                <span class="title"> Pendientes CXC </span>
                </a>
            	</li>
                
              <li>
            	 <a href="javascript:;">
                <i class="icon-file"></i>
                <span class="title"> CXC </span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo site_url('cxc/facturas') ?>">
                        <i class="icon-list"></i> Facturas</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('cxc/efectivo') ?>">
                        <i class="icon-list"></i> Efectivo </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('cxc/grupo') ?>">
                        <i class="icon-list"></i> Grupo </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('cxc/todo') ?>">
                        <i class="icon-list"></i> Ver Todo </a>
                    </li>
                 </ul>
            	</li>
             
              <li class="tooltips" data-placement="right" data-original-title="">
					<a href="<?php echo site_url('clientes/consultar') ?>">
					<i class="icon-rocket"></i>
					<span class="title"> Clientes </span>
					</a>
              </li>
			  <li>
            	 <a href="javascript:;">
                <i class="icon-hdd"></i>
                <span class="title"> Facturas </span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo site_url('facturas/consultar') ?>">
                        <i class="icon-list"></i> Consultar </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('facturas/capturar') ?>">
                        <i class="icon-paper-clip"></i> Capturar </a>
                    </li>
                 </ul>
            </li>
            
            <li>
                <a href="<?php echo site_url('productos/index') ?>">
                <i class="icon-star"></i>
                <span class="title"> Productos </span>
                </span>
                </a>
            </li>
            
            <li>
            	 <a href="<?php echo site_url('dolar/consultar') ?>">
                <i class="icon-money"></i>
                <span class="title"> Precio Dolar </span>
                </a>
            </li>
            
            <li>
                <a href="javascript:;">
                <i class="icon-bar-chart"></i>
                <span class="title"> Reportes </span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo site_url('reportes/clientes') ?>">
                        <i class="icon-bar-chart"></i> CXC del Día </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('reportes/pagos') ?>">
                        <i class="icon-bar-chart"></i> Pagos </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('reportes/historico') ?>">
                        <i class="icon-bar-chart"></i> Historico </a>
                    </li>
                </ul>
            </li>
            
            
            <li>
            	 <a href="javascript:;">
                <i class=" icon-cog"></i>
                <span class="title"> Configuración </span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo site_url('configuracion/usuarios') ?>">
                        <i class="icon-file"></i> Usuarios </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('configuracion/niveles') ?>">
                        <i class="icon-file"></i> Niveles </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('configuracion/operadoras') ?>">
                        <i class="icon-file"></i> Operadoras </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('configuracion/sucursales') ?>">
                        <i class="icon-file"></i> Sucursales </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('configuracion/tipos_pago') ?>">
                        <i class="icon-file"></i> Tipos de Pago </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('configuracion/formas_pago') ?>">
                        <i class="icon-file"></i> Formas de Pago </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('configuracion/tipos_moneda') ?>">
                        <i class="icon-file"></i> Tipos de Moneda </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('configuracion/estatus_pago') ?>">
                        <i class="icon-file"></i> Estatus de Pago </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('configuracion/estados_mexico') ?>">
                        <i class="icon-file"></i> Estados de México </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('configuracion/paises') ?>">
                        <i class="icon-file"></i> Paises </a>
                    </li>
                     <li>
                        <a href="<?php echo site_url('configuracion/trazabilidad') ?>">
                        <i class="icon-file"></i> Trazabilidad </a>
                    </li>
                 </ul>
            </li>
            
            <li>
                <a href="<?php echo site_url('notificaciones/index') ?>">
                <i class=" icon-bell"></i>
                <span class="title"> Notificaciones </span>
                </span>
                </a>
            </li>

            <script>
				var a=document.getElementsByTagName("a");
				for(var i=0;i<a.length;i++){
					a[i].onclick=function(){
						window.location=this.getAttribute("href");
						return false
					}
				}
			</script>
		</div>
		<div class="page-content">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<h3 class="page-title"></h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#"><?php echo $titulo;?></a></li>
                         <?php if ($calendario == true){
							 echo '
							<li class="pull-center no-text-shadow"></li>
								<li class="pull-right no-text-shadow">
								<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Cambie el rango de fecha">
									<i class="icon-calendar"></i>
									<span></span>
									<i class="icon-angle-down"></i>
								</div>
							</li>';}?>
						</ul>
					</div>
				</div>