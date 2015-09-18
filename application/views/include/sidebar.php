<!-- BEGIN SIDEBAR -->
<br><br>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
        <br>
             <li class="sidebar-toggler-wrapper">
                <div class="sidebar-toggler"></div>
            </li>
            <br>
            <li class="start active ">
                <a href="<?php echo site_url('user/dashboard') ?>">
                <i class="icon-home"></i>
                <span class="title"> Dashboard </span>
                <span class="selected"></span>
                </a>
            </li>
            
            <li>
            	 <a href="javascript:;">
                <i class="icon-rocket"></i>
                <span class="title"> Clientes </span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo site_url('clientes/ver') ?>">
                        <i class="icon-list"></i> Ver </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('clientes/saldos') ?>">
                        <i class="icon-calculator"></i> Saldos </a>
                    </li>
                 </ul>
            </li>
            
            <li>
                <a href="<?php echo site_url('notificaciones/ver') ?>">
                <i class=" icon-bell"></i>
                <span class="title"> Notificaciones </span>
                </span>
                </a>
            </li>
            
            <li>
                <a href="<?php echo site_url('productos/index') ?>">
                <i class="icon-star"></i>
                <span class="title"> Productos </span>
                </span>
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
                        <i class="icon-graph"></i> Clientes</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('reportes/pagos') ?>">
                        <i class="icon-graph"></i> Pagos</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('reportes/saldos') ?>">
                        <i class="icon-graph"></i> Saldos</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('reportes/productos') ?>">
                        <i class="icon-graph"></i> Productos</a>
                    </li>
                </ul>
            </li>
            
            <li>
            	 <a href="javascript:;">
                <i class="icon-settings"></i>
                <span class="title"> Configuración </span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo site_url('configuracion/usuarios') ?>">
                        <i class="icon-list"></i> Usuarios </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('configuracion/niveles') ?>">
                        <i class="icon-equalizer"></i> Niveles </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('configuracion/trazabilidad') ?>">
                        <i class="icon-target"></i> Trazabilidad </a>
                    </li>
                 </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->
