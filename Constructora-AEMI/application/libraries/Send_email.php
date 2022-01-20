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
  class Send_email{
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
        $mail -> Helo = "www.caemi.com.mx";
        $mail -> SMTPAuth = true; // habilitamos la autenticación SMTP
        $mail -> SMTPSecure = "ssl"; // establecemos el prefijo del protocolo seguro de comunicación con el servidor
        $mail -> Host = "smtp.gmail.com"; // establecemos GMail como nuestro servidor SMTP
        $mail -> Port = 465; // establecemos el puerto SMTP en el servidor de GMail
        // DATOS PARA EL ACCESSO DEL CORREO
        $mail -> Username = $datos_mail ['username']; // la cuenta de correo GMail
        $mail -> Password = $datos_mail ['pass']; // password de la cuenta GMail
        // DATOS DEL CORREO QUE ENVIARA EL EMAIL
        $mail -> SetFrom ( $datos_mail ['from_mail'], $datos_mail ['from_name'] ); // Quien envía el correo
        // DATOS DEL CORREO QUE SE LE ENVIARA UNA COPIA
        // $mail -> AddReplyTo ( $datos_mail ['reply_mail'], $datos_mail ['reply_name'] ); // A quien debe ir dirigida la respuesta
        // SE ENVIA UNA COPIA OCULTA AL SIGUIENTE CORREO CC PARA
        $mail -> addCC('desarrollo@televiales.net', 'TI de Constructora AEMI');
        // DATOS DEL CORREO A QUIEN SE DEBE DE RESPONDER EL CORREO CON COPIA Cco
        // $mail -> addBCC('servicio@televiales.net', 'Ventas de Constructora AEMI');
        $mail -> addBCC('gabriel03022012@hotmail.com', 'Ventas de Constructora AEMI');
        // $mail -> addBCC('asis_aemi@apci.com.mx', 'Asistente de Constructora AEMI');
        // $mail -> addBCC('asis_mtto@caemi.com.mx', 'Asistente de AEMI');
        // $mail -> headers = 'MIME-Version: 1.0' . "\r\n";
        // $mail -> headers .= 'Content-type: text/html;' . "\r\n";
        $mail -> AltBody = $datos_mail ['txtplain'];
        // DATOS DEL CORREO DE QUEIEN RECIBIRÁ EL CORREO CLIENTE
        // $mail -> AddAddress ($datos_mail ['to_mail'], ucwords (strtolower ($datos_mail ['to_name'])));
        // DATOS PARA ENVIAR ARCHIVOS DENTRO DEL CORREO
        // $mail -> addAttachment('/var/tmp/file.tar.gz');
        // $mail -> addAttachment('/tmp/image.jpg', 'new.jpg');
        // PERMITE QUE LO QUE SE ENVIA ACEPTA HTML
        $mail -> IsHTML (true);
        $mail-> headers = 'MIME-Version: 1.0' . "\r\n";
        $mail-> headers .= 'Content-type: text/html;' . "\r\n";
        // ASUNTO DEL CORREO
        $mail -> Subject = $datos_mail ['subject']; // Asunto del mensaje
        // CUERPO DEL CORREO
        $mail -> Body = $datos_mail ['txtbody'];
        $mail -> MsgHTML ( $datos_mail ['txtbody'] );
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
    public function send($data) {
      $txtbody = '
      <!DOCTYPE html>
        <html>
          <head>
            <title> Comentarios del Cliente </title>
          </head>
          <body>
            <center>
              <table style="background: url(https://www.caemi.com.mx/images/Emails/caemi_background_email_costumer.webp) no-repeat 0px 0px; width: 600px; height: 800px">
                <tr style="width: 100%">
                  <td valign="middle" style="width: 30%">
                    <center>
                      <a href="https://www.caemi.com.mx/" target="_blank" style="text-decoration: none;"> <img src="https://www.caemi.com.mx/images/Logo/caemi_logo_aemi.webp" alt="Constructora-AEMI" width="50%"> </a>
                    </center>
                  </td>
                  <td valign="middle" style="width: 70%">
                    <center>
                      <span style="color: #ffffff; font-size: 32px; letter-spacing: 1px"> ¡Hola! </span>
                      <br>
                      <span style="color: #ffffff; font-size: 30px; letter-spacing: 6px; font-weight: bold;"> CONSTRUCTORA </span>
                      <hr style="width: 50%;">
                      <span style="color: #ffffff; font-size: 30px; letter-spacing: 6px; font-weight: bold;"> AEMI </span>
                    </center>
                  </td>
                </tr>
                <tr style="width: 100%">
                  <td colspan="2">
                   <br> <br>
                    <center>
                      <span style="color: #ffffff; font-size: 30px; letter-spacing: 6px;"> ¡Recibimos comentarios de un cliente! </span>
                    </center>
                    <section style="margin-left: 100px; margin-right: 100px;">
                      <p>
                        <span> <img src="https://www.caemi.com.mx/images/Icons/AEMI_E_U.PNG" width="9%" alt="Constructora-AEMI"> </span> <input type="text" class="form-control" value="'.$data['nombre_co'].'" readonly style="width: 85%; text-align: center; font-size: 20px;">
                      </p>
                      <p>
                        <span> <img src="https://www.caemi.com.mx/images/Icons/AEMI_E_E.PNG" width="9%" alt="Constructora-AEMI"> </span> <input type="text" class="form-control" value="'.$data['email_co'].'" readonly style="width: 85%; text-align: center; font-size: 20px;">
                      </p>
                      <p>
                        <span> <img src="https://www.caemi.com.mx/images/Icons/AEMI_E_P.PNG" width="9%" alt="Constructora-AEMI"> </span> <input type="text" class="form-control" value="'.$data['telefono_co'].'" readonly style="width: 85%; text-align: center; font-size: 20px;">
                      </p>
                      <p>
                        <!-- <span> <img src="https://www.caemi.com.mx/images/Icons/AEMI_E_C.PNG" width="9%" alt="Constructora-AEMI"> </span> --> <textarea rows="5" cols="40" class="form-control" readonly style="width: 85%; margin-left: 11%; text-align: justify; font-size: 20px;"> '.$data['comentario_co'].' </textarea>
                      </p>
                    </section>
                  </td>
                </tr>
                <tr style="100%">
                  <td colspan="2">
                    <br>
                    <center>
                      <a href="#" target="_blank"> <img src="https://www.caemi.com.mx/images/Icons/caemi_icon_facebook.webp" alt="Constructora-AEMI" width="10%"> </a>
                      <a href="#" target="_blank"> <img src="https://www.caemi.com.mx/images/Icons/caemi_icon_phone.webp" alt="Constructora-AEMI" width="7%"> </a>
                      <a href="#" target="_blank"> <img src="https://www.caemi.com.mx/images/Icons/caemi_icon_twitter.webp" alt="Constructora-AEMI" width="7%"> </a>
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
      $datos_mail ['subject'] = $data['asunto_co'];
      $datos_mail ['to_mail'] = $data ["email_co"];
      $datos_mail ['to_name'] = ucwords(strtolower($data['nombre_co']));
      $this -> correoPHPMailer ($datos_mail);
    }
  }
