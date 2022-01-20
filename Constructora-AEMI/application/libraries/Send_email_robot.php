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
  class Send_email_robot{
    public function __construct() {
      $this -> ci = & get_instance();
    }
    // Estructura de correo de PHPMailer
    public function correoPHPMailer($datos_mail) {
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
        <html>
          <head>
            <title> Bienvenido a Constructora AEMI </title>
          </head>
          <body>
            <center>
              <table style="background: url(https://www.caemi.com.mx/images/Emails/caemi_background_email_robot.webp) no-repeat 0px 0px; width: 600px; height: 1024px">
                <tr>
                  <td>
                    <p style="color: #ffffff; text-align:center; font-size: 32px; letter-spacing: 1px"> ¡Bienvenido a nuestra familia! </p>
                    <center>
                      <span style="color: #ffffff; font-size: 50px; letter-spacing: 6px; font-weight: bold;"> CONSTRUCTORA </span>
                    </center>
                    <hr style="width: 70%;">
                    <center>
                      <span style="color: #ffffff; font-size: 50px; letter-spacing: 6px; font-weight: bold;"> AEMI </span>
                      <br>
                      <a href="https://www.caemi.com.mx/" target="_blank" style="text-decoration: none;"> <img src="https://www.caemi.com.mx/images/Logo/caemi_logo_aemi.webp" alt="Constructora-AEMI" width="30%"> </a>
                      <br> <br> <br> <br>
                      <span style="color: #ffffff; font-size: 30px; letter-spacing: 6px;"> ¡Hola! </span>
                      <br> <br> <br> <br>
                      <span style="color: #ffffff; font-size: 25px; letter-spacing: 3px;"> En breve recibirás noticias de nosotros. </span>
                      <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
                      <span style="color: #ffffff; font-size: 15px; letter-spacing: 2px;"> Siguenos en: </span>
                      <br> <br>
                      <span>
                        <a href="#" target="_blank"> <img src="https://www.caemi.com.mx/images/Icons/caemi_icon_facebook.webp" alt="Constructora-AEMI" width="7%"> </a>
                        <a href="#" target="_blank"> <img src="https://www.caemi.com.mx/images/Icons/caemi_icon_phone.webp" alt="Constructora-AEMI" width="7%"> </a>
                        <a href="#" target="_blank"> <img src="https://www.caemi.com.mx/images/Icons/caemi_icon_twitter.webp" alt="Constructora-AEMI" width="7%"> </a>
                      </span>
                    </center>
                  </td>
                </tr>
                <tr>
                  <td>
                    <center>
                      <a href="https://www.caemi.com.mx/servicios/limpieza" target="_blank" style="text-decoration: none;"> <img src="https://www.caemi.com.mx/images/Emails/caemi_emails_leaning.webp" alt="Constructora-AEMI" width="15%"> </a>
                      <a href="https://www.caemi.com.mx/servicios/hidroneumaticos" target="_blank" style="text-decoration: none;"> <img src="https://www.caemi.com.mx/images/Emails/caemi_emails_hydropneumatics.webp" alt="Constructora-AEMI" width="15%"> </a>
                      <a href="https://www.caemi.com.mx/servicios/hidrosanitarios" target="_blank" style="text-decoration: none;"> <img src="https://www.caemi.com.mx/images/Emails/caemi_emails_hydrosanitary.webp" alt="Constructora-AEMI" width="15%"> </a>
                      <a href="https://www.caemi.com.mx/servicios/mantenimiento-en-industrias-centros-comerciales-y-residencias" target="_blank" style="text-decoration: none;"> <img src="https://www.caemi.com.mx/images/Emails/caemi_emails_projects.webp" alt="Constructora-AEMI" width="15%"> </a>
                      <a href="https://www.caemi.com.mx/servicios/jardineria" target="_blank" style="text-decoration: none;"> <img src="https://www.caemi.com.mx/images/Emails/caemi_emails_gardening.webp" alt="Constructora-AEMI" width="15%"> </a>
                      <a href="https://www.caemi.com.mx/servicios/fumigacion" target="_blank" style="text-decoration: none;"> <img src="https://www.caemi.com.mx/images/Emails/caemi_emails_gardening.webp" alt="Constructora-AEMI" width="15%"> </a>
                    </center>
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
      $datos_mail ['to_mail'] = $data ["email_co"];
      $datos_mail ['to_name'] = ucwords(strtolower($data['nombre_co']));
      $this -> correoPHPMailer ($datos_mail);
    }
  }
