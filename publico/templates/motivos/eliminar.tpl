                <div class="col-md-10 text-left"> 
<!-- Panel listado y gestion de motivos tipo solicitud --> 
                <br>
                <br>
                <div id="panel-listaMotivosTipoSolicitud" class="panel panel-primary panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-md-5 panel-title">
                                <h3 class="text-center pull-left" style="margin-top: 10px;"> 
                                    <span class="glyphicon glyphicon-list-alt"> </span> <!--{$subTitulo}-->
                                </h3>                    
                            </div>                                               
                            <div class="col col-md-7 panel-title btn-toolbar">                  
                                <a href="<!--{$listar}-->" id="abtnPnlLSRecargar" class="btn btn-info btn-lg text-center pull-right" role="button">
                                    <span class="glyphicon glyphicon-refresh"> </span> Listar
                                </a>
                                <a href="<!--{$crear}-->" id="abtnPnlLSCrear" class="btn btn-info btn-lg text-center pull-right" role="button">
                                    <span class="glyphicon glyphicon-pencil"> </span>  Crear
                                </a>    
                                <a href="<!--{$buscar}-->" id="abtnPnlLSBuscar" class="btn btn-info btn-lg text-center pull-right" role="button">
                                    <span class="glyphicon glyphicon-search"> </span>  Buscar
                                </a>                            
                            </div>                                            
                        </div>
                    </div>
                    <div class="panel-body">          
                        <!-- Formulario de creación de solicitudes -->                    
                        <form id="formCreaMotivosTipoSolicitud" name="formCreaMotivosTipoSolicitud" method="POST" action="" enctype="multipart/form-data" >
                            <div id="divIdMotivoTipoSolicitud" class="form-group" >
                                <label for="nbrIdMotivoTipoSolicitud" class="control-label ">Identificador de motivo</label>
                                <input type="number" id="nbrIdMotivoTipoSolicitud" name="nbrIdMotivoTipoSolicitud" class="form-control" readonly="" value="<!--{$resultado.sol_motivotsolicitud_id}-->"></input>
                            </div>                                        
                            <div id="divNombreMotivoTipoSolicitud" class="form-group" >
                                <label for="txtNombreMotivoTipoSolicitud" class="control-label ">Indique el nombre del motivo *</label>
                                <input type="text" id="txtNombreMotivoTipoSolicitud" name="txtNombreMotivoTipoSolicitud" class="form-control" maxlength="50" readonly="" placeholder="Motivo por tipo de solicitud" value="<!--{$resultado.sol_motivotsolicitud_nombre}-->"></input>
                            </div>                                             
                            <div id="divDescripcionMotivoTipoSolicitud" class="form-group" >
                                <label for="txtDescripcionMotivoTipoSolicitud" class="control-label ">Descripción del motivo por tipo de solicitud *</label>
                                <textarea id="txtDescripcionMotivoTipoSolicitud" name="txtDescripcionMotivoTipoSolicitud" class="form-control" rows="2" maxlength="249" readonly="" placeholder="Descripción del motivo asociado al tipo de solicitud" data-toggle="tooltip" data-placement="bottom" title="Puede registrar información acerca del motivo asociado al tipo de solicitud que va a registrar." >
<!--{$resultado.sol_motivotsolicitud_descripcion}-->
                                </textarea>
                            </div>
                            <div class="row text-center well well-md" >                                  
                                <div id="divBtnEliminarMotivoTipoSolicitud" class="col-md-6" >
                                    <input type="submit" id="btnEliminarMotivoTipoSolicitud" name="btnEliminarMotivoTipoSolicitud" class="btn btn-info" value="Eliminar motivo tipo solicitud" >
                                </div> 
                                <div id="divAbtnPnlLSRegresar" class="col-md-6" >                               
                                    <a href="<!--{$listar}-->" id="abtnPnlLSRegresar" class="btn btn-info" role="button">Regresar</a> 
                                </div>                                            
                            </div>  
                        </form>           
                        <!-- Fin formulario de creación de solicitudes -->                    
                    </div>
                    <div class="panel-footer">                    
                    </div>
                </div>         
<!-- Fin Panel listado y gestion de motivos tipo solicitud -->
                </div>          