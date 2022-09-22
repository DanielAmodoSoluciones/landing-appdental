<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  require 'vendor/autoload.php';
  require 'config.php';

  $host = $_SERVER["HTTP_HOST"];
  $img = $host . "/assets/img/amodo.webp";
  $mail = new PHPMailer(true);
  $mailInfo           = 'soporte@amodosoluciones.com';
  $nombrecomercial    = $_POST['nombre'];
  $email              = $_POST['email'];
  $telefono           = $_POST['telefono'];
  $motivo             = $_POST['motivo'];
  $mensaje            = $_POST['mensaje'];


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
    $mail->FromName = "Amodo Soluciones";
    $mail->addAddress($config['sendTo']);
    $mail->addAddress($email);
    //$mail->AddCC($_POST['inputMail']); // Copia
    // print_r($mail);die();
    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Correo de  : ' . $nombrecomercial;
    $mail->Body    =
      '<p style="text-aling:center"> <img style="width:300px" src=' . $img . '> </h1></p>'
      . '<h3>Datos de contacto para APP Dental Macía</h3>'
      . '<p><b>Nombre:</b> ' . $nombrecomercial . '</p>'
      . "<p><b>Email:</b> " . $email . "</p>"
      . "<p><b>Telefono:</b> " . $telefono . "</p>"
      . "<p><b>Motivo de este mensaje :</b> " . $motivo . "</p>"
      . "<p><b>Mensaje:</b> " . $mensaje  . "</p>";
    // print_r ($mail);die();
    echo json_encode(['status' => true, "data" => 'Tu mensaje ha sido enviado']);
    $mail->send();
  } catch (Exception $e) {
    echo json_encode(['status' => false, "data" => "El mensaje no ha podido ser enviado\nMailer Error: " . $mail->ErrorInfo]);
  }
} else {
  echo "<h1>Access forbidden, kids!</h1>";
}
