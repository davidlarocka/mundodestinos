<?php
// NOTE: CON ESTO PODEMOS HABILITAR CORS
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
header('Content-Type: text/html; charset=utf-8');
/*
  ___         _
 |   \  __ _ | |_  ___  ___
 | |) |/ _` ||  _|/ _ \(_-<
 |___/ \__,_| \__|\___//__/

*/
// Datos personales
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "Sin nombre";
$apellido = isset($_POST['zona']) ? $_POST['zona'] : "Sin zona";
$correo = isset($_POST['email']) ? $_POST['email']: "Sin correo";
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : "Sin mensaje";
/*
   ___
  / __| ___  _ _  _ _  ___  ___
 | (__ / _ \| '_|| '_|/ -_)/ _ \
  \___|\___/|_|  |_|  \___|\___/

*/
// Importa las clases requeridas
use PHPMailer\PHPMailer\PHPMailer;
// Carga el composer autoload
require_once('./vendor/autoload.php');
require_once('setting.php');
// Crea un nueva instancia del PHPMailer
$mail = new PHPMailer();
$mail->SMTPDebug = 3;
//$mail->IsSMTP();  // telling the class to use SMTP
//$mail->Host     = "a2plcpnl0856.prod.iad2.secureserver.net"; // SMTP server
//$mail->Host     = "smtp-relay.gmail.com";
//$mail->From     = "_mainaccount@asincoandina.com";
//$mail->Username = "_mainaccount@asincoandina.com";
//$mail->Password = "V0v8612u&1ZmJN";
//$mail->SMTPAuth   = true;
//$mail->SMTPSecure = "ssl";
//$mail->Port       = 25;
//$mail->Port       = 465;

$mail->From = "receptivo@adsmundo.cl";
$mail->FromName = "Contacto de $nombre";

$mail->addCC('webmaster@santiagolab.cl');

//$mail->addCC('davidlarocka@gmail.com');
// $mail->addBCC('bcc@example.com');
// Habilita el enviar correo en formato HTML
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
// Asunto del correo
$mail->Subject = "Solicitud de Ejecutivo - " .$_POST['zona'] ;
// Contenido del correo
$mail->Body =
"<h3>Solicitud de Ejecutivo</h3>

<p>Buen dia estimado, Usted ha recibido una solicitud de ejecutivo de <b>". $_POST['nombre'] ."</b> referente a un destino de zona: ". $_POST['zona'] . "</p>
<br/>
<br/>
Contactar al siguiente email:<b> ".$_POST['email']."</b>
";
//buscamos los correos destinatarios segun la zona
if($_POST['zona'] == 'caribe'){
  $correos =  explode(";", $caribe);
}
elseif ($_POST['zona'] == 'asia') {
  $correos =  explode(";", $asia);
}
elseif ($_POST['zona'] == 'norteamerica') {
  $correos =  explode(";", $norteamerica);
}
elseif ($_POST['zona'] == 'sudamerica') {
  $correos =  explode(";", $sudamerica);
}
elseif ($_POST['zona'] == 'pacifico_sur') {
  $correos =  explode(";", $pacifico_sur);
}
elseif ($_POST['zona'] == 'europa') {
  $correos =  explode(";", $europa);
}
elseif ($_POST['zona'] == 'centroamerica') {
  $correos =  explode(";", $centroamerica);
}
elseif ($_POST['zona'] == 'centroamerica') {
  $correos =  explode(";", $centroamerica);
}
elseif ($_POST['zona'] == 'africa') {
  $correos =  explode(";", $africa);
}
else{
  $correos =  explode(";", $all);
}


foreach ($correos as $key => $value) {
  // Destinatarios del correo
  $mail->addAddress(  $value , "Solicitud de Ejecutivo" . $_POST['zona']);


}

// Envio del correo
  if(!$mail->send()){
    print_r(json_encode(["PHPMailer Error: " => $mail->ErrorInfo]));
  } else {
    print_r(json_encode(["PHPMailer: " => "El correo fue enviado correctamente." . $value ]));
  }

?>
