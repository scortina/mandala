				<div class="row">
					<div class="span1"></div>
					<div class="span4">
						<div class="form-group">
							<label for="cmbClientes">Cliente</label>
							<select class="form-control" id="cmbClientes"  onchange="javascript:cargarclientes(this);">
								<option value=0>Seleccione</option>
								<?php 
									foreach ($clientes as $fila) {
										echo "<option value=".$fila->row_id.">".$fila->nombre."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="span4">
						<div class="form-group">
							<label for="txtFecha">Fecha</label>
							<input id="txtFecha" class="datepicker-input hasDatepicker" type="text" maxlength="10" value="" placeholder="Fecha" />
						</div>
					</div>
					<div class="span2"></div>
				</div>
				<div class="row" id="mostrarDatosClientes">
					
				</div>
				<div class="row">
					<div class="span1"></div>
					<div class="span4">
						<div class="form-group">
							<label for="cmbClientes">Nota Credito</label>
							<input type="text" id="credito" class="form-control" placeholder="Nota Credito"> 
						</div>
					</div>
					<div class="span4">
						<div class="form-group">
							<label for="cmbClientes">Moneda de pago</label>
							<select id="cmbmoneda">
								<option  value="0">Seleccione</option>
								<?php 
									foreach ($moneda as $file) {
										echo "<option value=".$file->row_id."  >".$file->descripcion."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="span2"></div>
				</div>
				<hr>
				<div class="row">
					<div class="span1"></div>
					
					<div class="span3">
						<div class="form-group">
							<label for="cmbProducto">Producto</label>
							<select id="cmbProducto">
								<option  value="0">Seleccione</option>
								<?php 
									foreach ($productos as $file) {
										echo "<option value=".$file->row_id." product='".$file->descripcion."' prexio= '".$file->precio."' >".$file->descripcion."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="span1" style="text-align:center;">
						<div class="form-group">
							<label for="txtCantidad">Cantidad</label>
							<input type="text" class="form-control span1" id="txtCantidad" placeholder="Cantidad"/>
						</div>
					</div>

					<div class="span3" style="text-align:right;">
						<div class="form-group">
							<label for="cmbSucursal">Sucursal</label>
							<select id="cmbSucursal">
								<option>Seleccione</option>
								<?php 
									foreach ($sucursales as $filx) {
										echo "<option value=".$filx->row_id.">".$filx->marca."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="span1">
						<div class="form-group" style="text-align:right;">
							<label for="cmbSucursal" style="visibility: hidden;">Label</label>
							<a href="javascript:void(0);" onClick="javascript:agregarProd();" class="add_button ui-button ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
								<span class="ui-button-icon-primary ui-icon ui-icon-circle-plus"></span>
								<span class="ui-button-text">&nbsp;&nbsp;&nbsp;Agregar</span>
							</a>
						</div>
					</div>
					<div class="span2"></div>
				</div>
				<div class="row">
					<div class="span1"></div>
					<div class="span8">
						<h3>datos de la compra</h3>
						<table id="otertable" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th></th>
									<th>Cantidad</th>
									<th>Producto</th>
									<th>Sucursal</th>
									<th>Precio</th>
									<th>Subtotal</th>
								</tr>
							</thead>
							<tbody id="primero">
								</td>
								</tr>
							<tbody>
						</table>
					</div>
					<div class="span2"></div>
				</div>
				<div class="row">
					<div class="span2"></div>
					<div class="span6"></div>
					<div class="span2" >
						<table width:"100%" border="0">
							<tr>
								<td style="text-align:right;" width="50%">SUBTOTAL : </td>
								<td  width="5%">&nbsp;</td>
								<td  width="45%" id="subtotal"></td>
							</tr>
							<tr>
								<td style="text-align:right;"  width="50%">IVA : </td>
								<td  width="5%">&nbsp;</td>
								<td  width="45%" id="iva"></td>
							</tr>
							<tr>
								<td  width="50%" style="text-align:right;">TOTAL : </td>
								<td  width="5%" >&nbsp;</td>
								<td  width="45%" id="total"></td>
							</tr>
						</table>
					</div>
					<div class="span2"></div>
				</div>
				<hr>
				<div class="row">
					<div class="span2"></div>
					<div class="span6"></div>
					<div class="span2" >
						<a href="javascript:void(0);" onclick="guardarFactura(cmbClientes);" class="add_button ui-button ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
							<span class="ui-button-icon-primary ui-icon ui-icon-document"></span>
							<span class="ui-button-text">&nbsp;&nbsp;&nbsp;Guardar Factura </span>
						</a>
					</div>
					<div class="span2"></div>
				</div>
				<div style="display:none;">
					<?php echo $output; ?>
				</div>
            </div>
        </div>
    </div>
</div>

<link href="<?php echo $this->config->base_url();?>assets/css/jsDatePick_ltr.min.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="<?php echo $this->config->base_url();?>assets/scripts/jsDatePick.min.1.3.js" type="text/javascript"></script> 
<script type="text/javascript">
	var estado = false;
	var i = 0;
	var subtotal = 0;
	var iva = 0;
	var total = 0;
	var productos = [];
	/*jQuery(document).ready(function() {
		$("#txtFecha").datepicker({
            format: 'mm/dd/yyyy'	
        });
		var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var f = new Date();
        $("#txtFecha").val(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
	});*/

	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"txtFecha",
			dateFormat:"%Y-%m-%d",
			yearsRange:[1990,2020],
			limitToToday:false,
			cellColorScheme:"armygreen",
			weekStartDay:1
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			*/
		});
	};

	function cargarclientes(valorSeleccionado){
		//alert("Hola " + valorSeleccionado.value);
		$.ajax({
			url     :  "<?php  echo $this->config->base_url(); ?>facturas/getDatosClientes",
			type    :  "POST",
			data    : {cliente: valorSeleccionado.value},
			success : function(data){
				$("#mostrarDatosClientes").html(data);
			}

		});
	}

	function agregarProd(){
		var producto = $("#cmbProducto option:selected").attr('product');
		var precio   = $("#cmbProducto option:selected").attr('prexio');
		var cantidad = $("#txtCantidad").val();
		var sucursal = $("#cmbSucursal option:selected").html();
		var moneda = document.getElementById("cmbmoneda").value;

		if(producto.length < 1){
			alert("Es necesario elegir un producto");
		}else if(cantidad.length < 1){
			alert("Es necesario digitar la cantidad");
		}else if(sucursal.length < 1){
			alert("Es necesario Elegir una sucursal");
		}else{

			var td = "<tr id='"+i+"'>" +
						"<td style='text-align: center;'>"+
							"<a onClick='javascript:dleteRow("+i+");' title='Eliminar' role='button' class='delete_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary' href='javascript:void(0)'>"+
							"   <span class='ui-button-icon-primary ui-icon ui-icon-circle-minus'></span>"+ 
							" 	<span class='ui-button-text'>&nbsp;</span>" +
							"</a>" + 
						"</td>" +
						"<td>"+cantidad+"</td>"+
						"<td>"+producto+"</td>"+
						"<td>"+sucursal+"</td>"+
						"<td>"+precio+"</td>"+
						"<td>"+(precio * cantidad)+"</td>"+
					"</tr>";
		    
			/*productos[i][0] = $("#cmbProducto").val();
			productos[i][1] = cantidad;
			productos[i][2] = $("#cmbSucursal").val();
			productos[i][3] = precio;
			productos[i][4] = moneda;
			productos[i][5] = (precio * cantidad);*/


				
			
			
			subtotal = subtotal + (precio * cantidad);
			$("#subtotal").html(subtotal);

			iva = (subtotal * 0.16);
			$("#iva").html(iva);

			total = (subtotal + iva);
			$("#total").html(total);
			$("#cmbProducto").val('0');
			$("#txtCantidad").val('');
			

			var items = new Array($("#cmbProducto").val(),  cantidad, $("#cmbSucursal").val(),  precio, iva , (precio * cantidad));
			productos[i] = items;

			var id =(i-1);
			i = i+1;	
			if(!estado){
				$("#primero").html(td);
				estado = true;
			}else{
				$("#"+id).closest( "tr" ).after(td);
			}
			//$("#primero").closest( "tr" ).after(data.resultado);
		}
	}

	function guardarFactura(valorcliente){
		var moneda = document.getElementById("cmbmoneda").value;

		if(valorcliente.value == 0){
			alert("Por favor seleccione un cliente");
		}else if(subtotal == 0){
			alert("Pos favor ingresa algun Producto");
		}else if(moneda.length < 1){
			alert("Pos favor ingresa algun Producto");
		}else{
			var fecha = document.getElementById("txtFecha").value;
			var nota = document.getElementById("credito").value;
			$.ajax({
				url     : "<?php  echo $this->config->base_url(); ?>facturas/guardarFactura",
				type    : "POST",
				dataType: "json",
				data    : {cliente: valorcliente.value  , 
							fecha:  fecha , 
							subtotal: subtotal , 
							total: total , iva:  iva, 
							moneda:  moneda, 
							nota: nota ,
							productos: productos,
							longitud: productos.length },
				success : function(data){
					if(data.success == 1){
						alert("Registrada la factura");
						location.reload();
					}
				}
			});
		}
	}

	function dleteRow(id){

		subtotal = subtotal - productos[id][5];
		$("#subtotal").html(subtotal);

		iva = (subtotal * 0.16);
		$("#iva").html(iva);

		total = (subtotal + iva);
		$("#total").html(total);

	 	productos.splice(id, 1);

		$("#"+id).hide();

	}
</script>