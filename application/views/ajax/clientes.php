<div class="span1"></div>
<div class="span8">
	<h3>datos del cliente</h3>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Razon Social</th>
				<th>RFC</th>
				<th>Dirección</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($clientes as $fila) {
					echo "<tr>
						<td>".$fila->nombre."</td>
						<td>".$fila->razon_social."</td>
						<td>".$fila->rfc."</td>
						<td>".$fila->calle."</td>
					</tr>";
				} ?>
		<tbody>
	</table>
</div>
<div class="span2"></div>