<?php
  if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
  require_once ('DomPDF/lib/html5lib/Parser.php');
  // require_once ('DomPDF/lib/php-font-lib/src/FontLib/Autoloader.php');
  // require_once ('DomPDF/lib/php-svg-lib/src/autoload.php');
  require_once ('DomPDF/src/Autoloader.php');
  // require_once ('DomPDF/src/FontMetrics.php');
  Dompdf \ Autoloader :: register ();
  // referencia el espacio de nombres
  use  Dompdf\Dompdf ;
  class CredConverterPDF {
    function __construct() {
      // $this -> ci = & get_instance();
    }
    public function index(){
    }
    // Estructura de correo de PHPMailer
  public function CreatePDFCred($data = NULL){
    // echo "<pre>"; print_r($data); echo "asdsa"; echo "</pre>";
    // die();
    $txtbody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" >
    	<head>
    		<title></title>
    	</head>
    	<style media="screen">
      body{
        font-family: "Roboto Condensed", sans-serif;
      }
      #plantilla{
        position: absolute;
        width: 236px;
        height: auto;
        min-height: 376px;
        margin-left: 50px;
      }
      #foto{
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 60px;
        margin-left: 108px;
        margin-top: 73px;
      }
      #empresa{
        position: absolute;
        width: 170px;
        height: 90px;
        margin-left: 80px;
        margin-top: 0px;
      }
      #logo{
        position: absolute;
        width: 150px;
        height: 90px;
        margin-left: 95px;
        margin-top: 300px;
      }
      #name{
        position: absolute;
        margin-left: 50px;
        margin-top: 230px;
        z-index: 99;
        color: #ffffff;
        width: 236px;
        text-align: center;
      }
      #apellidos{
        position: absolute;
        margin-left: 142px;
        width: 140px;
        margin-top: 230px;
        z-index: 99;
        color: #ffffff;
      }
      #puesto{
        position: absolute;
        margin-left: 122px;
        margin-top: 260px;
        z-index: 99;
        color: #ffffff;
        margin-left: 50px;
        width: 236px;
        text-align: center;
      }
      #NSS{
        position: absolute;
        margin-left: 70px;
        font-size: 11px;
        margin-top: 180px;
        z-index: 99;
        color: #ffffff;
        font-weight: bold;
      }
      #NSSname{
        position: absolute;
        margin-left: 0px;
        font-size: 11px;
        margin-top: 0px;
        z-index: 99;
        color: #ffffff;
        font-weight: normal;
      }
      #curp{
        position: absolute;
        margin-left: 70px;
        font-size: 11px;
        margin-top: 195px;
        z-index: 99;
        color: #ffffff;
        font-weight: bold;
      }
      #curpname{
        position: absolute;
        margin-left: 0px;
        font-size: 11px;
        margin-top: 0px;
        z-index: 99;
        color: #ffffff;
        font-weight: normal;
      }
      #leyenda{
        position: absolute;
        margin-left: 70px;
        font-size: 8px;
        margin-top: 220px;
        z-index: 99;
        width: 200px;
        text-align: justify;
        color: #ffffff;
      }
      #firma{
        position: absolute;
        margin-top: 240px;
        width: 200px;
        height: 10px;
        z-index: 99;
        background-color: #ffffff;
        margin-left: 70px;
        margin-top: 285px;
      }
    	</style>
      <body>
      <table style="width: 100%">
        <tr>
    			<td>
            <div id="container">
              <img id="plantilla" src="./images/PantillaCred/PantillaCred.PNG" alt="PantillaCred">
              <img id="foto" src="./'.$data['CredFoto'].'" alt="foto">
              <p id="name"> '.$data['CredName'].' </p>
              <!-- <p id="apellidos"> '.$data['CredApellidos'].' </p>-->
              <p id="puesto"> '.$data['CredPuesto'].' </p>
            </div>
          </td>
          <td>
          	<div id="container_atras">
          		<img id="plantilla" src="./images/PantillaCred/PantillaCred_atras.PNG" alt="PantillaCred_atras">
          		<p id="NSS"> NSS: <span id="NSSname"> '.$data['CredNSS'].' </span> </p>
          		<p id="curp"> CURP: <span id="curpname"> '.$data['CredCurp'].' </span> </p>
              <p id="leyenda"> Esta credencial es personal e intransferible, el mal uso de esta identificación será responsabilidad del portador de la misma y/o de la persona o área solicitante. <br><br> En Caso de emergencia o extravió favor de llamar al teléfono: <b> 5160-9276 </b> </p>
              <img id="firma" src="./images/PantillaCred/firma.png" alt="firma">
          	</div>
          </td>
        </tr>
      </table>
      </body>
    </html>';
    // print_r($txtbody);
    // die();
    // instanciar y usar la clase
    // $options = new Options();
    // $options -> set('isRemoteEnabled',true);
    // $dompdf = new Dompdf($options);
    $dompdf  =  new  Dompdf();
    $filename =  $data['CredName'];
    $nameEmpresa = $data['nameEmpresa'];
    // $dompdf -> set_option("isPhpEnabled", true);
    $dompdf -> loadHtml ($txtbody);
    // (Opcional) Configure el tamaño y la orientación del papel
    $dompdf -> setPaper ( ' A4 ' , ' landscape ' );
    // Renderiza el HTML como PDF
    $dompdf -> render ();
    // obtener el PDF generado
    $pdf = $dompdf -> output();
    //Enviar el PDF generado al navegador
    $dompdf -> stream ('Cred_'.$nameEmpresa.'_'.$filename);
    redirect (base_url ());
    }
  }
?>
