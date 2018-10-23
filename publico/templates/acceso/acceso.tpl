<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
    <head>                        
        <meta charset="UTF-8" />        
        <meta http-equiv="Content-Type" content="text/html">        
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <title>Acceso <!--{$titulo}--></title>
        <link rel="shortcut icon" type="image/x-icon" href="<!--{$favicon}-->">                
            
        <link type="text/css" rel="stylesheet" href="<!--{$AUX_CSS}-->bootstrap_v4.3/css/bootstrap.min.css"/> 
        <link type="text/css" rel="stylesheet" href="<!--{$APP_CSS}-->acceso.css"/>
        
        <script type="text/javascript" language="JavaScript" src="<!--{$AUX_JS}-->jQuery_v3.2/jquery-3.2.1.min.js"></script>             
        <script type="text/javascript" language="JavaScript" src="<!--{$AUX_JS}-->bootstrap_v4.3/js/bootstrap.min.js"></script>        
        <script type="text/javascript" language="JavaScript" src="<!--{$APP_JS}-->acceso/acceso.js"></script>
        <script type="text/javascript" language="JavaScript"> <!--{$acceso}--> </script>
        
    </head>    
    <body style="background-image: url(<!--{$loginImage}-->)">            
        <div class="container">
            <div id="acccesoOverlay" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">                                                                        
                        <div class="row text-center ">                            
                            <img class="img-responsive mx-auto border" src="<!--{$logo}-->" alt="Logo" />                        
                            <h1><!--{$titulo}--></h1>                                                             
                        </div>
                    </div>
                    <div class="modal-body">                        
                        <form id="formAcceso" name="formAcceso" method="POST" action="" enctype="multipart/form-data" >   
                            <div class="form-group">
                                <label for="txtIdUsuario" class="control-label etiqueta-acceso">Identificador de usuario</label>
                                <input type="text" class="form-control" id="txtIdUsuario" name="txtIdUsuario" maxlength="50" placeholder="Usuario" autocomplete="on" required>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="pwdContrasenaUsuario" class="control-label etiqueta-acceso">Contraseña de usuario</label>
                                <input type="password" class="form-control" id="pwdContrasenaUsuario" name="pwdContrasenaUsuario" maxlength="50" placeholder="Contraseña" autocomplete="on" required>
                                <span class="help-block"></span>                                                
                            </div>                                                                  
                            <div>
                                <input type="submit" id="btnIngresar" name="btnIngresar" class="btn btn-primary btn-block" value="Ingresar">
                                <input type="button" id="btnPasswordOlvidado" name="btnPasswordOlvidado" class="btn btn-link" value="Olvidó su contraseña?">                                                                
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!--{if $error}-->
                            <div id="divErrorAcceso" class="alert alert-danger" role="alert">
                                <strong>Atención</strong>
                                <br/>
                                <span id="spmError"><!--{$error}--></span>
                            </div>                                      
                        <!--{/if}-->  
                    </div>
                </div>
            </div>
                                        
        </div>                
    </body>
</html>
