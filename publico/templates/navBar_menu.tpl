      
<!-- Barra de navegación -->         
        <nav id="navBarGS" class="navbar navbar-inverse navbar-fixed-top">
            <div class="container container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar" aria-expanded="false" aria-controls="navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand navbar-brand-GS" href="https://www.udistrital.edu.co">
                        <!--<img class="modal-content img-responsive" src="<!--{$logoMD}-->" alt="LogoMD" />-->
                    </a>                    
                </div>
                <div class="collapse navbar-collapse" id="navBar">                                                      
                    <ul class="nav navbar-nav">                        
                        <p class="navbar-text ">Usuario: <strong><!--{$nombreUsuario}--></strong></p>
                        <p class="navbar-text ">Identificaci�n: <strong><!--{$documentoUsuario}--></strong></p>                              
                    </ul>
                    <ul class="nav navbar-nav navbar-right">                                                
                        <!--<li><a href="javascript:history.back()"><span class="glyphicon glyphicon-user"></span> Regresar </a></li>-->
                        <!--<li><a href="<!{$inicio}>"><span class="glyphicon glyphicon-user"></span> Regresar </a></li>-->
                        <li><a href="<!--{$salir}-->"><span class="glyphicon glyphicon-log-out "></span> Salir </a></li>
                    </ul>
                </div>
            </div>
        </nav>                           
<!-- Fin Barra de navegación -->   
<!-- Menú Laterál -->
        <div class="container-fluid text-center">    
            <div class="row content">
                <div class="col-md-2 sidenav">            
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <span class="glyphicon glyphicon-th"></span>Administración
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-pencil"></span>
                                                <a href="<!--{$tiposDocumento}-->">Tipos de documento</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-pencil"></span>
                                                <a href="<!--{$estados}-->">Estados para Tipos de solicitud</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-pencil"></span>
                                                <a href="<!--{$motivos}-->">Motivos para Tipos de solicitud</a>
                                            </td>
                                        </tr>                                
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-pencil"></span>
                                                <a href="<!--{$tiposSolicitud}-->">Tipos de solicitud</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>                
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        <span class="glyphicon glyphicon-user"></span>Cuenta
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">                            
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-cog"></span>
                                                <a href="#">Cambiar Contraseña</a>
                                            </td>
                                        </tr>                                
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-log-out text-danger"></span>
                                                <a href="#" class="text-danger">Cerrar Sesion</a>
                                            </td>
                                        </tr>
                                    </table>                            
                                </div>
                            </div>
                        </div>                
                    </div>        
                </div>
                