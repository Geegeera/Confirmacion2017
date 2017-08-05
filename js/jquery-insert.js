 function enviar(){
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
            location.assign("right-sidebar.html");
          }else{
            $("#resultadoRegistro").html(mensaje);
          }        
      }
  });
 }