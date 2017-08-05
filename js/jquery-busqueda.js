$(document).ready(function() {
    $("#resultadoBusqueda").html('');
});
function buscar() {
    var textoBusqueda = $("input#busqueda").val();
    var texto2=$("input#busqueda1").val();
    var texto3=$("input#busqueda2").val();

     if (textoBusqueda != "" && texto2!="") {
        $.post("addC.php", {valorBusqueda: textoBusqueda,valorBusqueda1:texto2,valorBusqueda2:texto3}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusqueda2").html('<b> INGRESE LOS CAMPOS COMPLETOS </b>');
        };
};