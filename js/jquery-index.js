function buscar(){

  var textoBusqueda=$("input#busqueda").val();
  var texto2=$("input#busqueda1").val();
  var texto3=$("input#busqueda2").val();

  var parametros={
      "valorBusqueda": textoBusqueda,
      "valorBusqueda1":texto2,
      "valorBusqueda2":texto3,
      };
  $.ajax({
      data:parametros,
      url:'addC.php',
      type:'post',
      success: function (mensaje){          
          if(mensaje==1){
            location.assign("");
          }else if (mensaje==5){
            location.assign("");
          }else{
            $("#resultadoBusqueda").html(mensaje);
          }        
      }
  });
 }