                <div class="col-md-10 text-left"> 
<!-- Panel listado y gestion de TiposDocumentos tipo solicitud --> 
                <br>
                <br>
                <div id="panel-listaTiposDocumento" class="panel panel-primary panel-table">
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
                        <div class="well">                                
                            <form id="formCreaTiposDocumento" name="formCreaTiposDocumento" method="POST" action="" enctype="multipart/form-data" >
                                <div id="divIdTipoDocumento" class="form-group" >
                                    <label for="nbrIdTipoDocumento" class="control-label ">Identificador del tipo de documento</label>
                                    <input type="number" id="nbrIdTipoDocumento" name="nbrIdTipoDocumento" class="form-control" readonly="" value="<!--{$resultado.sol_tipodocumento_id}-->"></input>
                                </div>                                        
                                <div id="divNombreTipoDocumento" class="form-group" >
                                    <label for="txtNombreTipoDocumento" class="control-label ">Indique el nombre del tipo de documento *</label>
                                    <input type="text" id="txtNombreTipoDocumento" name="txtNombreTipoDocumento" class="form-control" maxlength="50" placeholder="Tipo de documento" value="<!--{$resultado.sol_tipodocumento_nombre}-->" readonly=""></input>
                                </div>                                             
                                <div id="divDescripcionTipoDocumento" class="form-group" >
                                    <label for="txtDescripcionTipoDocumento" class="control-label ">Descripci�n del tipo de documento *</label>
                                    <textarea id="txtDescripcionTipoDocumento" name="txtDescripcionTipoDocumento" class="form-control" rows="2" maxlength="249" readonly="" placeholder="Descripci�n del TiposDocumento asociado al tipo de solicitud" data-toggle="tooltip" data-placement="bottom" title="Puede registrar informaci�n acerca del Tipo de Documento." >
<!--{$resultado.sol_tipodocumento_descripcion}-->
                                    </textarea>
                                </div>
                                <div class="row text-center well well-md" >  
                                    <div id="divAbtnPnlLSRegresar" class="col-md-6 col-md-offset-3" >                               
                                        <a href="<!--{$listar}-->" id="abtnPnlLSRegresar" class="btn btn-info text-center" role="button">Regresar</a> 
                                    </div>                                            
                                </div>  
                            </form>                                  
                        </div>
                    <!-- Fin formulario de creación de solicitudes -->                    
                    </div>
                    <div class="panel-footer">                    
                    </div>
                </div>         
<!-- Fin Panel listado y gestion de TiposDocumentos tipo solicitud -->
                </div>           