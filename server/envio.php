<?php
  require 'config.php';
  
  ini_set( 'display_errors', 1 );
  error_reporting( E_ALL );
  $from = "iago@amodosoluciones.com";
  $to = $config['sendTo'];
  $subject = "'subject']";
  $message =  "'message']";
  $headers = "From:" . $from;
  mail($to,$subject,$message, $headers);
  echo json_encode(['status' => true, "data" => 'Tu mensaje ha sido enviado']);
?>
