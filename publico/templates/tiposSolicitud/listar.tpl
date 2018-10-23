                <div class="col-md-10 text-left"> 
<!-- Panel listado y gestion de motivos tipo solicitud --> 
                <br><br>
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
                            <div id="divTblMotivosTiposSolicitud" class="form-group">
                                <div class="table-responsive">                                                        
                                    <table class="tablesorter text-center" id="tblGestionSolicitudes" name="tblGestionSolicitudes" class="tablesorter text-center tablesorter-metro-dark ">                             
                                        <thead id="hTblMotivosTipoSolicitud" >
                                            <tr class="tablesorter-headerRow" role="row">
                                                <th class="tablesorter-header"> Identificador </th>
                                                <th class="tablesorter-header"> Nombre </th>
                                                <th class="tablesorter-header"> Descripción </th>
                                                <th class="tablesorter-header"> Acción </th>
                                            </tr>
                                        </thead>
                                        <tbody id="bTblMotivosTipoSolicitud">                                   
                                        <!--{foreach from=$resultado item=motivosTipoSolicitud}-->                        
                                            <tr role="row">
                                                <td><!--{$motivosTipoSolicitud.sol_motivotsolicitud_id}--></td>
                                                <td><!--{$motivosTipoSolicitud.sol_motivotsolicitud_nombre}--></td>
                                                <td><!--{$motivosTipoSolicitud.sol_motivotsolicitud_descripcion}--></td>
                                                <td>                                                                                   
                                                    <a href="<!--{$modificar}-->'<!--{$motivosTipoSolicitud.sol_motivotsolicitud_id}-->'" class="btn btn-info btn-sm"> Modificar </a>                                            
                                                    <a href="<!--{$ver}-->'<!--{$motivosTipoSolicitud.sol_motivotsolicitud_id}-->'" class="btn btn-info btn-sm"> Ver </a>     
                                                    <a href="<!--{$eliminar}-->'<!--{$motivosTipoSolicitud.sol_motivotsolicitud_id}-->'" class="btn btn-info btn-sm"> Eliminar </a>
                                                </td>                                        
                                            </tr>                                
                                        <!--{/foreach}--> 
                                        </tbody>
                                    </table>                                                         
                                </div>
                            </div>                    
                        </div>
                        <div class="panel-footer">
                            <div class="row">                                                
                                <div class="pager"> 
                                    <img src="<!--{$AUX_JS}-->jQuery-tableSorter_v2.28/addons/pager/icons/first.png" class="first"/> 
                                    <img src="<!--{$AUX_JS}-->jQuery-tableSorter_v2.28/addons/pager/icons/prev.png" class="prev"/> 
                                    <span class="pagedisplay"> </span>
                                    <img src="<!--{$AUX_JS}-->jQuery-tableSorter_v2.28/addons/pager/icons/next.png" class="next"/> 
                                    <img src="<!--{$AUX_JS}-->jQuery-tableSorter_v2.28/addons/pager/icons/last.png" class="last"/>                                 
                                    <select class="pagesize" title="Select page size"> 
                                        <option selected="selected" value="10">10</option> 
                                        <option value="20">20</option> 
                                        <option value="30">30</option> 
                                        <option value="40">40</option> 
                                    </select>
                                    <select class="gotoPage" title="Select page number"></select>
                                </div>
                            </div>
                        </div>
                    </div>                   
<!-- Fin Panel listado y gestion de motivos tipo solicitud -->
                </div>       