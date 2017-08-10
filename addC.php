<?php
session_start();

$_SESSION['name']=$_REQUEST['valorBusqueda'];
$_SESSION['ap']=$_REQUEST['valorBusqueda1'];
$_SESSION['am']=$_REQUEST['valorBusqueda2'];
//Archivo de conexión a la base de datos
require('conexion.php');

$consultaBusqueda = $_POST['valorBusqueda'];
$consultaBusqueda2=$_POST['valorBusqueda1'];
$consultaBusqueda3=$_POST['valorBusqueda2'];

if(empty($consultaBusqueda) || empty($consultaBusqueda2) || empty($consultaBusqueda3) ){ 
       $mensaje='<div align="center"><b>INTRODUZCA LOS DATOS REQUERIDOS</b></div>' ;
}else{

$caracteres_malos = array("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
$caracteres_buenos = array("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
$consultaBusqueda2 = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda2);
$consultaBusqueda3 = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda3);
$mensaje = "";
//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda) && isset($consultaBusqueda2) && isset($consultaBusqueda3) ) {
  $consulta_1=mysqli_query($connection,"SELECT * FROM `mmv001` WHERE Nombre COLLATE UTF8_SPANISH2_CI='$consultaBusqueda' AND Apellido_Paterno COLLATE UTF8_SPANISH2_CI='$consultaBusqueda2' AND Apellido_Materno COLLATE UTF8_SPANISH2_CI='$consultaBusqueda3' AND Asistencia='Si' limit 1");
        $fila_1=mysqli_num_rows($consulta_1);
        if ($fila_1 !=0){
           $boton='<div align="center"><b>
                      Tú asistencia ya fue registrada.</b>
                      </div> 
                      ';
        }else{
             $consulta = mysqli_query($connection,"SELECT * FROM `mmv001` WHERE Nombre COLLATE UTF8_SPANISH2_CI='$consultaBusqueda' AND Apellido_Paterno COLLATE UTF8_SPANISH2_CI='$consultaBusqueda2' AND Apellido_Materno COLLATE UTF8_SPANISH2_CI='$consultaBusqueda3' AND Asistencia IS NULL limit 1");
             $filas = mysqli_num_rows($consulta);
                if ($filas != 0) {
                  while($resultados = mysqli_fetch_array($consulta)) {
                      $actualizacion=mysqli_query($connection,"UPDATE `mmv001` SET Asistencia='Si' WHERE Nombre='$consultaBusqueda' AND Apellido_Paterno='$consultaBusqueda2' AND Apellido_Materno='$consultaBusqueda3'");
                      $mensaje='1';
                      include 'mail.php'
                  };
                }else{
                      $mensaje='5';
                };
        }; 
};//Fin isset $consultaBusqueda
};
echo $mensaje;
?>



