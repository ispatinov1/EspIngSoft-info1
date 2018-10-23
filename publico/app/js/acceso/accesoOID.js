$(document).ready(function () {
    
    $("select, input").change(function () {
        if($("#divAlert").is(':visible')){
            $("#divAlert").hide();
        }
        if($("#divBtnGenerar").is(':visible')){
            $('#btnGenerar').prop('disabled', true);
            $("#divBtnGenerar").hide();            
        }
    });
    
    $('#txtNumeroId').keypress(function (evento) {
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
    var tipoIdentificacion = $("#slcTipoId").val();
    var numeroIdentificacion = $("#txtNumeroId").val();
    var tipoAcceso = $("#hidTipo").val();
    if(numeroIdentificacion){                  
        var parametros = {
            tipoIdentificacion,
            numeroIdentificacion,
            tipoAcceso
        };
        $.ajax({                                    
            url: "../app/inc_php/acceso/datosAccesoOID.php",
            type:"POST",
            async: true,
            dataType:"json",                                  
            data: parametros,
            success: function(response){                                    
                if(response.success){
                    if(response.programas && response.datosUsuario){    
                        var atributosInput;
                        atributosInput = {type:'hidden', id:'hidDatosUsuario', name:'hidDatosUsuario', value:JSON.stringify(response.datosUsuario)};
                        $('<input>').attr(atributosInput).appendTo('#frmAccesoOID');                        
                        atributosInput = {type:'hidden', id:'hidProgramas', name:'hidProgramas', value:JSON.stringify(response.programas)};
                        $('<input>').attr(atributosInput).appendTo('#frmAccesoOID');                        
                        $('#frmAccesoOID').submit();
                    }
                    else{
                        var msgError = "\nNo existe registro de usuario para el tipo y n\u00FAmero de documento diligenciados, Por favor intentelo nuevamente. \n";
                        $('#divAlert').show();
                        $('#spmError').html(msgError); 
                    }
                }
                else{
                    var msgError = "\nError en solicitud de validaci\u00F3n, por favor intentelo en otro momento. \n"; //Producción
                    msgError = response.error ? msgError + response.error : '';  //Desarrollo                                                                                  
                    $('#divAlert').show();
                    $('#spmError').html(msgError);                            
                }
            },                    
            error: function(jqXHR, textStatus, errorThrown){                                    
                //alert("Error en solicitud Ajax de | "+jqXHR.responseText + " | " + textStatus + " | " + errorThrown);                                        
                var msgError = "Error en solicitud Ajax de acceso | " +jqXHR.responseText + " | " + textStatus + " | " + errorThrown;
                $('#divAlert').show();
                $('#spmError').html(msgError);
            }                
        });  
    }
    else{
        var msgError = "Ingrese el N\u00FAmero de Documento de Identificaci\u00F3n e intente nuevamente.";
        $('#divAlert').show();
        $('#spmError').html(msgError);   
    }
}