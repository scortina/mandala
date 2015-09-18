
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box grey">
    <div class="portlet-body form">
        <form action="#" class="form-horizontal">
            <div class="form-body">
                <h3 class="form-section">Buscar Clientes</h3>
                <div class="row">
                    <div class="span6">
                        <div class="input-append">
                            <label>Cliente</label>
                            <input class="span4" id="txtClientes" placeholder="Clientes" type="text">
                            <button class="btn" type="button"><i class="icon icon-search"></i></button>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span6">
                        <div class="input-prepend input-append">
                            <label>Saldo Disponible</label>
                            <span class="add-on">$</span>
                            <input class="span4 uneditable-input" id="txtSaldo" placeholder="Saldo Disponible" type="text">
                            <span class="add-on">.00</span>
                        </div>
                    </div>
                <!--/span-->
              </div>
                <!--/row-->
            </div>
        </form>
    </div>  
</div>
<div class="portlet box grey">
    <div class="portlet-body form">
        <h3 class="form-section">Listado de Saldos del cliente</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align:center;">
                        <div class="floatL t5">
                            <input type="checkbox" class="select-all">
                        </div>
                    </th>
                    <th>Fecha</th>
                    <th class="hidden-xs">Lugar</th>
                    <th class="hidden-xs">Cliente</th>
                    <th>Pax</th>
                    <th>Importe</th>    
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>  
</div>

<div class="portlet box grey">
    <div class="portlet-body form">
        <h3 class="form-section">Formas de Pago</h3>
        <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li><a href="#tab1" data-toggle="tab">Efectivo</a></li>
                <li><a href="#tab2" data-toggle="tab">Dolares</a></li>
                <li class="active"><a href="#tab3" data-toggle="tab">Tarjeta C.</a></li>
                <li><a href="#tab4" data-toggle="tab">Canadience</a></li>
                <li><a href="#tab5" data-toggle="tab">Euro</a></li>
                <li><a href="#tab6" data-toggle="tab">Cupon</a></li>
                <li><a href="#tab7" data-toggle="tab">Transferencia</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="tab1">
                    <div class="row">
                        <div class="span1">
                           
                        </div>
                        <div class="span4">
                            <div class="control-group">
                                <label>Lugar</label>
                                <input class="input-block-level" id="txtLugar" placeholder="Lugar" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span3">
                            <div class="control-group">
                                <label>Fecha</label>
                                <input class="input-block-level" id="txtFecha" placeholder="Fecha" type="text">
                            </div>
                        </div> 
                        <div class="span3">
                            <div class="input-prepend input-append">
                                <label>Cantidad</label>
                                <span class="add-on">$</span>
                                <input class="input-block-level" id="txtCantidad" placeholder="Cantidad" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span1">
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab2">
                    <div class="row">
                        <div class="span1">
                           
                        </div>
                        <div class="span4">
                            <div class="control-group">
                                <label>Lugar</label>
                                <input class="input-block-level" id="txtLugar" placeholder="Lugar" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span3">
                            <div class="control-group">
                                <label>Fecha</label>
                                <input class="input-block-level" id="txtFecha" placeholder="Fecha" type="text">
                            </div>
                        </div> 
                        <div class="span3">
                            <div class="input-prepend input-append">
                                <label>Cantidad</label>
                                <span class="add-on">$</span>
                                <input class="input-block-level" id="txtCantidad" placeholder="Cantidad" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span1">
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="tab3">
                    <div class="row">
                        <div class="span1">
                           
                        </div>
                        <div class="span3">
                            <div class="control-group">
                                <label>Lugar</label>
                                <input class="input-block-level" id="txtLugar" placeholder="Lugar" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span3">
                            <div class="control-group">
                                <label>Fecha</label>
                                <input class="input-block-level" id="txtFecha" placeholder="Fecha" type="text">
                            </div>
                        </div> 
                        <div class="span3">
                            <div class="input-prepend input-append">
                                <label>Cantidad</label>
                                <span class="add-on">$</span>
                                <input class="input-block-level" id="txtCantidad" placeholder="Cantidad" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span1">
                            <div class="control-group">
                                <label style="visibility:hidden;">Cantidad</label>
                                <button class="btn" title="Agregar" type="button"><i class="icon icon-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span1">
                           
                        </div>
                        <div class="span10">
                           <table class="table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th class="hidden-xs">Lugar</th>
                                        <th>Fecha</th>
                                        <th>Cantidad</th>   
                                        <th style="text-align:center;">
                                            <div class="floatL t5">
                                                <input type="checkbox" class="select-all">
                                            </div>
                                        </th> 
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="span1">
                           
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab4">
                    <div class="row">
                        <div class="span1">
                           
                        </div>
                        <div class="span4">
                            <div class="control-group">
                                <label>Lugar</label>
                                <input class="input-block-level" id="txtLugar" placeholder="Lugar" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span3">
                            <div class="control-group">
                                <label>Fecha</label>
                                <input class="input-block-level" id="txtFecha" placeholder="Fecha" type="text">
                            </div>
                        </div> 
                        <div class="span3">
                            <div class="input-prepend input-append">
                                <label>Cantidad</label>
                                <span class="add-on">$</span>
                                <input class="input-block-level" id="txtCantidad" placeholder="Cantidad" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span1">
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab5">
                    <div class="row">
                        <div class="span1">
                           
                        </div>
                        <div class="span4">
                            <div class="control-group">
                                <label>Lugar</label>
                                <input class="input-block-level" id="txtLugar" placeholder="Lugar" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span3">
                            <div class="control-group">
                                <label>Fecha</label>
                                <input class="input-block-level" id="txtFecha" placeholder="Fecha" type="text">
                            </div>
                        </div> 
                        <div class="span3">
                            <div class="input-prepend input-append">
                                <label>Cantidad</label>
                                <span class="add-on">$</span>
                                <input class="input-block-level" id="txtCantidad" placeholder="Cantidad" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span1">
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab6">
                    <div class="row">
                        <div class="span1">
                           
                        </div>
                        <div class="span4">
                            <div class="control-group">
                                <label>Lugar</label>
                                <input class="input-block-level" id="txtLugar" placeholder="Lugar" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span3">
                            <div class="control-group">
                                <label>Fecha</label>
                                <input class="input-block-level" id="txtFecha" placeholder="Fecha" type="text">
                            </div>
                        </div> 
                        <div class="span3">
                            <div class="input-prepend input-append">
                                <label>Cantidad</label>
                                <span class="add-on">$</span>
                                <input class="input-block-level" id="txtCantidad" placeholder="Cantidad" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span1">
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab7">
                    <div class="row">
                        <div class="span1">
                           
                        </div>
                        <div class="span4">
                            <div class="control-group">
                                <label>Lugar</label>
                                <input class="input-block-level" id="txtLugar" placeholder="Lugar" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span3">
                            <div class="control-group">
                                <label>Fecha</label>
                                <input class="input-block-level" id="txtFecha" placeholder="Fecha" type="text">
                            </div>
                        </div> 
                        <div class="span3">
                            <div class="input-prepend input-append">
                                <label>Cantidad</label>
                                <span class="add-on">$</span>
                                <input class="input-block-level" id="txtCantidad" placeholder="Cantidad" type="text">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span1">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="span10">
                <div class="control-group">
                    <label style="">Observaciones</label>
                    <textarea class="input-block-level" id="observaciones" rows="1"></textarea>
                </div>

            </div>
            <div class="span2">
                <label style="visibility:hidden;">Cantidad</label>
                <button class="btn input-block-level btn-large" title="Guardar" type="button">Pagar</button>           
            </div>
        </div>

    </div>  
</div>

    
 