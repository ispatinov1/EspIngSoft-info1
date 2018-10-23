<?php /* Smarty version 2.6.30, created on 2018-05-27 00:59:07
         compiled from acceso/acceso.tpl */ ?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
    <head>                        
        <meta charset="UTF-8" />        
        <meta http-equiv="Content-Type" content="text/html">        
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <title>Acceso <?php echo $this->_tpl_vars['titulo']; ?>
</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->_tpl_vars['favicon']; ?>
">                
            
        <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['AUX_CSS']; ?>
bootstrap_v4.3/css/bootstrap.min.css"/> 
        <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['APP_CSS']; ?>
acceso.css"/>
        
        <script type="text/javascript" language="JavaScript" src="<?php echo $this->_tpl_vars['AUX_JS']; ?>
jQuery_v3.2/jquery-3.2.1.min.js"></script>             
        <script type="text/javascript" language="JavaScript" src="<?php echo $this->_tpl_vars['AUX_JS']; ?>
bootstrap_v4.3/js/bootstrap.min.js"></script>        
        <script type="text/javascript" language="JavaScript" src="<?php echo $this->_tpl_vars['APP_JS']; ?>
acceso/acceso.js"></script>
        <script type="text/javascript" language="JavaScript"> <?php echo $this->_tpl_vars['acceso']; ?>
 </script>
        
    </head>    
    <body style="background-image: url(<?php echo $this->_tpl_vars['loginImage']; ?>
)">            
        <div class="container">
            <div id="acccesoOverlay" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">                                                                        
                        <div class="row text-center ">                            
                            <img class="img-responsive mx-auto border" src="<?php echo $this->_tpl_vars['logo']; ?>
" alt="Logo" />                        
                            <h1><?php echo $this->_tpl_vars['titulo']; ?>
</h1>                                                             
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
                        <?php if ($this->_tpl_vars['error']): ?>
                            <div id="divErrorAcceso" class="alert alert-danger" role="alert">
                                <strong>Atención</strong>
                                <br/>
                                <span id="spmError"><?php echo $this->_tpl_vars['error']; ?>
</span>
                            </div>                                      
                        <?php endif; ?>  
                    </div>
                </div>
            </div>
                                        
        </div>                
    </body>
</html>