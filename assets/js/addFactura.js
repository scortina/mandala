var estado = false;
var i = 0;
var subtotal = 0;
var iva = 0;
var total = 0;
var productos = [];

$(function(){

	$('#txtFecha').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true
	});
});

/*window.onload = function(){
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
		
	});
};*/

function cargarclientes(valorSeleccionado){
	//alert("Hola " + valorSeleccionado.value);
	$.ajax({
		url     :  "getDatosClientes",
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
			url     : "guardarFactura",
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