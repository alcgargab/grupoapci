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
  class AEMISendCorreoRobot{
    public function __construct() {
      $this -> ci = & get_instance();
    }
    // Estructura de correo de PHPMailer
    public function correoPHPMailer($datos_mail) {
      echo '<pre>'; print_r($datos_mail['txtbody']); echo '</pre>'; die();
      // INDICA todo EL PROCESO QUE ESTA REALIZANDO
      $mail = new PHPMailer();
      // try {
        $mail -> SMTPDebug = 0;
        $mail -> IsSMTP(); //PROTOCOLO USADO PARA ENVIAR EL CORREO
        $mail -> Helo = "www.caemi.com.mx";
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
        $mail->smtpConnect([
         'ssl' => [
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
            ]
        ]);
        $mail -> Send ();
    }
    // CORREO DE RESPUESTA RAPIDA CUANDO SOLICITAN UN SERVICIO
    public function correo_Gracias($data) {
      $txtbody = '
      <!DOCTYPE html>
        <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title> Comentarios del Cliente </title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          </head>
          <body style="padding: 30px;">
            <center>
              <table style="width: 80%; height: 50%; padding: 50px; border: 5px solid #822022; border-radius: 20px; background-color: rgba(130, 32, 34, 0.4);">
                <tr>
                  <td>
                  <img src="https://www.caemi.com.mx/images/Logo/aemi_logo_img.webp" alt="AEMI_logo">
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="	color: #ffffff; text-align:center; font-size: 40px;">Bienvenido a la Familia Constructora AEMI</p>
                  </td>
                </tr>
                <tr>
                  <td>
                  <p style="color: #000000; font-size: 20px; font-weight: 100;"> Hola <span style="color: #ffffff; font-size: 30px; font-weight: 100;">' .$data['Nombre'].'</span> buen día. </p>
                  <p style="color: #000000; font-size: 20px; font-weight: 100;"> Hemos recibido tus comentarios. </p>
                  <p style="color: #000000; font-size: 20px; font-weight: 100;"> En breve recibirás noticias de nosotros. </p>
                  <br> <br>
                  <p style="color: #ffffff; font-size: 30px; font-weight: 100;"> ¿Ya conoces todos nuestros servicios? </p>
                  <ul>
                  <li style="color: #ffffff; font-size: 15px; font-weight: 100;"> Visita nuestros servicios <a href="http://www.caemi.com.mx/NuestrosServicios" target="_blank" style="color: rgb(78, 148, 193); font-size: 18px;"> Aquí </a> </li>
                  </ul>
                  </td>
                </tr>
                <tr>
                  <td>
                  <p style="text-align: center; font-size: 20px; color: #000000;"> Constructora AEMI
                    <span id="sassper_footer_redes">
                      <a style="text-decoration: none;" target="_blank" href="#">
                      <img style="width: 30px; height: 30px;" src="https://www.caemi.com.mx/images/Icon/Aemi_Fa_Icon.webp" alt="Aemi_Fa_Icon"> </a>
                      <a style="text-decoration: none;" target="_blank" href="#">
                      <img style="width: 30px; height: 30px;" src="https://www.caemi.com.mx/images/Icon/Aemi_Tw_Icon.webp" alt="Aemi_Tw_Icon"> </a>
                      <a style="text-decoration: none;" target="_blank" href="#">
                      <img style="width: 30px; height: 30px;" src="https://www.caemi.com.mx/images/Icon/Aemi_Ins_Icon.webp" alt="Aemi_Ins_Icon"> </a>
                    </span>
                  </p>
                  </td>
                </tr>
              </table>
            </center>
          </body>
        </html>';
      // ASUNTO DEL CORREO
      $txtplain = 'Comentarios';
      $datos_mail ['txtbody'] = $txtbody;
      $datos_mail ['txtplain'] = $txtplain;
      // AQUI VA EL CORREO DE LA EMPRESA PARA LA CONEXIÓN Y APARECERA ESTE CORREO EN EL CORREO ELECTRÓNICO
      // $datos_mail ['username'] = "asis_aemi@apci.com.mx";
      $datos_mail ['username'] = "desarrollo@televiales.net";
      // AQUI VA LA CONTRASEÑA DE LA EMPRESA PARA LA CONEXIÓN
      // $datos_mail ['pass'] = "Asistente100818";
      $datos_mail ['pass'] = "Desarrollo100818";
      // $datos_mail ['from_mail'] = 'asis_aemi@apci.com.mx';
      $datos_mail ['from_mail'] = 'desarrollo@televiales.net';
      // NOMBRE QUE APARECE EN EL CORREO ELECTRÓNICO
      $datos_mail ['from_name'] = 'Constructora AEMI';
      // $datos_mail ['reply_mail'] = 'ventas@sassper.net';
      // $datos_mail ['reply_name'] = $this -> ci -> lang -> line ('nombre_sitio');
      $datos_mail ['subject'] = 'Bienvenido a la Familia de Constructora AEMI';
      $datos_mail ['to_mail'] = $data ["CorreoElectronico"];
      $datos_mail ['to_name'] = ucwords ( strtolower ( $data ['Nombre'] ) );
      $this -> correoPHPMailer ($datos_mail);
    }
  }
