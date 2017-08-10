<?php
session_start();

$n=$_SESSION['name'];
$ap=$_SESSION['ap'];
$am=$_SESSION['am'];

require_once('class.phpmailer.php');
require_once('class.smtp.php');
require('conexion.php');

$result=mysqli_query($connection,"SELECT Email FROM `mmv001` WHERE Nombre='$n' AND Apellido_Paterno='$ap' AND Apellido_Materno='$am'");

while($row=mysqli_fetch_array($result))
{
$dato=$row['Email'];
}
mysqli_free_result($result);

$mail = new PHPMailer();

$mail->IsSMTP();

$mail->Host = "smtp.gmail.com";

$mail->Port = 465;

$mail->SMTPAuth = true;

$mail->SMTPSecure = "ssl";

$mail->CharSet="UTF-8";

$mail->Username = "nroblesr@amda.mx";

$mail->Password = "AMDA2409";

$mail->SetFrom('amda@amda.mx', 'FORO AUTOMOTOR');

$mail->AddReplyTo("amda@amda.mx", "FORO AUTOMOTOR");

$mail->Subject = "Confirmación a Foro Aautomotor AMDA 2017 ";

$mail->(file_get_contents('send.html')

//indico destinatario
$mail->addAddress($dato);
$mail->IsHTML(true);

if($mail->send() == false){
    echo " ";
} else {
    echo " ";
}

?>