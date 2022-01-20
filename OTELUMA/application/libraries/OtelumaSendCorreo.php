<?php
  if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
  require_once ('PHPMailer/Class.phpmailer.php');
  require_once ('PHPMailer/Class.pop3.php');
  require_once ('PHPMailer/Class.smtp.php');
  require_once ('PHPMailer/Exception.php');
  require_once ('PHPMailer/PHPMailer.php');
  require_once ('PHPMailer/PHPMailerAutoload.php');
  require_once ('PHPMailer/POP3.php');
  require_once ('PHPMailer/SMTP.php');
  class OtelumaSendCorreo{
    public function __construct() {
      $this -> ci = & get_instance();
    }
    // Estructura de correo de PHPMailer
    public function correoPHPMailer($datos_mail) {
      // echo '<pre>'; print_r($datos_mail['txtbody']); echo '</pre>'; die();
      // INDICA todo EL PROCESO QUE ESTA REALIZANDO
      $mail = new PHPMailer();
      // try {
        $mail -> SMTPDebug = 0;
        $mail -> IsSMTP(); //PROTOCOLO USADO PARA ENVIAR EL CORREO
        $mail -> Helo = "www.oteluma.com";
        $mail -> SMTPAuth = true; // habilitamos la autenticación SMTP
        $mail -> SMTPSecure = "ssl"; // establecemos el prefijo del protocolo seguro de comunicación con el servidor
        $mail -> Host = "smtp.gmail.com"; // establecemos GMail como nuestro servidor SMTP
        $mail -> Port = 465; // establecemos el puerto SMTP en el servidor de GMail
        // DATOS PARA EL ACCESSO DEL CORREO
        $mail -> Username = $datos_mail ['username']; // la cuenta de correo GMail
        $mail -> Password = $datos_mail ['pass']; // password de la cuenta GMail
        // DATOS DEL CORREO QUE ENVIARA EL EMAIL
        $mail -> SetFrom ($datos_mail ['from_mail'], $datos_mail ['from_name']); // Quien envía el correo
        // DATOS DEL CORREO QUE SE LE ENVIARA UNA COPIA
        // $mail -> AddReplyTo ( $datos_mail ['reply_mail'], $datos_mail ['reply_name'] ); // A quien debe ir dirigida la respuesta
        // DATOS DEL CORREO A QUIEN SE DEBE DE RESPONDER EL CORREO CON COPIA
        // $mail -> addCC('desarrollo@apci.com.mx', 'Telecomunicaciones Viales');
        $mail -> addCC($datos_mail ['to_mail'], $datos_mail ['to_name']);
        // SE ENVIA UNA COPIA OCULTA AL SIGUIENTE CORREO
        // $mail -> addBCC($datos_mail ['to_mail'], $datos_mail ['to_name']);
        $mail -> AltBody = $datos_mail ['txtplain'];
        // DATOS DEL CORREO DE QUEIEN RECIBIRÁ EL CORREO CLIENTE
        $mail -> AddAddress ( $datos_mail ['to_mail'], ucwords ( strtolower ( $datos_mail ['to_name'] ) ) );
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
        $mail -> Send ();
        if(!$mail->send()) {
            echo 'Message was not sent.';
            echo 'Mailer error: ' . $mail->ErrorInfo;
          } else {
            echo 'Message has been sent.';
          }
    }
    // CORREO DE VERIFICACION DE CUENTA
    public function Verificacion_Usuario($data) {
      $txtbody = '
        <html lang="en">
          <head>
          	<meta charset="UTF-8">
          	<title> Validar Cuenta </title>
          </head>
            <body>
            <div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
            	<center>
            		<img style="padding:20px; width:10%" src="http://www.apci.com.mx/OTELUMA/images/Iconos/Oteluma_Icon_Logo.png">
            	</center>
            	<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
            		<center>
            		  <img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-email.png">
            		  <h3 style="font-weight:100; color:#999"> VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO </h3>
                  <hr style="border:1px solid #ccc; width:80%">
                  <h4 style="font-weight:100; color:#999; padding:0 20px"> Para comenzar a usar su cuenta de Tienda Virtual, debe confirmar su dirección de correo electrónico. </h4>
                  <a href="'.base_url().'Usuario/ValidarCuenta/'.$data['CorreoElectronicoMd5'].'" target="_blank" style="text-decoration:none">
                    <div style="line-height:60px; background:#005e8c; width:60%; color:white"> Verifique su dirección de correo electrónico. </div>
                  </a>
                  <br>
                  <hr style="border:1px solid #ccc; width:80%">
                  <h5 style="font-weight:100; color:#999"> Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará. </h5>
                </center>
              </div>
            </div>
          </body>
        </html>';
      // ASUNTO DEL CORREO
      $txtplain = 'Comentarios';
      $datos_mail ['txtbody'] = $txtbody;
      $datos_mail ['txtplain'] = $txtplain;
      // AQUI VA EL CORREO DE LA EMPRESA PARA LA CONEXIÓN Y APARECERA ESTE CORREO EN EL CORREO ELECTRÓNICO
      $datos_mail ['username'] = "desarrollo@apci.com.mx";
      // AQUI VA LA CONTRASEÑA DE LA EMPRESA PARA LA CONEXIÓN
      $datos_mail ['pass'] = "Desarrollo100818";
      $datos_mail ['from_mail'] = 'desarrollo@apci.com.mx';
      // NOMBRE QUE APARECE EN EL CORREO ELECTRÓNICO
      $datos_mail ['from_name'] = 'OTELUMA';
      // $datos_mail ['reply_mail'] = 'desarrollo@apci.com.mx';
      // $datos_mail ['reply_name'] = $this -> ci -> lang -> line ('nombre_sitio');
      $datos_mail ['subject'] = 'Verifica tu cuenta';
      $datos_mail ['to_mail'] = $data['CorreoElectronico'];
      $datos_mail ['to_name'] = ucwords ( strtolower ( $data['Nombre'] ) );
      $this -> correoPHPMailer ($datos_mail);
    }
    // CORREO DE VERIFICACION DE CUENTA
    public function CuentaActiva($data) {
      $txtbody = '
      <html lang="en">
        <head>
          <meta charset="UTF-8">
          <title> Validar Cuenta </title>
        </head>
          <body>
          <div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
            <center>
              <img style="padding:20px; width:10%" src="http://www.apci.com.mx/OTELUMA/images/Iconos/Oteluma_Icon_Logo.png">
            </center>
            <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
              <center>
                <img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-email.png">
                <h3 style="font-weight:100; color:#999"> BIENVENID@ A LA FAMILIA OTELUMA </h3>
                <hr style="border:1px solid #ccc; width:80%">
                <h4 style="font-weight:100; color:#999; padding:0 20px"> Apartir de ahora puedes gozar de los beneficios que ofrece OTELUMA. </h4>
                <a href="'.base_url().'" target="_blank" style="text-decoration:none">
                  <div style="line-height:60px; background:#005e8c; width:60%; color:white"> Ver nuestros servicios. </div>
                </a>
                <br>
                <hr style="border:1px solid #ccc; width:80%">
                <h5 style="font-weight:100; color:#999"> Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará. </h5>
              </center>
            </div>
          </div>
        </body>
      </html>';
      // ASUNTO DEL CORREO
      $txtplain = 'Comentarios';
      $datos_mail ['txtbody'] = $txtbody;
      $datos_mail ['txtplain'] = $txtplain;
      // AQUI VA EL CORREO DE LA EMPRESA PARA LA CONEXIÓN Y APARECERA ESTE CORREO EN EL CORREO ELECTRÓNICO
      $datos_mail ['username'] = "desarrollo@apci.com.mx";
      // AQUI VA LA CONTRASEÑA DE LA EMPRESA PARA LA CONEXIÓN
      $datos_mail ['pass'] = "Desarrollo100818";
      $datos_mail ['from_mail'] = 'desarrollo@apci.com.mx';
      // NOMBRE QUE APARECE EN EL CORREO ELECTRÓNICO
      $datos_mail ['from_name'] = 'OTELUMA';
      // $datos_mail ['reply_mail'] = 'desarrollo@apci.com.mx';
      // $datos_mail ['reply_name'] = $this -> ci -> lang -> line ('nombre_sitio');
      $datos_mail ['subject'] = 'Bienvenido a la Familia OTELUMA';
      $datos_mail ['to_mail'] = $data -> CorreoElectronico;
      $datos_mail ['to_name'] = ucwords ( strtolower ( $data -> Nombre ) );
      $this -> correoPHPMailer ($datos_mail);
    }
    // CORREO PARA ACTUALIZAR CONTRASEÑA
    public function UpdatePassword($data) {
      $txtbody = '
      <html lang="en">
        <head>
          <meta charset="UTF-8">
          <title> Validar Cuenta </title>
        </head>
          <body>
          <div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
            <center>
              <img style="padding:20px; width:10%" src="http://www.apci.com.mx/OTELUMA/images/Iconos/Oteluma_Icon_Logo.png">
            </center>
            <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
              <center>
                <img style="padding:20px; width:15%" src="http://tutorialesatualcance.com/tienda/icon-pass.png">
                <h3 style="font-weight:100; color:#999"> SOLICITUD DE NUEVA CONTRASEÑA </h3>
                <hr style="border:1px solid #ccc; width:80%">
                <h4 style="font-weight:100; color:#999; padding:0 20px"> <strong> Su nueva contraseña: </strong> '.$data['newPassword'].' </h4>
                <a href="'.base_url().'" target="_blank" style="text-decoration:none">
                  <div style="line-height:60px; background:#005e8c; width:60%; color:white"> Ingresar a mi cuneta. </div>
                </a>
                <br>
                <hr style="border:1px solid #ccc; width:80%">
                <h5 style="font-weight:100; color:#999"> Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará. </h5>
              </center>
            </div>
          </div>
        </body>
      </html>';
      // ASUNTO DEL CORREO
      $txtplain = 'Comentarios';
      $datos_mail ['txtbody'] = $txtbody;
      $datos_mail ['txtplain'] = $txtplain;
      // AQUI VA EL CORREO DE LA EMPRESA PARA LA CONEXIÓN Y APARECERA ESTE CORREO EN EL CORREO ELECTRÓNICO
      $datos_mail ['username'] = "desarrollo@apci.com.mx";
      // AQUI VA LA CONTRASEÑA DE LA EMPRESA PARA LA CONEXIÓN
      $datos_mail ['pass'] = "Desarrollo100818";
      $datos_mail ['from_mail'] = 'desarrollo@apci.com.mx';
      // NOMBRE QUE APARECE EN EL CORREO ELECTRÓNICO
      $datos_mail ['from_name'] = 'OTELUMA';
      // $datos_mail ['reply_mail'] = 'desarrollo@apci.com.mx';
      // $datos_mail ['reply_name'] = $this -> ci -> lang -> line ('nombre_sitio');
      $datos_mail ['subject'] = 'Solicitud de nueva contraseña';
      $datos_mail ['to_mail'] = $data['CorreoElectronico'];
      $datos_mail ['to_name'] = ucwords ( strtolower ( $data['usuario'] -> Nombre ) );
      $this -> correoPHPMailer ($datos_mail);
    }
  }
