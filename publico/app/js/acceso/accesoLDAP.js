$(document).ready(function () {
        
    $("#btnCerrarErrorBD").click(function (evento) {
        window.history.back();
    });
    
    $("select, input").change(function () {
        if($("#divAlert").is(':visible')){
            $("#divAlert").hide();
        }
        if($("#divBtnGenerar").is(':visible')){
            $('#btnGenerar').prop('disabled', true);
            $("#divBtnGenerar").hide();            
        }
    });
    
    $('#txtNombreUsuario', '#pwdContrasenaUsuario').keypress(function (evento) {
        if (evento.which === 13) {
            evento.preventDefault();
            validaAcceso();
        }            
    });

    $("#btnIngresar").click(function (evento) {
        evento.preventDefault();                
        validaAcceso();
    });               
    
});

function validaAcceso(){
    var usuario = $("#txtIdUsuario").val();
    var contrasena = $("#pwdContrasenaUsuario").val();
    var tipoModulo = $("#hidModulo").val() ? $("#hidModulo").val(): null;
    if(usuario && contrasena){  
        var parametros = {usuario, tipoModulo};
        $.ajax({                                    
            url: "../app/inc_php/acceso/datosAccesoLDAP.php",
            type:"POST",
            async: true,
            dataType:"json",                                  
            data: parametros,
            success: function(response){                                    
                if(response.success){                    
                    if(response.moduloUsuario){    
                        var atributosInput;
                        atributosInput = {type:'hidden', id:'hidModuloUsuario', name:'hidModuloUsuario', value:JSON.stringify(response.moduloUsuario)};
                        $('<input>').attr(atributosInput).appendTo('#frmAccesoLDAP');                                              
                        $('#frmAccesoLDAP').submit();
                    }
                    else{
                        var msgError = "\nNo existe registro de usuario para el identificador diligenciado, por favor intentelo nuevamente. \n";
                        $('#spmError').empty();
                        $('#divAlert').show();
                        $('#spmError').html(msgError); 
                    }
                }
                else{
                    var msgError = "\nError en solicitud de validaci\u00F3n de acceso, por favor intentelo en otro momento. \n"; //Producción
                    msgError = response.error ? msgError + response.error : '';  //Desarrollo                                                                                  
                    $('#spmError').empty();
                    $('#divAlert').show();
                    $('#spmError').html(msgError);                            
                }
            },                    
            error: function(jqXHR, textStatus, errorThrown){                                    
                //alert("Error en solicitud Ajax de | "+jqXHR.responseText + " | " + textStatus + " | " + errorThrown);                                        
                var msgError = "Error en solicitud Ajax de acceso | " +jqXHR.responseText + " | " + textStatus + " | " + errorThrown;
                $('#spmError').empty();
                $('#divAlert').show();
                $('#spmError').html(msgError);
            }                
        });  
    }
    else{
        var msgError = "Ingrese sus datos de usuario correctamente e intente nuevamente.";
        $('#spmError').empty();
        $('#divAlert').show();
        $('#spmError').html(msgError);   
    }
}