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
  class SASSPERSendCorreo{
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
        $mail -> Helo = "www.sassper.net";
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
        // SE ENVIA UNA COPIA OCULTA AL SIGUIENTE CORREO CC PARA
        $mail -> addCC('desarrollo@apci.com.mx', 'TI de S.ASSPER');
        // DATOS DEL CORREO A QUIEN SE DEBE DE RESPONDER EL CORREO CON COPIA Cco
        $mail -> addBCC('servicio@televiales.net', 'Ventas de S.ASSPER');
        $mail -> addBCC('direccion@sassper.net', 'Dirección se S.ASSPER');
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
        $mail -> Send ();
    // } catch (Exception $e){
    //     echo 'Existio un error al enviar el mensaje:', $mail -> ErrorInfo;
    // }
    }
    public function correo_sassper($data) {
      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";
  		// die();
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
              <table style="width: 80%; height: 50%; padding: 50px; border: 5px solid #ffd556; border-radius: 20px; background-color: #ffffff;">
                <tr>
                  <td>
                    <img src="http://www.sassper.net/images/Logo/logo_letras1.webp" alt="sassper_logo">
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="	color: rgb(255, 192, 0); text-align:center; font-size: 50px;">Comentarios de Cliente</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="color: #545454; font-size: 15px; font-weight: 100;"> Hola S.ASSPER buen día. </p>
                    <p style="color: #545454; font-size: 15px; font-weight: 100;"> Hemos recibido comentarios sobre nuestro servicio de un cliente. </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="color: #545454; font-size: 20px; font-weight: 300; text-decoration: none;">
                     <span style="color: #ffd556; font-size: 25px; text-transform: uppercase; font-weight: bold;"> Usuario: </span>' .$data['Usuario'].'<br><br>'.
                    '<span style="color: #ffd556; font-size: 25px; text-transform: uppercase; font-weight: bold;"> Correo electrónico: </span>'.' '.$data['CorreoElectronico'].'<br><br>'.
                    '<span style="color: #ffd556; font-size: 25px; text-transform: uppercase; font-weight: bold;"> Número telefónico: </span>'.' '.$data['NumTelefonico'].'<br><br>'.
                    '<span style="color: #ffd556; font-size: 25px; text-transform: uppercase; font-weight: bold;"> Comentarios: </span>'.' '.$data['Comentarios'].'</p>
                  </td>
                </tr>
                <tr>
                  <td>
                  <p style="text-align: center; font-size: 20px; color: #545454;"> S. ASSPER SEGURIDAD PRIVADA
                    <span id="sassper_footer_redes">
                      <a style="text-decoration: none;" target="_blank" href="https://www.facebook.com/SASSPER_oficial-761065184238351">
                      <img style="width: 30px; height: 30px;" src="http://www.sassper.net/images/Iconos/Sassper_Face.webp" alt="Sassper_Face"> </a>
                      <a style="text-decoration: none;" target="_blank" href="https://twitter.com/SASSPER_oficial">
                      <img style="width: 30px; height: 30px;" src="http://www.sassper.net/images/Iconos/Sassper_Tw.webp" alt="Sassper_Tw"> </a>
                      <a style="text-decoration: none;" target="_blank" href="https://www.instagram.com/sassper_oficial/">
                      <img style="width: 30px; height: 30px;" src="http://www.sassper.net/images/Iconos/Sassper_Ins.webp" alt="Sassper_Ins"> </a>
                    </span>
                  </p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p style="color: #545454;"> Este mensaje fue enviado a '.$data['CorreoElectronico'].' </p>
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
      $datos_mail ['username'] = "direccion@sassper.net";
      // AQUI VA LA CONTRASEÑA DE LA EMPRESA PARA LA CONEXIÓN
      $datos_mail ['pass'] = "Direccion100818";
      $datos_mail ['from_mail'] = 'direccion@sassper.net';
      // NOMBRE QUE APARECE EN EL CORREO ELECTRÓNICO
      $datos_mail ['from_name'] = 'S.ASSPER Seguridad Privada';
      // $datos_mail ['reply_mail'] = 'ventas@sassper.net';
      // $datos_mail ['reply_name'] = $this -> ci -> lang -> line ('nombre_sitio');
      $datos_mail ['subject'] = "Comentarios de Cliente";
      $datos_mail ['to_mail'] = $data ["CorreoElectronico"];
      $datos_mail ['to_name'] = ucwords ( strtolower ( $data ['Usuario'] ) );
      $this -> correoPHPMailer ($datos_mail);
    }
  }
