<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require_once ('PHPMailer/PHPMailer.php');
  require_once ('PHPMailer/PHPMailerAutoload.php');
  class Send_email{
    public function __construct() {
      $this -> ci = & get_instance();
    }
    // Estructura de correo de PHPMailer
    public function send_email($datos_mail) {
      $mail = new PHPMailer(); // indica todo el proceso que esta realizando
      // $mail = new PHPMailer(true);
      // try {
        $mail -> SMTPDebug = 0;
        $mail -> IsSMTP(); //protocolo usado para enviar el correo
        $mail -> Helo = "www.erp.apci.com.mx";
        $mail -> SMTPAuth = true; // habilitamos la autenticación SMTP
        // $mail -> Host = 'ssl://smtp.gmail.com:465';
        // $mail -> SMTPSecure = "ssl"; // establecemos el prefijo del protocolo seguro de comunicación con el servidor
        $mail -> Host = "ssl://smtp.gmail.com"; // establecemos GMail como nuestro servidor SMTP
        $mail -> Port = 465; // establecemos el puerto SMTP en el servidor de GMail
        // --------------- datos para el acceso del correo --------------- //
        $mail -> Username = $datos_mail ['username']; // la cuenta de correo GMail
        $mail -> Password = $datos_mail ['pass']; // password de la cuenta GMail
        // --------------- datos del correo que enviará el email --------------- //
        $mail -> SetFrom ($datos_mail ['from_mail'], $datos_mail ['from_name']); // Quien envía el correo
        // --------------- correo que se le enviará una copia --------------- //
        $mail -> AddReplyTo ( $datos_mail ['reply_mail'], $datos_mail ['reply_name'] ); // A quien debe ir dirigida la respuesta
        $mail -> addCC($datos_mail ['to_Cc'], 'AP | Consultoría Integral'); // datos del correo a quien se debe de responder el correo con copia
        $mail -> addBCC($datos_mail ['to_Cco'], 'AP | Consultoría Integral'); // correo con copia oculta
        // $mail -> AltBody = $datos_mail ['txtplain'];
        // --------------- archivos adjuntos dentro del correo --------------- //
        $controller_total_file = count($datos_mail['addAttachment']);
        for ($i=0; $i <= $controller_total_file - 1 ; $i++) {
          $mail -> AddAttachment('Docs/emails/'.$datos_mail['empresa'].'/'.$datos_mail['user'].'/'.$datos_mail['date'].'/'.$datos_mail ['to_mail'].'/'.$datos_mail ['subject'].'/'.$datos_mail['addAttachment'][$i], $datos_mail['addAttachment'][$i]);
        }
        $mail -> AddAddress ( $datos_mail ['to_mail'], 'AP | Consultoría Integral'); // datos del correo de quien recibirá el correo electrónico
        $mail -> IsHTML (true); // permite que lo que se enviá acepta HTML
        $mail-> headers = 'MIME-Version: 1.0' . "\r\n";
        $mail-> headers .= 'Content-type: text/html;' . "\r\n";
        $mail -> Subject = $datos_mail ['subject']; // asunto del correo
        $mail -> Body = $datos_mail ['txtbody']; // cuerpo del correo
        $mail -> MsgHTML ($datos_mail ['txtbody']);
        $mail -> CharSet = 'UTF-8';
        $mail -> smtpConnect([
         'ssl' => [
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
            ]
        ]);
        // if ($mail -> Send()) {
        //   return "true";
        // }
        // else {
        //   return "false";
        // }
        $mail -> Send();
    }
    // Correo
    public function send($library_send_email) {
      $txtbody = '
        <html lang="en">
          <head>
          	<meta charset="UTF-8">
          	<title> Validar Cuenta </title>
          </head>
            <body>
            <div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
            	<center>
            		<img style="padding:20px; width:10%" src="https://www.apci.com.mx/images/Logo/apci_logo.webp">
            	</center>
            	<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
            		<center>
            		  <img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-email.png">
            		  <h1 style="font-weight:100; color:#999"> HOLA COLABORADOR DE <br> <br> <b> AP | Consultoría Integral </b> </h1>
                  <hr style="border:1px solid #ccc; width:80%">
                  <h2 style="font-weight:100; color:#999; padding:0 20px"> '.$library_send_email['redactar'].' </h2>
                  <br>
                  <hr style="border:1px solid #ccc; width:80%">
                  <h5 style="font-weight:100; color:#999"> Si no reconoce este correo, favor de avisar al remitente, para que ya no reciba más correos. </h5>
                </center>
              </div>
            </div>
          </body>
        </html>';
        // echo "<pre>"; print_r($txtbody); echo "</pre>"; die();
      // $txtplain = 'Comentarios'; // asunto del correo
      $datos_mail ['txtbody'] = $txtbody;
      // $datos_mail ['txtplain'] = $txtplain;
      $datos_mail ['username'] = $library_send_email['email']; // correo de la empresa para la conexión y aparecerá este correo e n el correo electrónico enviado
      // $datos_mail ['pass'] = "Recursos100818";
      $datos_mail ['pass'] = $library_send_email['email_password_e']; // contraseña para la conexión
      $datos_mail ['from_mail'] = $library_send_email['email'];
      // --------------- nombre que aparece en el correo electrónico --------------- //
      $datos_mail ['from_name'] = $library_send_email['tbl_e'] -> apellido_paterno_e." ".$library_send_email['tbl_e'] -> apellido_materno_e." ".$library_send_email['tbl_e'] -> nombre_e;
      $datos_mail ['reply_mail'] = $library_send_email['email'];
      $datos_mail ['reply_name'] = $library_send_email['tbl_e'] -> apellido_paterno_e." ".$library_send_email['tbl_e'] -> apellido_materno_e." ".$library_send_email['tbl_e'] -> nombre_e;
      $datos_mail ['subject'] = $library_send_email['subject'];
      $datos_mail ['to_mail'] = $library_send_email['from'];
      $datos_mail ['to_Cc'] = $library_send_email['Cc'];
      $datos_mail ['to_Cco'] = $library_send_email['Cco'];
      // --------------- ruta para el doc --------------- //
      $datos_mail['empresa'] = $library_send_email['empresa'];
      $datos_mail['user'] = $library_send_email['tbl_e'] -> numero_empleado_e;
      $datos_mail['date'] = date('Y-m-d');
      $datos_mail ['addAttachment'] = $library_send_email['adjArchivos'];
      // $datos_mail ['to_name'] = ucwords ( strtolower ( $library_send_email['Nombre'] ) );
      $this -> send_email($datos_mail);
    }
  }
