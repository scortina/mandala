<div id="dashboard">
	<!-- DASHBOARD -->
	<div class="row-fluid">
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="icon-truck"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?php echo "$ ".$monto; ?>
                    </div>
                </div>
                <a class="more" href="#">CONSUMO</a>                 
            </div>
        </div>
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="icon-truck"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?php echo $rendimiento." Km/Lt";?>
                    </div>
                </div>
                <a class="more" href="#">RENDIMIENTO</a>
            </div>
        </div>
	</div>
    <!-- UNIDADES -->
    <div class="clearfix"></div>
    <!-- INICIO TABLA-->
    <div class="portlet box grey">
        <div class="portlet-title">
            <div class="caption"><i class="icon-tint"></i>
            <?php
				if($tipo == "unidades"){
					echo 'Consumo Unidades';
				} else if($tipo == "unidad"){
					echo 'Consumo de unidad: '.$nombre_unidad;
				}?>
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"></a>
            </div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                		<?php
						if($tipo == "unidades"){
							echo '
								<tr>
									<th>NOMBRE DE VEHICULO</th>
									<th>CONSUMO</th>
									<th>RENDIMIENTO</th>
								</tr>';
						} else if($tipo == "unidad"){
							echo '
								<tr>
									<th>FECHA</th>
									<th>CONSUMO</th>
									<th>RENDIMIENTO</th>
								</tr>';
						}?>
                </thead>
                <tbody>
                    <tr>
                    <?php
					if($consumo_unidades != ""){
                    foreach ($consumo_unidades as $consumo) {
						echo '
						<tr>
                        <td>'.$consumo['campo1'].'</td>
                        <td>$ '.$consumo['consumo'].'</td>
                        <td>'.$consumo['rendimiento'].' Km/Lt</td>
						</tr>';
						}
					} else {
						echo '
                        <td colspan="3">Sin datos por el momento</td>';
					}
					?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- FINAL TABLA-->
</div>