 function enviar(){
    var name=document.Invitado.txtC.value;
    var apellido=document.Invitado.txtN.value;

          if(name=="" || apellido==""){
            alert("INGRESE LOS CAMPOS COMPLETOS");
          }else{
           document.Invitado.submit();
        }
     }






  var name=$("input#registro").val();
  var apellido=$("input#registro1").val();

  var parametros={
      "valorRegistro": name,
      "valorRegistro1":apellido,
      };
  $.ajax({
      data:parametros,
      url:'safe_ac.php',
      type:'post',
      success: function (mensaje){          
          if(mensaje==1){
            location.assign("#");
          }else{
            $("#resultadoRegistro").html(mensaje);
          }        
      }
  });
 }