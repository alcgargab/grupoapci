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
  class APCIFDConverterPDF {
    function __construct() {
      // $this -> ci = & get_instance();
    }
    public function index(){
    }
    // Estructura de correo de PHPMailer
  public function CreatePDFOT($usuario = NULL, $data = NULL){
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
      *{
        font-size: 10px;
        color: rgb(52, 58, 64, 0.8);
      }
      img{
        display: block;
        max-width: 100%;
      }
    	#APCIFDOT_tittle{
    		text-align: center;
    		color: rgb(130, 32, 34) !important;
    		font-size: 30px !important;
    		text-transform: uppercase;
    	}
    	#APCIFDOT_tittle_tittle{
    		color: rgb(52, 58, 64);
    		font-size: 15px;
    	}
      #OT_Firma{
        margin-top: 150px !important;
      }
    	#APCIOT_info_firma{
    		font-size: 15px !important;
    		text-align: center !important;
    		color: rgb(52, 58, 64) !important;
    		border-top: 1px solid rgb(130, 32, 34) !important;
        width: 80%;
    	}
      #margen{
        border: 1px solid rgb(130, 32, 34);
      }
      #OT_Cuadro{
        border: 1px solid rgba(0, 0, 0, 0.5);
        padding: 10px;
      }
      #OT_border{
        background-color: rgb(130, 32, 34);
        color: rgb(255, 255, 255)!important;
        text-aling: center !important;
      }
      #APCIFDOT_cabecera{
    		color: rgb(130, 32, 34) !important;
    		text-align: center !important;
    		border-top: rgb(130, 32, 34) 3px solid !important;
    		border-bottom: rgb(130, 32, 34) 3px solid !important;
    	}
    	</style>
      <body>
      <table style="width: 100%">
        <tr>
    			<td colspan="3" style="width: 100%">
    				<table style="width: 100%" id="APCIFDOT_cabecera">
              <tr>
              	<td colspan="2" style="max-width: 66%">
                  <img src="" alt="">
              	</td>
                <td colspan="1" class="colspan1">
                  <table style="max-width: 100%">
                    <tr>
                      <td colspan="2" style="max-width: 100%">
                        <p>Datos</p>
                      </td>
                    </tr>
                    <tr>
          						<td colspan="1" style="max-width: 50%">
                        <p>Dirección:</p>
          						</td>
                      <td colspan="1" style="max-width: 50%">
                        <p>Datos</p>
          						</td>
          					</tr>
                    <tr>
          						<td colspan="1" style="max-width: 50%">
                        <p>Teléfono:</p>
          						</td>
                      <td colspan="1" style="max-width: 50%">
                        <p>Datos</p>
          						</td>
          					</tr>
                  </table>
              	</td>
              </tr>
    				</table>
    			</td>
    		</tr>
        <tr id="APCIFDOT_tittle">
          <td colspan="3" class="colspan3">
            <p>'.$data['TipodeFormato'].'</p>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="max-width: 66%"> </td>
          <td colspan="1" class="colspan1">
            <p id="APCIFDOT_tittle_tittle">Folio: <span id="OT_Cuadro">'.$data['OTF'].'</span> </p>
          </td>
        </tr>
        <tr>
          <td colspan="3" id="OT_border" class="colspan3">
            <p id="APCIFDOT_tittle_tittle"> Titulo del espacio</p>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="max-width: 66%"> </td>
          <td colspan="1" class="colspan1">
            <p id="APCIFDOT_tittle_tittle" class="colspan1"> Tipo de Trabajo: <span id="OT_Cuadro">'.$data['OTT'].'</span> </p>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="max-width: 66%">
            <p id="APCIFDOT_tittle_tittle">Punto de atención: </p>
            <p id="OT_Cuadro">'.$data['OTPA'].' </p>
          </td>
          <td colspan="1" valign="top" class="colspan1">
            <p id="APCIFDOT_tittle_tittle"> Tipo de Servicio: <span id="OT_Cuadro"> '.$data['OTTS'].' </span> </p>
          </td>
        </tr>
        <tr>
          <td colspan="3" class="colspan3">
            <p id="APCIFDOT_tittle_tittle"> Dirección: </p>
            <p id="OT_Cuadro">'.$data['OTD'].' </p>
          </td>
        </tr>
        <tr>
          <td colspan="3" id="OT_border" class="colspan3">
            <p id="APCIFDOT_tittle_tittle"> Titulo del espacio</p>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="max-width: 66%"></td>
          <td colspan="1" class="colspan1">
            <p id="APCIFDOT_tittle_tittle"> Fecha de Inicio: <span id="OT_Cuadro"> '.$data['OTFI'].' </span> </p>
            <p id="APCIFDOT_tittle_tittle"> Fecha de Escalado: <span id="OT_Cuadro"> '.$data['OTFE'].' </span> </p>
            <p id="APCIFDOT_tittle_tittle"> Fecha de Termino: <span id="OT_Cuadro"> '.$data['OTFT'].' </span> </p>
            <p id="APCIFDOT_tittle_tittle"> Hora de Inicio: <span id="OT_Cuadro"> '.$data['OTHI'].' </span> </p>
            <p id="APCIFDOT_tittle_tittle"> Hora de Termino: <span id="OT_Cuadro"> '.$data['OTHF'].' </span> </p>
          </td>
        </tr>
        <tr>
          <td colspan="3" id="OT_border" class="colspan3">
            <p id="APCIFDOT_tittle_tittle"> Titulo del espacio</p>
          </td>
        </tr>
        <tr>
          <td colspan="1" valing="top" class="colspan1">
            <p id="APCIFDOT_tittle_tittle"> Falla encontrada:</p>
            <p id="OT_Cuadro">'.$data['OTFEN'].'</span> </p>
          </td>
          <td colspan="1" valing="top" class="colspan1">
            <p id="APCIFDOT_tittle_tittle"> Descripción del servicio:</p>
            <p id="OT_Cuadro">'.$data['OTDS'].'</span> </p>
          </td>
          <td colspan="1" valing="top" class="colspan1">
            <p id="APCIFDOT_tittle_tittle"> Observaciones:</p>
            <p id="OT_Cuadro">'.$data['OTOB'].'</span> </p>
          </td>
        </tr>
      </table>
      <table id="OT_Firma" style="width: 99%">
        <tr style="width: 99%">
          <td colspan="1" class="colspan1">
            <p id="APCIOT_info_firma"> Nombre y firma del Cliente </p>
          </td>
          <td colspan="1" class="colspan1">
            <p id="APCIOT_info_firma"> Supervisó </p>
          </td>
          <td colspan="1" class="colspan1">
            <p id="APCIOT_info_firma"> Técnico </p>
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
    $filename =  $usuario;
    // $dompdf -> set_option("isPhpEnabled", true);
    $dompdf -> loadHtml ($txtbody);
    // (Opcional) Configure el tamaño y la orientación del papel
    $dompdf -> setPaper ( ' A4 ' , ' landscape ' );
    // Renderiza el HTML como PDF
    $dompdf -> render ();
    // obtener el PDF generado
    $pdf = $dompdf -> output();
    //Enviar el PDF generado al navegador
    $dompdf -> stream ('PDFOfertadeTrabajo'.$filename);
    redirect (base_url ());
    }
  }
?>
