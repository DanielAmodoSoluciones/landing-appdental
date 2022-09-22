<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$nombre     = $_POST['name'];
$email      = $_POST['email'];
$telefono   = $_POST['telefono'];
$mensaje    = "Gracias por poneros en contacto con nosotros. En breve nos pondremos en contacto contigo para ofrecerte una mayor explicación.";

// try {
//   $fh = fopen('test.csv', 'a');

//   $a = [ $empleados, $corriente, $fecha, $factura, $email, $telefono ];

//   fputcsv($fh, $a, ";");

//   fclose($fh);  
//   echo json_encode(['status' => true, "data" => 'Tu mensaje ha sido enviado']);

// } catch (Exception $e) {
//   echo json_encode(['status' => false, "data" => "El mensaje no ha podido ser enviado\nMailer Error: " . $mail->ErrorInfo]);
// }

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  require 'vendor/autoload.php';
  require 'config.php';

  $host = $_SERVER["HTTP_HOST"];
  $img  = "https://appdental.es/assets/img/applogo.webp";
  $mail = new PHPMailer(true);
  $mailInfo           = 'soporte@amodosoluciones.com';

  try {
    // CSV
    $fh = fopen('test.csv', 'a');
    $a  = [$nombre, $email, $telefono];

    fputcsv($fh, $a, ";");

    fclose($fh);

    //Server settings
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
    $mail->Host       = $config['host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['username'];
    $mail->Password   = $config['password'];
    $mail->SMTPSecure = $config['secure'];
    $mail->Port       = $config['port'];
    $mail->From = $mailInfo;
    $mail->FromName = "Amodo Soluciones";
    $mail->addAddress($config['sendTo']);
    $mail->addAddress($email);
    $mail->isHTML(true);

    $mail->Subject = 'Correo de  : ' . $nombre;
    $mail->Body    =
      '<p style="text-aling:center"> <img style="width:300px" src=' . $img . '> </h1></p>'
      . '<h3>Datos de contacto app dental info</h3>'
      . '<p><b>Nombre:</b> ' . $nombre . '</p>'
      . "<p><b>Email:</b> " . $email . "</p>"
      . "<p><b>Telefono:</b> " . $telefono . "</p>"
      . "<p><b>Mensaje:</b> " . $mensaje  . "</p>";
    // print_r ($mail);die();
    echo json_encode(['status' => true, "data" => 'Tu mensaje ha sido enviado']);
    $mail->send();
  } catch (Exception $e) {
    echo json_encode(['status' => false, "data" => "El mensaje no ha podido ser enviado\nMailer Error: " . $mail->ErrorInfo]);
  }
}
