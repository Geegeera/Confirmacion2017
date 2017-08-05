<?php
session_start();

$n=$_SESSION['name'];
$ap=$_SESSION['ap'];
$am=$_SESSION['am'];

require('conexion.php');

$insertaRegistro = $_POST['valorRegistro'];
$insertaRegistro2=$_POST['valorRegistro1'];

$sql=mysqli_query($connection,"INSERT INTO `mmv007` (ID_Invitado) select ID_Usuario from mmv001 WHERE Nombre='$n' AND Apellido_Paterno='$ap' AND Apellido_Materno='$am'");

	if(empty($insertaRegistro) || empty($insertaRegistro2)){ 
       $mensaje='<div align="center"><b>INTRODUZCA LOS DATOS REQUERIDOS</b></div>' ;
	}else{
	
		$sql_1=mysqli_query($connection,"UPDATE `mmv007` SET Nombre_Invitado='$insertaRegistro',Apellido_Invitado='$insertaRegistro2' WHERE ID_Invitado IN (select ID_Usuario from mmv001 WHERE Nombre='$n' AND Apellido_Paterno='$ap' AND Apellido_Materno='$am')");

		 $mensaje='1';
    }

 echo $mensaje;

?>
