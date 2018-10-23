                <div class="col-md-10 text-left"> 
<!-- Panel listado y gestion de estados tipo solicitud --> 
                <br>
                <br>
                <div id="panel-listaEstadosTipoSolicitud" class="panel panel-primary panel-table">
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
                            <form id="formCreaEstadosTipoSolicitud" name="formCreaEstadosTipoSolicitud" method="POST" action="" enctype="multipart/form-data" >
                                <div id="divNombreEstadoTipoSolicitud" class="form-group" >
                                    <label for="txtNombreEstadoTipoSolicitud" class="control-label ">Indique el nombre del estado *</label>
                                    <input type="text" id="txtNombreEstadoTipoSolicitud" name="txtNombreEstadoTipoSolicitud" class="form-control" maxlength="50" placeholder="Estado por tipo de solicitud"></input>
                                </div>                                        
                                <div id="divDescripcionEstadoTipoSolicitud" class="form-group" >
                                    <label for="txtDescripcionEstadoTipoSolicitud" class="control-label ">Descripción del estado por tipo de solicitud *</label>
                                    <textarea id="txtDescripcionEstadoTipoSolicitud" name="txtDescripcionEstadoTipoSolicitud" class="form-control" rows="2" maxlength="249" placeholder="Descripción del estado asociado al tipo de solicitud" data-toggle="tooltip" data-placement="bottom" title="Puede registrar información acerca del estado asociado al tipo de solicitud que va a registrar."></textarea>
                                </div>
                                <div class="row text-center well well-md" >  
                                    <div id="btnCrearEstadoTipoSolicitud" class="col-md-6 col-md-offset-3" >
                                        <input type="submit" id="btnCrearEstadoTipoSolicitud" name="btnCrearEstadoTipoSolicitud" class="btn btn-info" value="Crear estado tipo solicitud" >
                                    </div>                                            
                                </div>  
                            </form>                                  
                        </div>
                    <!-- Fin formulario de creación de solicitudes -->                    
                    </div>
                    <div class="panel-footer">                    
                    </div>
                </div>         
<!-- Fin Panel listado y gestion de estados tipo solicitud -->
                </div>          