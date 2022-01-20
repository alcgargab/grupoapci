<?php
  if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
  require_once ('PHPMailer/PHPMailer.php');
  require_once ('PHPMailer/PHPMailerAutoload.php');
  class SendCorreo{
    public function __construct() {
      $this -> ci = & get_instance();
    }
    // Estructura de correo de PHPMailer
    public function correoPHPMailer($datos_mail) {
      // INDICA todo EL PROCESO QUE ESTA REALIZANDO
      $mail = new PHPMailer();
      // $mail = new PHPMailer(true);
      // try {
        $mail -> SMTPDebug = 0;
        $mail -> IsSMTP(); //PROTOCOLO USADO PARA ENVIAR EL CORREO
        $mail -> Helo = "www.televiales.net";
        $mail -> SMTPAuth = true; // habilitamos la autenticación SMTP
        // $mail -> Host = 'ssl://smtp.gmail.com:465';
        // $mail -> SMTPSecure = "ssl"; // establecemos el prefijo del protocolo seguro de comunicación con el servidor
        $mail -> Host = "ssl://smtp.gmail.com"; // establecemos GMail como nuestro servidor SMTP
        $mail -> Port = 465; // establecemos el puerto SMTP en el servidor de GMail
        // DATOS PARA EL ACCESSO DEL CORREO
        $mail -> Username = $datos_mail ['username']; // la cuenta de correo GMail
        $mail -> Password = $datos_mail ['pass']; // password de la cuenta GMail
        // DATOS DEL CORREO QUE ENVIARA EL EMAIL
        $mail -> SetFrom ($datos_mail ['from_mail'], $datos_mail ['from_name']); // Quien envía el correo
        // DATOS DEL CORREO QUE SE LE ENVIARA UNA COPIA
        $mail -> AddReplyTo ( $datos_mail ['reply_mail'], $datos_mail ['reply_name'] ); // A quien debe ir dirigida la respuesta
        // DATOS DEL CORREO A QUIEN SE DEBE DE RESPONDER EL CORREO CON COPIA
        $mail -> addCC($datos_mail ['to_Cc'], 'AP | Consultoría Integral');
        // SE ENVIA UNA COPIA OCULTA AL SIGUIENTE CORREO
        $mail -> addBCC($datos_mail ['to_Cco'], 'AP | Consultoría Integral');
        // $mail -> AltBody = $datos_mail ['txtplain'];
        // DATOS PARA ENVIAR ARCHIVOS DENTRO DEL CORREO
        $totalfile = count($datos_mail['addAttachment']);
        for ($i=0; $i <= $totalfile - 1 ; $i++) {
          $mail -> AddAttachment('Docs/Correo/'.$datos_mail['user'].'/'.$datos_mail['date'].'/'.$datos_mail ['to_mail'].'/'.$datos_mail ['subject'].'/'.$datos_mail['addAttachment'][$i], $datos_mail['addAttachment'][$i]);
        }
        // DATOS DEL CORREO DE QUEIEN RECIBIRÁ EL CORREO CLIENTE
        $mail -> AddAddress ( $datos_mail ['to_mail'], 'AP | Consultoría Integral');
        // PERMITE QUE LO QUE SE ENVIA ACEPTA HTML
        $mail -> IsHTML (true);
        $mail-> headers = 'MIME-Version: 1.0' . "\r\n";
        $mail-> headers .= 'Content-type: text/html;' . "\r\n";
        // ASUNTO DEL CORREO
        $mail -> Subject = $datos_mail ['subject'];
        // CUERPO DEL CORREO
        $mail -> Body = $datos_mail ['txtbody'];
        $mail -> MsgHTML ($datos_mail ['txtbody']);
        $mail -> CharSet = 'UTF-8';
        $mail->smtpConnect([
         'ssl' => [
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
            ]
        ]);
        $mail -> Send();

    }
    // Correo para dar de baja al personal
    public function send($data) {
      $txtbody = '
        <html lang="en">
          <head>
          	<meta charset="UTF-8">
          	<title> Validar Cuenta </title>
          </head>
            <body>
            <div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
            	<center>
            		<img style="padding:20px; width:10%" src="https://www.apci.com.mx/images/Logo/apci_logo.png">
            	</center>
            	<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
            		<center>
            		  <img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-email.png">
            		  <h1 style="font-weight:100; color:#999"> HOLA COLABORADOR DE <br> <br> <b> AP | Consultoría Integral </b> </h1>
                  <hr style="border:1px solid #ccc; width:80%">
                  <h2 style="font-weight:100; color:#999; padding:0 20px"> '.$data['redactar'].' </h2>
                  <br>
                  <hr style="border:1px solid #ccc; width:80%">
                  <h5 style="font-weight:100; color:#999"> Si no reconoce este correo, favor de avisar al remitente, para que ya no reciba más correos. </h5>
                </center>
              </div>
            </div>
          </body>
        </html>';
      // ASUNTO DEL CORREO
      // $txtplain = 'Comentarios';
      $datos_mail ['txtbody'] = $txtbody;
      // $datos_mail ['txtplain'] = $txtplain;
      // AQUI VA EL CORREO DE LA EMPRESA PARA LA CONEXIÓN Y APARECERA ESTE CORREO EN EL CORREO ELECTRÓNICO
      $datos_mail ['username'] = $data['email'];
      // AQUI VA LA CONTRASEÑA DE LA EMPRESA PARA LA CONEXIÓN
      // $datos_mail ['pass'] = "Recursos100818";
      $datos_mail ['pass'] = $data['emailPass'];
      $datos_mail ['from_mail'] = $data['email'];
      // NOMBRE QUE APARECE EN EL CORREO ELECTRÓNICO
      $datos_mail ['from_name'] = $data['usuario'];
      $datos_mail ['reply_mail'] = $data['email'];
      $datos_mail ['reply_name'] = $data['usuario'];
      $datos_mail ['subject'] = $data['subject'];
      $datos_mail ['to_mail'] = $data['from'];
      $datos_mail ['to_Cc'] = $data['Cc'];
      $datos_mail ['to_Cco'] = $data['Cco'];
      // ruta para el doc
      $datos_mail['sesion'] = $data['usuario'];
      $datos_mail['user'] = $data['user'];
      $datos_mail['date'] = $data['hoy'];
      $datos_mail ['addAttachment'] = $data['adjArchivos'];
      // $datos_mail ['to_name'] = ucwords ( strtolower ( $data['Nombre'] ) );
      $this -> correoPHPMailer ($datos_mail);
    }
  }
