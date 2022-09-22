<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  require 'vendor/autoload.php';
  require 'config.php';
  
  $host       = $_SERVER["HTTP_HOST"];
  $img        = $host."/img/ico/logo_ofem.svg";
  $mail       = new PHPMailer(true);
  $mailInfo   = 'info@ofemsl.com';


  try {
    //Server settings
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
  //   $mail->SMTPOptions = array(
  //     'ssl' => array(
  //     'verify_peer' => false,
  //     'verify_peer_name' => false,
  //     'allow_self_signed' => true
  //     )
  // );
  $mail->SMTPDebug = 0;
    // $mail->SMTPDebug = 4;
    $mail->Host       = $config['host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['username'];
    $mail->Password   = $config['password'];
    $mail->SMTPSecure = $config['secure'];
    $mail->Port       = $config['port'];
    //Recipients
    $mail->From = $mailInfo;
    $mail->FromName = "Solicitud de usuario y contraseña";
    $mail->addAddress($config['sendTo']);
    $mail->addAddress($email);
    //$mail->AddCC($_POST['inputMail']); // Copia
// print_r($mail);die();
    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Solicitud de Información para : ' . $nombreyapellidos;
    $mail->Body    =
    '<p style="text-aling:center"> <img style="width:300px" src='.$img.'> </h1></p>'
    .'<h3>Datos de contacto</h3>'
    .'<p><b>Nombre y apellidos:</b> '. $nombreyapellidos. '</p>'
    . "<p><b>Email:</b> " . $email . "</p>"
    . "<p><b>Comunidad de propietarios:</b> " .  $comunidaddepropietarios  . "</p>"
    .'<h3>Asunto</h3>'
    . "<p><b>Asunto:</b> " . $asunto . "</p>"
    . "<p><b>Mensaje:</b> " .  $mensaje . "</p>";
    // print_r ($mail);die();
    echo json_encode(['status' => true, "data" => 'Tu mensaje ha sido enviado']);
    $mail->send();

  } catch (Exception $e) {
    echo json_encode(['status' => false, "data" => "El mensaje no ha podido ser enviado\nMailer Error: " . $mail->ErrorInfo]);
  }
}else{
  echo "<h1>Access forbidden, kids!</h1>";
}
