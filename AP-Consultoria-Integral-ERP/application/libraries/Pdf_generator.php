<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  require_once ('PhpOffice/DomPDF/lib/html5lib/Parser.php');
  require_once ('PhpOffice/DomPDF/src/Autoloader.php');
  Dompdf \ Autoloader :: register();
  // referencia el espacio de nombres
  use  Dompdf\Dompdf ;
  class Pdf_generator {
    function __construct() {
      // $this -> ci = & get_instance();
    }
    public function index(){ }
    // --------------- documento de permiso --------------- //
    public function GenerarPermiso_($data = NULL){
      $txtbody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
      	<head>
      		<title></title>
      	</head>
        <body>
          <center>
            <table style="width: 100%; text-align: justify; font-family: Arial, Helvetica, sans-serif;">
              <tr>
                <td style="width: 40%">
                <img src="./images/Logos/ERP_logo_APCI.png" alt="Logo de APCI" width="150px">
                </td>
                <td style="width: 60%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 15px; font-weight: bold"> Solicitud de permiso </p>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 62%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> Datos del empleado </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["empleado"] -> ApellidoPEmp.' '.$data["empleado"] -> ApellidoMEmp.' '.$data["empleado"] -> NomEmp.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 30%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> Fecha de solicitud </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.date("Y-m-d").'" /> </center>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 30%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> ??rea </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["area"] -> Area.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 30%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> cargo </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["puesto"] -> Puesto.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 30%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> fecha de permiso </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["permiso"] -> start.'" /> </center>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 22%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> N?? de horas </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["permiso"] -> horas.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 3%"></td>
                <td style="width: 22%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> de: </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["permiso"] -> horastart.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 22%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> a: </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["permiso"] -> horaend.'" /> </center>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 100%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> observaciones </p>
                  <textarea class="form-control" style="text-align: justify;" name="name" rows="5" cols="50"> '.$data["permiso"] -> Motivo.' </textarea>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 100%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> firmas de autorizaci??n </p>
                </td>
              </tr>
            </table>
            <br><br><br>
            <table style="width: 100%">
              <tr>
                <td style="width: 30%">
                  <center>
                    <p style="font-size: 10px;">'.$data["empleado"] -> ApellidoPEmp.' '.$data["empleado"] -> ApellidoMEmp.' '.$data["empleado"] -> NomEmp.' <br> _______________________________ </p>
                    <p style="text-transform: uppercase; font-size: 10px; font-weight: bold;"> empleado </p>
                  </center>
                </td>
                <td style="width: 30%">
                  <center>
                    <p style="font-size: 10px; text-transform: uppercase; font-size: 10px;"> '.$data["empresa"] -> JInmediato.' <br> _______________________________ </p>
                    <p style="text-transform: uppercase; font-size: 10px; font-weight: bold;"> jefe inmediato </p>
                  </center>
                </td>
                <td style="width: 30%">
                  <center>
                    <p style="font-size: 10px; text-transform: uppercase; font-size: 10px;"> Tostado Torres Diana Karen <br> _______________________________ </p>
                    <p style="text-transform: uppercase; font-size: 10px; font-weight: bold;"> Recursos Humanos </p>
                  </center>
                </td>
              </tr>
            </table>
          </center>
        </body>
      </html>';
      // echo "<pre>"; print_r($txtbody); echo "</pre>"; die();
      $generarPDF = new Dompdf();
      $filename = $data['empleado'] -> NumEmp;
      // $generarPDF -> set_option("isPhpEnabled", true);
      $generarPDF -> loadHtml ($txtbody);
      // (Opcional) Configure el tama??o y la orientaci??n del papel
      $generarPDF -> setPaper ( ' A4 ' , ' landscape ' );
      // Renderiza el HTML como PDF
      $generarPDF -> render();
      // obtener el PDF generado
      $crearPDF = $generarPDF -> output();
      //Enviar el PDF generado al navegador
      $salidaPDF = $generarPDF -> stream ('Permisos_'.$filename);
    }
    // --------------- documento de permiso urgente --------------- //
    public function GenerarPermisoUrgente_($data = NULL){
      $txtbody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
      	<head>
      		<title></title>
      	</head>
        <body>
          <center>
            <table style="width: 100%; text-align: justify; font-family: Arial, Helvetica, sans-serif;">
              <tr>
                <td style="width: 40%">
                <img src="./images/Logos/ERP_logo_APCI.png" alt="Logo de APCI" width="150px">
                </td>
                <td style="width: 60%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 15px; font-weight: bold"> Solicitud de permiso </p>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 50%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> Datos del empleado </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["empleado"] -> ApellidoPEmp.' '.$data["empleado"] -> ApellidoMEmp.' '.$data["empleado"] -> NomEmp.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 22%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> Hora </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["permisourgente"] -> hora.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 22%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> Fecha de solicitud </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.date("Y-m-d").'" /> </center>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 30%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> ??rea </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["area"] -> Area.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 30%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> cargo </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["puesto"] -> Puesto.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 30%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> fecha de permiso </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["permisourgente"] -> start.'" /> </center>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 100%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> observaciones </p>
                  <textarea class="form-control" style="text-align: justify;" name="name" rows="5" cols="50"> '.$data["permisourgente"] -> Motivo.' </textarea>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 100%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> firmas de autorizaci??n </p>
                </td>
              </tr>
            </table>
            <br><br><br>
            <table style="width: 100%">
              <tr>
                <td style="width: 30%">
                  <center>
                    <p style="font-size: 10px;">'.$data["empleado"] -> ApellidoPEmp.' '.$data["empleado"] -> ApellidoMEmp.' '.$data["empleado"] -> NomEmp.' <br> _______________________________ </p>
                    <p style="text-transform: uppercase; font-size: 10px; font-weight: bold;"> empleado </p>
                  </center>
                </td>
                <td style="width: 30%">
                  <center>
                    <p style="font-size: 10px; text-transform: uppercase; font-size: 10px;"> '.$data["empresa"] -> JInmediato.' <br> _______________________________ </p>
                    <p style="text-transform: uppercase; font-size: 10px; font-weight: bold;"> jefe inmediato </p>
                  </center>
                </td>
                <td style="width: 30%">
                  <center>
                    <p style="font-size: 10px; text-transform: uppercase; font-size: 10px;"> Tostado Torres Diana Karen <br> _______________________________ </p>
                    <p style="text-transform: uppercase; font-size: 10px; font-weight: bold;"> Recursos Humanos </p>
                  </center>
                </td>
              </tr>
            </table>
          </center>
        </body>
      </html>';
      // echo "<pre>"; print_r($txtbody); echo "</pre>"; die();
      $generarPDF = new Dompdf();
      $filename = $data['empleado'] -> NumEmp;
      // $generarPDF -> set_option("isPhpEnabled", true);
      $generarPDF -> loadHtml ($txtbody);
      // (Opcional) Configure el tama??o y la orientaci??n del papel
      $generarPDF -> setPaper ( ' A4 ' , ' landscape ' );
      // Renderiza el HTML como PDF
      $generarPDF -> render();
      // obtener el PDF generado
      $crearPDF = $generarPDF -> output();
      //Enviar el PDF generado al navegador
      $salidaPDF = $generarPDF -> stream ('Permiso_Urgente_'.$filename);
    }
    // --------------- docuemnto de vacaci??n --------------- //
    public function GenerarVacaciones_($data = NULL){
      $Fechastart = strtotime($data['vacacion'] -> start);
      $aniostart = date('Y', $Fechastart);
      $messtart = date('m', $Fechastart);
      $diastart = date('d', $Fechastart);
      $Fechaend = strtotime($data['vacacion'] -> end);
      $anioend = date('Y', $Fechaend);
      $mesend = date('m', $Fechaend);
      $diaend = date('d', $Fechaend);
      if ($diastart == $diaend) {
        $numerodias = 1;
      }
      else {
        $numerodias = $diaend - $diastart;
      }
      $txtbody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
      	<head>
      		<title></title>
      	</head>
        <body>
          <center>
            <table style="width: 100%; text-align: justify; font-family: Arial, Helvetica, sans-serif;">
              <tr>
                <td style="width: 40%">
                <img src="./images/Logos/ERP_logo_APCI.png" alt="Logo de APCI" width="150px">
                </td>
                <td style="width: 60%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 15px; font-weight: bold"> solicitud de vacaciones </p>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 62%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> datos del empleado </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data["empleado"] -> ApellidoPEmp.' '.$data["empleado"] -> ApellidoMEmp.' '.$data["empleado"] -> NomEmp.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 30%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> fecha de solicitud </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.date('Y-m-d').'" /> </center>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 30%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> ??rea </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data['area'] -> Area.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 30%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> cargo </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data['puesto'] -> Puesto.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 30%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> fecha de ingreso </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data['empleado'] -> FIngresoEmp.'" /> </center>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 22%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> N?? d??as </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$numerodias.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 22%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> periodo a tomar </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$aniostart.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 22%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> inicio de vacaciones </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data['vacacion'] -> start.'" /> </center>
                </td>
                <td style="width: 3%"></td>
                <td style="width: 22%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> termino de vacaciones </p>
                  <center> <input class="form-control" style="font-size: 10px; width: 100%;" type="text" value="'.$data['vacacion'] -> end.'" /> </center>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 100%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> observaciones </p>
                  <center> <textarea class="form-control" style="text-align: center;" name="name" rows="5" cols="50">  </textarea> </center>
                </td>
              </tr>
            </table>
            <table style="width: 100%">
              <tr>
                <td style="width: 100%">
                  <p style="text-transform: uppercase; text-align: center; background-color: #c4c4c4; height: 10px; padding: 10px; font-size: 10px; font-weight: bold"> firmas de autorizaci??n </p>
                </td>
              </tr>
            </table>
            <br><br><br>
            <table style="width: 100%">
              <tr>
                <td style="width: 30%">
                  <center>
                    <p style="font-size: 10px;">'.$data["empleado"] -> ApellidoPEmp.' '.$data["empleado"] -> ApellidoMEmp.' '.$data["empleado"] -> NomEmp.' <br> _______________________________ </p>
                    <p style="text-transform: uppercase; font-size: 10px; font-weight: bold;"> empleado </p>
                  </center>
                </td>
                <td style="width: 30%">
                  <center>
                    <p style="font-size: 10px; text-transform: uppercase; font-size: 10px;"> '.$data["empresa"] -> JInmediato.' <br> _______________________________ </p>
                    <p style="text-transform: uppercase; font-size: 10px; font-weight: bold;"> jefe inmediato </p>
                  </center>
                </td>
                <td style="width: 30%">
                  <center>
                    <p style="font-size: 10px; text-transform: uppercase; font-size: 10px;"> Tostado Torres Diana Karen <br> _______________________________ </p>
                    <p style="text-transform: uppercase; font-size: 10px; font-weight: bold;"> Recursos Humanos </p>
                  </center>
                </td>
              </tr>
            </table>
          </center>
        </body>
      </html>';
      $generarPDF = new Dompdf();
      $filename =  $data['empleado'] -> NumEmp;
      // $generarPDF -> set_option("isPhpEnabled", true);
      $generarPDF -> loadHtml ($txtbody);
      // (Opcional) Configure el tama??o y la orientaci??n del papel
      $generarPDF -> setPaper ( ' A4 ' , ' landscape ' );
      // Renderiza el HTML como PDF
      $generarPDF -> render();
      // obtener el PDF generado
      $crearPDF = $generarPDF -> output();
      //Enviar el PDF generado al navegador
      $salidaPDF = $generarPDF -> stream ('Solicitud de Vacaciones_'.$filename);
    }
    // --------------- docuemnto de renuncia --------------- //
    public function GenerarRenuncia_($doc = NULL, $fRenunciaLetra = NULL, $home = NULL){
      $txtbody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
      	<head>
      		<title></title>
      	</head>
      	<style media="screen">
      	</style>
        <body>
          <center>
            <table style="width: 100%; text-align: justify; font-family: Arial, Helvetica, sans-serif; margin-left: 50px; margin-right: 50px;">
              <tr>
                <td>
                  <br> <br> <br>
                  <p style="margin-left: 250px; font-size: 15px;"> <b> Ciudad de M??xico, a '.$fRenunciaLetra.' </b> </p>
                  <p style="font-size: 18px;"> <b> '.$doc["empresa"].' <br> '.$home["empresa"] -> RLegal.' </b> </p>
                  <p style="font-size: 20px;"> P r e s e n t e. </p>
                  <br>
                  <p style="font-size: 16px; line-height:25px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;POR CONDUCTO DE LA PRESENTE, POR CONVENIR A LOS INTERESES DEL SUSCRITO
                  <b> '.$doc["nombre"].'</b>, VENGO A PRESENTAR MI RENUNCIA, AL TRABAJO QUE VEN??A DESEMPE??ANDO
                  CON LA CATEGOR??A DE <b> ???'.$doc["Puesto"].'???</b>, PARA LA EMPRESA DENOMINADA <b> ???'.$doc["empresa"].'./o '.$home["empresa"] -> RLegal.'???</b>,
                  D??NDOLO POR TERMINADO EN T??RMINOS DE LA FRACCI??N I DEL ART??CULO 53 DE LA LEY FEDERAL DEL TRABAJO
                  EN VIGOR, NO RESERV??NDOME ACCI??N O DERECHO ALGUNO QUE EJERCITAR EN CONTRA DE DICHA EMPRESA,
                  YA SEA CIVIL, MERCANTIL, PENAL O LABORAL, EN VIRTUD DE QUE SIEMPRE ME FUE PAGADO EN TIEMPO Y
                  FORMA EL SALARIO QUE DEVENGABA, AS?? COMO LAS VACACIONES, PRIMA VACACIONAL, AGUINALDO, UTILIDADES,
                  PRIMA DE ANTIG??EDAD, CUOTAS AL I.M.S.S., AFORE E INFONAVIT, MANIFESTANDO BAJO PROTESTA DE DECIR
                  VERDAD QUE DURANTE TODO EL TIEMPO QUE PRESTE MIS SERVICIOS PARA DICHA EMPRESA, JAM??S SUFRI ACCIDENTE
                  O ENFERMEDAD DE TRABAJO ALGUNO. NOS RESERVAMOS EL DERECHO DE PROCEDER LEGALMENTE ENCONTRA
                  DEL C. <b> '.$doc["nombre"].' </b> </p>
                  <br><br><br><br><br><br>
                  <center> <p style="font-size: 20px;"> _____________________________________ <br> <b> '.$doc["nombre"].' </b> </p> </center>
                </td>
              </tr>
            </table>
          </center>
        </body>
      </html>';
      $generarPDF = new  Dompdf();
      $filename =  $doc['NumEmp'];
      // $generarPDF -> set_option("isPhpEnabled", true);
      $generarPDF -> loadHtml ($txtbody);
      // (Opcional) Configure el tama??o y la orientaci??n del papel
      $generarPDF -> setPaper ( ' A4 ' , ' landscape ' );
      // Renderiza el HTML como PDF
      $generarPDF -> render ();
      // obtener el PDF generado
      $crearPDF = $generarPDF -> output();
      //Enviar el PDF generado al navegador
      $salidaPDF = $generarPDF -> stream ('Renuncia_'.$filename);
    }
    // --------------- documento de finiquito --------------- //
    public function GenerarFiniquito_($doc = NULL, $fechaActual = NULL, $home = NULL, $rh = NULL){
      if ($rh -> APaterno == "TOSTADO") {
        $ct = "MONICA";
      }else {
        $ct = "RUPERTO";
      }
      if ($doc['turno'] == "MATUTINO") {
        $horadeTrabajo = "08:00 - 14:00";
      }elseif ($doc['turno'] == "VESPERTINO") {
        $horadeTrabajo = "14:00 - 20:00";
      }elseif ($doc['turno'] == "MIXTO") {
        $horadeTrabajo = "09:00 - 19:00";
      }else {
        $horadeTrabajo = "24 x 24";
      }
      if ($doc["archivoBajaIMSS"] == "on") {
        $imsssi = "x";
        $imssno = "";
      }else {
        $imsssi = "";
        $imssno = "x";
      }
      if ($doc["archivoRenuncia"] == "on") {
        $renunciasi = "x";
        $renunciano = "";
      }else {
        $renunciasi = "";
        $renunciano = "x";
      }
      $prestaciones = preg_split("/[\s,]+/", $doc['Prestaciones']);
      $txtbody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
        <head>
          <title></title>
        </head>
        <style media="screen">
        </style>
        <body>
          <center>
            <table style="width: 100%; text-align: justify; font-family: Arial, Helvetica, sans-serif; margin-left: 30px; margin-right: 30px;">
              <tr>
                <td>
                  <br>
                  <p style="margin-left: 250px; font-size: 15px;"> <b> Ciudad de M??xico, a '.$fechaActual.' </b> </p>
                  <p style="font-size: 15px;"> DIRECCION ADMINISTRATIVA <br> FINANZAS / NOMINAS </p>
                  <p style="font-size: 17px;"> P r e s e n t e. </p>
                  <p style="font-size: 12px; line-height:15px;" > Por medio solicitamos la elaboraci??n del finiquito de la siguiente persona,  quien ha dejado
                  de prestar sus servicios profesionales para la empresa: <b> '.$doc["empresa"].' </b> En la fecha y datos que
                  a continuaci??n se detallan: </p>
                  <table style="font-size: 14px;">
                    <tr>
                      <td colspan="2">
                        No. de Empleado: <b> <u> '.$doc['NumEmp'].' </u> </b>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        Nombre: <b> <u> '.$doc['nombre'].' </u> </b>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        Puesto: <b> <u> '.$doc['Puesto'].' </u> </b>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        Departamento: <b> <u> '.$doc['area'].' </u> </b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Fecha de ingreso: <b> <u> '.$doc['Fingreso'].' </u> </b>
                      </td>
                      <td>
                        Antig??edad: <b> <u> '.$doc['antiguedad'].' </u> </b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Fecha de Renuncia: <b> <u> '.$doc['FRenuncia'].' </u> </b>
                      </td>
                      <td>
                        Fecha de Baja IMSS: <b> <u> '.$doc['FBajaIMSS'].' </u> </b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Horario de trabajo: <b> <u> '.$horadeTrabajo.'</u> </b>
                      </td>
                      <td>
                        D??a de descanso: <b> <u> '.$doc['FDescanso'].' </u> </b>
                      </td>
                    </tr>
                  </table>
                  <p style="font-size: 15px;"> Prestaciones Devengadas Adeudadas: </p>
                  <p style="font-size: 13px; line-height:30px;"> '.$doc['Prestaciones'].' </p>
                  <br>
                  <p style="font-size: 13px;"> Para lo cual anexamos los siguientes documentos que avalan dicha baja: </p>
                  <table style="border: 1px solid #000000;">
                    <tr style=" background-color: #a8a8a8;">
                      <th> DOCUMENTO </th>
                      <th> ENVIADO Si </th>
                      <th> ENVIADO No </th>
                    </tr>
                    <tr>
                      <td style="border: 1px solid #000000;">
                        <ul>
                          <li> Copia de Aviso de baja en el IMSS </li>
                        </ul>
                      </td>
                      <td style="border: 1px solid #000000;">
                        <center> <b> '.$imsssi.' </b> </center>
                      </td>
                      <td style="border: 1px solid #000000;">
                        <center> <<b> '.$imssno.' </b> </center>
                        </td>
                    </tr>
                    <tr>
                      <td style="border: 1px solid #000000;">
                        <ul>
                          <li> Copia de renuncia </li>
                        </ul>
                      </td>
                      <td style="border: 1px solid #000000;">
                        <center> <b> '.$renunciasi.' </b> </center>
                      </td>
                      <td style="border: 1px solid #000000;">
                        <center> <b> '.$renunciano.' </b> </center>
                      </td>
                    </tr>
                  </table>
                  <p style="font-size: 12px;"> Sin m??s por el momento, quedamos de ustedes como siempre. </p>
                  <br>
                  <center> A t e n t a m e n t e: </center>
                  <br><br><br><br><br>
                  <table>
                    <tr>
                      <td>
                      <span>
                        _______________________________ <br>
                        <center> <b> RECURSOS HUMANOS <br> '.$rh -> APaterno." ".$rh -> AMaterno." ".$rh -> Nombre.' </b> </center>
                      </span>
                      </td>
                      <td>
                      <span>
                        _______________________________ <br>
                        <center> <b> CONTRALOR??A <br> '.$ct.' </b> </center>
                      </span>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </center>
        </body>
      </html>';
      $generarPDF = new  Dompdf();
      $filename =  $doc['NumEmp'];
      // $generarPDF -> set_option("isPhpEnabled", true);
      $generarPDF -> loadHtml ($txtbody);
      // (Opcional) Configure el tama??o y la orientaci??n del papel
      $generarPDF -> setPaper ( ' A4 ' , ' landscape ' );
      // Renderiza el HTML como PDF
      $generarPDF -> render ();
      // obtener el PDF generado
      $crearPDF = $generarPDF -> output();
      //Enviar el PDF generado al navegador
      $salidaPDF = $generarPDF -> stream ('Finiquito_'.$filename);
    }
    // --------------- docuemnto de baja iMSS --------------- //
    public function GenerarBajaIMSS_($doc = NULL, $fechaActual = NULL, $home = NULL, $rh = NULL){
      echo "<pre>";
      print_r($doc);
      echo "<br>";
      print_r($fechaActual);
      echo "<br>";
      print_r($home);
      echo "<br>";
      print_r($rh);
      echo "</pre>";
      die();
      if ($rh -> APaterno == "TOSTADO") {
        $ct = "MONICA";
      }else {
        $ct = "RUPERTO";
      }
      if ($doc['turno'] == "MATUTINO") {
        $horadeTrabajo = "08:00 - 14:00";
      }elseif ($doc['turno'] == "VESPERTINO") {
        $horadeTrabajo = "14:00 - 20:00";
      }elseif ($doc['turno'] == "MIXTO") {
        $horadeTrabajo = "09:00 - 19:00";
      }else {
        $horadeTrabajo = "24 x 24";
      }
      $prestaciones = preg_split("/[\s,]+/", $doc['Prestaciones']);
      $txtbody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
        <head>
          <title></title>
        </head>
        <style media="screen">
        </style>
        <body>
          <center>
            <table style="width: 100%; text-align: justify; font-family: Arial, Helvetica, sans-serif; margin-left: 30px; margin-right: 30px;">
              <tr>
                <td>
                </td>
              </tr>
            </table>
          </center>
        </body>
      </html>';
      $generarPDF = new  Dompdf();
      $filename =  $doc['NumEmp'];
      // $generarPDF -> set_option("isPhpEnabled", true);
      $generarPDF -> loadHtml ($txtbody);
      // (Opcional) Configure el tama??o y la orientaci??n del papel
      $generarPDF -> setPaper ( ' A4 ' , ' landscape ' );
      // Renderiza el HTML como PDF
      $generarPDF -> render ();
      // obtener el PDF generado
      $crearPDF = $generarPDF -> output();
      //Enviar el PDF generado al navegador
      $salidaPDF = $generarPDF -> stream ('Baja_Seguro_Social_'.$filename);
    }
    // --------------- docuemnto de acta administrativa --------------- //
    public function generate_administrative_act($library_administrative_act_generator = NULL){
      if ($library_administrative_act_generator['tbl_em'] -> ruta_em == "apci") {
        $library_img_company = "./images/Logos/ERP_logo_APCI_2.webp";
      } elseif ($library_administrative_act_generator['tbl_em'] -> ruta_em == "aemi") {
        $library_img_company = "./images/Logos/ERP_logo_CAEMI.webp";
      } elseif ($library_administrative_act_generator['tbl_em'] -> ruta_em == "tele-viales") {
        $library_img_company = "./images/Logos/ERP_logo_TV.webp";
      } elseif ($library_administrative_act_generator['tbl_em'] -> ruta_em == "rheo") {
        $library_img_company = "./images/Logos/ERP_logo_RHEO.webp";
      } elseif ($library_administrative_act_generator['tbl_em'] -> ruta_em == "sassper") {
        $library_img_company = "./images/Logos/ERP_logo_CI.webp";
      }
      else {
        $library_img_company = "./images/Logos/ERP_logo_RHEO.webp";
      }
      if ($library_administrative_act_generator['user'] == "VJrheo" || $library_administrative_act_generator['user'] == "VBrheo") { // el usuario es diferente a valeria o a vianey
        $library_rrhh = "JUAREZ G??MEZ VALERIA XANAT";
        $library_company_location = 'En el<span style="font-weight: bold"> Estado de M??xico, </span>';
        $library_company_address = "Vialidad Mexiquense Mza: 8 Lt: 23 n??mero 1, Col. Fraccionamiento los Portales Tultutlan, C.P. 54910, Edo. de M??xico,";
      }
      else { // el usuario es de valeria
        $library_rrhh = "TOSTADO TORRES DIANA KAREN";
        $library_company_location = 'En la<span style="font-weight: bold"> Ciudad de M??xico, </span>';
        $library_company_address = "Resina 285 Interior C, Col. Granjas M??xico, C.P. 08400, Del. Iztacalco,";
      }
      if ($library_img_company == "./images/Logos/ERP_logo_CAEMI.webp") { // validamos el ancho de la imagen para CAEMI
        $library_width = "80px";
      }
      else { // la empresa es otra
        $library_width = "150px";
      }
      $txtbody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
        <head>
          <title></title>
        </head>
        <body>
          <table style="width: 100%;">
            <tr>
              <td style="width: 50%">
                <img style="margin-left: 50px;" src="./images/Logos/ERP_logo_RHEO.webp" alt="AP-Consultoria-Integral-ERP" width="150px">
              </td>
              <td style="width: 50%;">
              <img style="margin-left: 170px;" src="'.$library_img_company.'" alt="AP-Consultoria-Integral-ERP" width="'.$library_width.'">
              </td>
            </tr>
          </table>
          <table style="width: 100%">
            <tr>
              <td style="width: 100%">
                <p style="text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 20px; text-transform: uppercase; font-weight: bold"> ACTA ADMINISTRATIVA </p>
                <p style="text-align: justify; font-family: Arial, Helvetica, sans-serif; font-size: 13px;"> '.$library_company_location.'siendo las '.$library_administrative_act_generator["hora_actual"].' horas, del d??a '.$library_administrative_act_generator["fecha_actual"].', reunidos en las oficinas de <span style="font-weight: bold"> RH EFICACIA ORGANIZACIONAL, S DE RL DE CV </span> ubicadas en <span style="font-weight: bold">'.$library_company_address.'</span> se re??nen la C. '.$library_rrhh.' responsable de Recursos Humanos, el C. '.$library_administrative_act_generator["tbl_em"] -> jefe_inmediato_em.',
                responsable de '.$library_administrative_act_generator["tbl_em"] -> empresa_em.', quienes act??an como testigos se procedi?? a instrumentar la presente acta en contra del C. '
                .$library_administrative_act_generator["tbl_e"] -> apellido_paterno_e." ".$library_administrative_act_generator["tbl_e"] -> apellido_materno_e." ".trim($library_administrative_act_generator["tbl_e"] -> nombre_e).', quien tiene el puesto de '.trim($library_administrative_act_generator["tbl_e"] -> puesto_pue).'.</p>
              </td>
            </tr>
          </table>
          <table style="width: 100%">
            <tr>
              <td style="width: 100%">
                <p style="text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 20px; text-transform: uppercase; font-weight: bold"> HECHOS </p>
                <p style="text-align: justify; font-family: Arial, Helvetica, sans-serif; font-size: 13px;"> Asimismo se hace constar que el motivo de la presente es por virtud de que: '.strtolower(trim($library_administrative_act_generator['motivo_RRHH'])).' </p>
                <p style="text-align: justify; font-family: Arial, Helvetica, sans-serif; font-size: 13px;"> En este acto se le solicita al C. '.$library_administrative_act_generator["tbl_e"] -> apellido_paterno_e." ".$library_administrative_act_generator["tbl_e"] -> apellido_materno_e." ".trim($library_administrative_act_generator["tbl_e"] -> nombre_e).', que de una aclaraci??n sobre los hechos narrados en el presente documento, por lo cual se le concede el uso de la voz a lo que manifiesta con su pu??o y letra, bajo protesta de decir verdad que: </p>
                <br> <br> <br> <br>
                <p style="text-align: justify; font-family: Arial, Helvetica, sans-serif; font-size: 13px;"> Con lo anterior se da por terminada la presente acta administrativa siendo las '.$library_administrative_act_generator["hora_actual"].' horas, del d??a '.$library_administrative_act_generator["fecha_actual"].', ante la presencia de las personas que en ella intervinieron y quisieron hacerlo, ratificando la presente acta administrativa en todos sus puntos y contenido, por lo que se hace constar que se le dio participaci??n al trabajador investigado, el cual en compa????a de los que intervinieron en la misma, firman de entera conformidad. </p>
              </td>
            </tr>
          </table>
          <br> <br>
          <table style="text-align: center">
            <tr>
              <td valign="top" style="width: 50%">
              <p style="font-family: Arial, Helvetica, sans-serif; margin-left: 40px; font-size: 13px;"> _________________________________ <br> <b> '.$library_administrative_act_generator['tbl_e'] -> apellido_paterno_e.' '.$library_administrative_act_generator['tbl_e'] -> apellido_materno_e.' '.$library_administrative_act_generator['tbl_e'] -> nombre_e.' </b> <br> '.strtolower(trim($library_administrative_act_generator["tbl_e"] -> puesto_pue)).' </p>
              </td>
              <td valign="top" style="width: 50%">
              <p style="font-family: Arial, Helvetica, sans-serif; width: 60%; margin-left: 130px; font-size: 13px"> _________________________________ <br> <b> '.$library_rrhh.' </b> <br> Recursos Humanos </p>
            </td>
          </tr>
        </table>
        <br>
        <table style="text-align: center">
          <tr>
            <td valign="top" style="width: 100%">
            <p style="font-family: Arial, Helvetica, sans-serif; width: 60%; margin-left: 220px; font-size: 13px"> _________________________________ <br> <b> '.$library_administrative_act_generator["tbl_em"] -> jefe_inmediato_em.' </b> <br> Responsable de ??rea </p>
            </td>
        </tr>
      </table>
        </body>
      </html>';
      // echo "<pre>"; print_r($txtbody); echo "</pre>"; die();
      $generarPDF = new Dompdf();
      // $generarPDF -> set_option("DOMPDF_ENABLE_REMOTE", true);
      $filename = $library_administrative_act_generator['tbl_e'] -> numero_empleado_e;
      // $generarPDF -> set_option("isPhpEnabled", true);
      $generarPDF -> loadHtml($txtbody);
      // (Opcional) Configure el tama??o y la orientaci??n del papel
      $generarPDF -> setPaper(' A4 ' , ' landscape ');
      // Renderiza el HTML como PDF
      $generarPDF -> render();
      // obtener el PDF generado
      $crearPDF = $generarPDF -> output();
      //Enviar el PDF generado al navegador
      $salidaPDF = $generarPDF -> stream ('administrative_act-'.$filename);
    }
    // --------------- docuemnto de expediente --------------- //
    public function generate_case_files($library_case_files_generator = NULL) {
      // echo "<pre>"; print_r($library_case_files_generator); echo "</pre>"; die();
      $library_url = './dcs/case-files/'.$library_case_files_generator['tbl_em'] -> ruta_em.'/'.$library_case_files_generator['tbl_ex'] -> numero_empleado_e.'/';
      $library_cv = $library_url.$library_case_files_generator['tbl_ex'] -> curriculum_ex;
      $library_acta = $library_url.$library_case_files_generator['tbl_ex'] -> acta_ex;
      $library_ine = $library_url.$library_case_files_generator['tbl_ex'] -> ine_ex;
      $library_estudios = $library_url.$library_case_files_generator['tbl_ex'] -> estudios_ex;
      $library_domicilio = $library_url.$library_case_files_generator['tbl_ex'] -> domicilio_ex;
      $library_seguro_social = $library_url.$library_case_files_generator['tbl_ex'] -> seguro_social_ex;
      if ($library_case_files_generator['tbl_ex'] -> carta1_ex != "sin imagen") {
        $library_carta1 = $library_url.$library_case_files_generator['tbl_ex'] -> carta1_ex;
      }
      else {
        $library_carta1 = "";
      }
      if ($library_case_files_generator['tbl_ex'] -> carta2_ex != "sin imagen") {
        $library_carta2 = $library_url.$library_case_files_generator['tbl_ex'] -> carta2_ex;
      }
      else {
        $library_carta2 = "";
      }
      if ($library_case_files_generator['tbl_ex'] -> fotos_ex != "sin imagen") {
        $library_fotos = $library_url.$library_case_files_generator['tbl_ex'] -> fotos_ex;
      }
      else {
        $library_fotos = "";
      }
      $library_rfc = $library_url.$library_case_files_generator['tbl_ex'] -> rfc_ex;
      $library_cuenta = $library_url.$library_case_files_generator['tbl_ex'] -> cuenta_ex;
      $txtbody = '<html>
        <body>
          <table style="width: 100%;">
            <tbody>
              <tr>
                <td style="width: 100%">
                  <table>
                    <tr>
                      <td>
                        <img src="'.$library_cv.'" alt="AP-Consultoria-Integral-ERP" width="720px" height="930px">
                      </td>
                    </tr>
                  </table>
                  <div style="page-break-before: always;"></div>
                  <table>
                    <tr>
                      <td>
                        <img src="'.$library_acta.'" alt="AP-Consultoria-Integral-ERP" width="720px" height="930px">
                      </td>
                    </tr>
                  </table>
                  <div style="page-break-before: always;"></div>
                  <table>
                    <tr>
                      <td>
                        <img src="'.$library_ine.'" alt="AP-Consultoria-Integral-ERP" width="720px" height="930px">
                      </td>
                    </tr>
                  </table>
                  <div style="page-break-before: always;"></div>
                  <table>
                    <tr>
                      <td>
                        <img src="'.$library_estudios.'" alt="AP-Consultoria-Integral-ERP" width="720px" height="930px">
                      </td>
                    </tr>
                  </table>
                  <div style="page-break-before: always;"></div>
                  <table>
                    <tr>
                      <td>
                        <img src="'.$library_domicilio.'" alt="AP-Consultoria-Integral-ERP" width="720px" height="930px">
                      </td>
                    </tr>
                  </table>
                  <div style="page-break-before: always;"></div>
                  <table>
                    <tr>
                      <td>
                        <img src="'.$library_seguro_social.'" alt="AP-Consultoria-Integral-ERP" width="720px" height="930px">
                      </td>
                    </tr>
                  </table>
                  <div style="page-break-before: always;"></div>
                  <table>
                    <tr>
                      <td>
                        <img src="'.$library_carta1.'" alt="AP-Consultoria-Integral-ERP" width="720px" height="930px">
                      </td>
                    </tr>
                  </table>
                  <div style="page-break-before: always;"></div>
                  <table>
                    <tr>
                      <td>
                        <img src="'.$library_carta2.'" alt="AP-Consultoria-Integral-ERP" width="720px" height="930px">
                      </td>
                    </tr>
                  </table>
                  <div style="page-break-before: always;"></div>
                  <table>
                    <tr>
                      <td>
                        <img src="'.$library_fotos.'" alt="AP-Consultoria-Integral-ERP" width="720px" height="930px">
                      </td>
                    </tr>
                  </table>
                  <div style="page-break-before: always;"></div>
                  <table>
                    <tr>
                      <td>
                        <img src="'.$library_rfc.'" alt="AP-Consultoria-Integral-ERP" width="720px" height="930px">
                      </td>
                    </tr>
                  </table>
                  <div style="page-break-before: always;"></div>
                  <table>
                    <tr>
                      <td>
                        <img src="'.$library_cuenta.'" alt="AP-Consultoria-Integral-ERP" width="720px" height="930px">
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </body>
      </html>';
      // echo "<pre>"; print_r($txtbody); echo "</pre>"; die();
      $generarPDF = new Dompdf();
      // $generarPDF -> set_option("DOMPDF_ENABLE_REMOTE", true);
      $filename = $library_case_files_generator['tbl_ex'] -> numero_empleado_e;
      // $generarPDF -> set_option("isPhpEnabled", true);
      $generarPDF -> loadHtml($txtbody);
      // (Opcional) Configure el tama??o y la orientaci??n del papel
      $generarPDF -> setPaper(' A4 ' , ' landscape ');
      // Renderiza el HTML como PDF
      $generarPDF -> render();
      // obtener el PDF generado
      $crearPDF = $generarPDF -> output();
      //Enviar el PDF generado al navegador
      $salidaPDF = $generarPDF -> stream ('case_file-'.$filename);
    }

    // --------------- formato de evaluaci??n --------------- //
    public function generate_evaluation($library_evaluacion = NULL){
      $txtbody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
      <head>
      <title></title>
      </head>
      <style media="screen">
      table{
        table-layout: fixed;
        width: 100%;
        height: auto;
        text-align: justify;
        font-family: Arial, Helvetica, sans-serif;
      }
      </style>
      <body>
      <center>
      <table>
      <tr>
      <td>
      <table>
      <tr>
      <td style="width: 30%">
      <center>
      <img src="https://www.erp.apci.com.mx/images/Logos/ERP_logo_RHEO.webp" alt="Recursos Humanos Eficacia Organizacional" width="150px">
      </center>
      </td>
      <td style="width: 70%">
      <center>
      <span style="text-transform: uppercase; font-size: 12px;"> <b> FORMATO DE EVALUACION DE DESEMPE??O LABORAL </b> </span>
      </center>
      </td>
      </tr>
      </table>
      <table>
      <tr>
      <td style="width: 80%">
      <table>
      <tr>
      <td style="width: 50%">
      <span style="text-transform: uppercase; text-align: left; font-size: 10px;"> <b> Nombre: </b> '.$library_evaluacion['tbl_e'] -> apellido_paterno_e.' '.$library_evaluacion['tbl_e'] -> apellido_materno_e.' '.$library_evaluacion['tbl_e'] -> nombre_e.' </span>
      </td>
      <td style="width: 50%">
      <span style="text-transform: uppercase; text-align: left; font-size: 10px;"> <b> Depto: </b> '.$library_evaluacion['tbl_a'] -> area_a.' </span>
      </td>
      </tr>
      <tr>
      <td style="width: 50%">
        <span style="text-transform: uppercase; text-align: left; font-size: 10px;"> <b> puesto: </b> '.$library_evaluacion['tbl_pue'] -> puesto_pue.' </span>
      </td>
      <td style="width: 50%">
        <span style="text-transform: uppercase; text-align: left; font-size: 10px;"> <b> fecha de ingreso: </b> '.$library_evaluacion['tbl_e'] -> fecha_ingreso_e.' </span>
      </td>
    </tr>
    <tr>
      <td style="width: 50%">
        <span style="text-transform: uppercase; text-align: left; font-size: 10px;"> <b> fecha de evaluaci??n: </b> '.$library_evaluacion['tbl_ev'] -> fecha_evaluacion_ev.' </span>
      </td>
      <td style="width: 50%">
        <span style="text-transform: uppercase; text-align: left; font-size: 10px;"> <b> evaluador: </b> '.$library_evaluacion['tbl_em'] -> jefe_inmediato_em.' </span>
      </td>
    </tr>
  </table>
</td>
<td style=" width: 10%; text-transform: uppercase; text-align: center; padding: 10px; font-size: 10px; font-weight: bold" valign="top">
  <center>
    calificaci??n Total <br> <br>
    <span style="font-size: 13px;"> '.$library_evaluacion['tbl_ev'] -> calificacion_ev.' </span>
  </center>
</td>
</tr>
</table>
<table>
  <tr>
    <td style="width: 90%; text-transform: uppercase; text-align: left; font-size: 10px; font-weight: bold;">
      Competencias Personales
    </td>
    <td style=" width: 10%; text-transform: uppercase; text-align: center; font-size: 10px; font-weight: bold" valign="top">
      <center> calificaci??n </center>
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Comunicaci??n: </b> Capacidad para intercambiar puntos de vista, opiniones o cualquier otro tipo de informaci??n de manera clara y efectiva.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> comunicacion_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Tolerancia a la frustraci??n: </b> Capacidad para mantener una conducta efectiva al enfrentar situaciones cambiantes, dificultades o inconvenientes, pese a que las medidas adoptadas por otros sean contrarias a su sentir.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> tolerancia_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Autocontrol: </b> Capacidad para dominar y orientar de manera pertinente y en favor de las necesidades de la Instituci??n, sentimientos y emociones.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> autocontrol_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Motivaci??n: </b> Disposici??n general para participar en las tareas que le son encomendadas.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> motivacion_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Adaptabilidad: </b> Capacidad para comportarse efectivamente en nuevos contextos de desempe??o.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> adaptacion_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Seguridad: </b> Confianza en s?? mismo para realizar actividades y resolver problemas con la certeza de ser capaz de enfrentar posibles dificultades.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> seguridad_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Creatividad: </b> Capacidad para proponer y emprender alternativas pertinentes para hacer m??s eficiente el propio trabajo y el de otros.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> creatividad_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Cooperaci??n: </b> Disponibilidad para trabajar en equipo y comprometerse con las responsabilidades y en las tareas que se deriven de ello.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> cooperacion_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Apego a normas: </b> Capacidad para entender y cumplir sus obligaciones como '.$library_evaluacion['tbl_pue'] -> puesto_pue.' en concordancia con la normatividad y reglamentos aplicables.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> normas_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Visi??n Comunitaria: </b> Disposici??n para tomar decisiones pertinentes con base en el an??lisis de creencias, pr??cticas y necesidades de la Comunidad.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> vision_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-transform: uppercase; text-align: left; font-size: 10px; font-weight: bold;">
      Competencias Laborales
    </td>
    <td style=" width: 10%; text-transform: uppercase; text-align: center; font-size: 10px; font-weight: bold" valign="top">
      <center> calificaci??n </center>
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Planeaci??n: </b> Capacidad para definir rutas apropiadas de acci??n en correspondencia con las rutinas y  retos enfrentados.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> planeacion_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Organizaci??n: </b> Capacidad para estructurar anticipadamente procesos y tareas en general, con base en sus interrelaciones, disponi??ndolos de acuerdo con criterios de efectividad.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> organizacional_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Seguimiento de instrucciones: </b> Capacidad de dar cumplimiento a las disposiciones operativas definidas por los superiores jer??rquicos, con el fin de contribuir al cumplimiento de objetivos institucionales aunque ??stos se opongan al  punto de vista personal.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> seguimiento_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Liderazgo: </b> Habilidad para integrar y orientar acciones y puntos de vista de los dem??s, favoreciendo la apropiaci??n y cumplimiento grupal de objetivos institucionales.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> liderazgo_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Responsabilidad: </b> Capacidad para hacerse cargo de actividades y asumir las consecuencias positivas o negativas derivadas de las acciones ejecutadas.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> responsabilidad_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Ejecuci??n simult??nea: </b> Capacidad para desempe??arse efectivamente en diversas tareas y proyectos cumpliendo con los objetivos de todas ellas.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> ejecucion_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Confiabilidad: </b> Grado de confianza que una persona muestra por su conducta y actuar en tareas desempe??adas.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> confiabilidad_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Responsabilidad social: </b> Capacidad para aceptar el impacto positivo y/o negativo de la propia conducta en la sociedad.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> social_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Manejo de conflictos: </b> Capacidad para entender y resolver apropiadamente problemas vinculados con su ejercicio laboral o, en su caso, minimizar su impacto a efecto de dar cumplimiento a los objetivos institucionales.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> manejo_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Rendimiento bajo presi??n: </b> Capacidad para cumplir con los objetivos institucionales pese a realizar sus tareas laborales en condiciones potencialmente estresantes.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> rendimiento_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Trabajo en equipo: </b> Capacidad para integrarse cordial y efectivamente en tareas conjuntas con sus compa??eros de trabajo, a efecto de cumplir con objetivos institucionales.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> trabajo_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Asertividad: </b> Capacidad para expresar sus convicciones, necesidades y puntos de vista, sin agredir ni someterse, en virtud de las caracter??sticas del contexto en que se desempe??a.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> asertividad_ev.'
    </td>
  </tr>
  <tr>
    <td style="width: 90%; text-align: justify; font-size: 10px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <b> Empuje: </b> Capacidad para mantener en un nivel promedio el vigor y ritmo de trabajo para dar cumplimiento a criterios de logro institucionales.
    </td>
    <td style="width: 10%; text-align: center; font-size: 10px; border: 1px solid #000000; text-transform: uppercase; font-weight: bold;">
      '.$library_evaluacion['tbl_ev'] -> empuje_ev.'
    </td>
  </tr>
  <tr>
    <td colspan="2" style="text-align: justify; font-size: 13px; border: 1px solid #000000; padding: 2px 10px 2px;">
      <center> <b> COMENTARIOS </b> </center> <br> '.$library_evaluacion['tbl_ev'] -> comentarios_ev.'
    </td>
  </tr>
</table>
<table style="margin-top: 10px;">
  <tr>
    <td colspan="2">
      <center>
        <p style="font-size: 13px;"> _________________________________________ <br> <b> '.$library_evaluacion['tbl_e'] -> apellido_paterno_e.' '.$library_evaluacion['tbl_e'] -> apellido_materno_e.' '.$library_evaluacion['tbl_e'] -> nombre_e.' </b> </p>
      </center>
    </td>
  </tr>
</table>
</td>
</tr>
</table>
</center>
</body>
</html>';
// print_r($txtbody); die();
$generarPDF = new Dompdf();
$filename = $library_evaluacion['tbl_ev'] -> codigo_ev;
// $generarPDF -> set_option("isPhpEnabled", true);
$generarPDF -> loadHtml($txtbody);
// (Opcional) Configure el tama??o y la orientaci??n del papel
$generarPDF -> setPaper(' A4 ' , ' landscape ');
// Renderiza el HTML como PDF
$generarPDF -> render();
// obtener el PDF generado
$crearPDF = $generarPDF -> output();
//Enviar el PDF generado al navegador
$salidaPDF = $generarPDF -> stream ('Evaluaci??n_'.$filename);
}
  // --------------- contrato temporal --------------- //
  public function contract_generator($data){
    if ($data['tbl_e'] -> turno_e == 1) {
      $controller_hora_trabajo = "08:00 a las 14:00";
    }elseif ($data['tbl_e'] -> turno_e == 2) {
      $controller_hora_trabajo = "14:00 a las 20:00";
    }elseif ($data['tbl_e'] -> turno_e == 3) {
      $controller_hora_trabajo = "09:00 a las 19:00";
    }else {
      $controller_hora_trabajo = "24 x 24";
    }
    $txtbody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
        <head>
          <title></title>
        </head>
        <style media="screen">
        </style>
        <body>
          <center>
            <table style="width: 100%; text-align: justify;">
              <tr>
                <td style="width: 100%">
                  <p> <center> <b> CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO DETERMINADO </b> </center> </p>
                  <p> QUE CELEBRAN POR UNA PARTE <b> RH EFICACIA ORGANIZACIONAL, S DE RL DE CV.</b>,  REPRESENTADA EN ESTE ACTO POR EL <b> C. ARMANDO JAVIER FLORES SOTO </b>, A QUIEN  DESIGNAREMOS COMO <b> ???EL PATR??N??? </b>, Y POR LA OTRA EL C. <b> '.$data['tbl_e'] -> apellido_paterno_e.' '.$data['tbl_e'] -> apellido_materno_e.' '.$data['tbl_e'] -> nombre_e.' </b> QUIEN NOMBRAREMOS COMO <b> ???EL TRABAJADOR??? </b>, MISMO QUE SUJETAN AL TENOR DE LOS SIGUIENTES:</p>
                  <p> <center> <b> D E C L A R A C I O N E S </b> </center> </p>
                  <p> <b> 1.- </b> Declara <b> ???EL PATR??N??? </b> por conducto de su representante legal: </p>
                  <p> <b> 1.1.- </b> Que su representada es una sociedad mercantil constituida conforme a las leyes de los Estados Unidos Mexicanos, mediante Escritura P??blica n??mero veintid??s mil trescientos setenta, de fecha 12 de septiembre del a??o dos mil dieciocho, pasada ante la fe del C. Licenciado Roberto Garay Gonz??lez, Notario P??blico N??mero sesenta y ocho en la Ciudad de Oaxaca de Ju??rez del estado de Oaxaca, cuyo Protocolizaci??n del Acta de Asamblea General Extraordinaria qued??      inscrito en Registro P??blico de la Propiedad y de Comercio con el folio mercantil electr??nico n??mero 30513, con fecha diecis??is de Enero de 2018. </p>
                  <p> <b> 1.2.- </b> Que dentro del objeto social de su representada se encuentra, entre otros, el de contrataci??n de personal humano en administraci??n,  siendo  responsable de la fuente de trabajo ubicada en  la Calle Resina 285 Interior C, Col. Granjas M??xico, Del. Iztacalco, C.P. 08400, Ciudad de M??xico. </p>
                  <p> <b> 1.3.- </b> Que para llevar a cabo el objeto social de su mandante, requiere de la contrataci??n de personal, especialmente en el ??rea de '.$data["tbl_e"] -> puesto_pue.'. </p>
                  <p> <b> 2.- </b> Declara <b> ???EL TRABAJADOR??? </b> por su propio derecho y de forma expresa: </p>
                  <p> <b> 2.1.- </b> Que responde al nombre de <b> '.$data['tbl_e'] -> apellido_paterno_e.' '.$data['tbl_e'] -> apellido_materno_e.' '.$data['tbl_e'] -> nombre_e.'</b>, Es una persona f??sica de nacionalidad <b> MEXICANA </b> por nacimiento, de <b> '.$data['tbl_e'] -> edad_e.' </b> a??os de edad, tiene la capacidad jur??dica para contratar y obligarse en este tipo de actos, quien tiene su domicilio en la calle '.$data['tbl_e'] -> calle_e.', <b> '.$data['tbl_e'] -> numero_exterior_e.' '.$data['tbl_e'] -> numero_interior_e.'</b>,  Col. <b> '.$data['tbl_e'] -> colonia_e.'</b>,  en <b> '.$data['tbl_e'] -> municipio_e.'; </b> con N??mero de Seguridad Social <b> '.$data['tbl_e'] -> imss_e.'</b>, CLAVE ??nica de Registro de Poblaci??n (CURP) <b> '.$data['tbl_e'] -> curp_e.' </b> identific??ndose en este acto con su Credencial de Elector (INE) No.XXXXXXX y/o Pasaporte No XXXXXXXXX. </p>
                  <p> <b> 2.2.- </b> Que tiene la capacidad y aptitudes para desarrollar las actividades que requiere <b> ???EL PATR??N??? </b> y est?? conforme en desempe??arlas, de modo especial en el puesto o funciones operativas de call center. </p>
                  <p> Conforme a lo anteriormente manifestado, las partes que intervienen en sus diferentes calidades jur??dicas para la celebraci??n y suscripci??n del presente contrato individual de trabajo por tiempo determinado, las ratifican y establecen voluntariamente a otorgar lo que consignan en las siguientes: </p>
                  <p> <center> <b> C L A U S U L A S </b> </center> </p>
                  <p> <b> PRIMERA.- </b> Las partes que intervienen en este acto jur??dico se reconocen mutua y rec??procamente la personalidad con la que comparecen a la celebraci??n y suscripci??n del presente contrato, dado que bajo protesta de decir verdad, as?? lo manifestaron en las declaraciones precedentes y por raz??n de ello, otorgan sus expresos y respectivos consentimientos libres de cualquier vicio, mala fe, dolo, error, etc., en los t??rminos y condiciones que se establecen en las cl??usulas siguientes, por as?? convenir a los leg??timos intereses de los contratantes, en sus diferentes calidades jur??dicas, firmando este contrato al calce y al margen para constancia. </p>
                </td>
              </tr>
            </table>
            <table style="width: 100%; text-align: justify;">
              <tr>
                <td style="width: 100%">
                  <p> En consecuencia, <b> ???EL TRABAJADOR??? </b> se obliga a prestar un servicio personal subordinado y el <b> ???EL PATR??N??? </b> a pagar por esos servicios un salario. </p>
                  <p> <b> SEGUNDA.- </b> Ambas partes acuerdan de conformidad que el presente contrato ser?? por tiempo <b> DETERMINADO </b> sujet??ndolo a un  per??odo de <b> PRUEBA de 28 d??as </b> con <b> ???EL TRABAJADOR???</b>, de conformidad con lo dispuesto por el art??culo 35 de la Ley Federal del Trabajo, y el cual empezar?? a surtir efectos jur??dicos a partir del d??a <b> '.$data['fecha_ingreso'].'</b>, teniendo por terminada la relaci??n contractual el d??a <b> '.$data['fecha_termino'].' </b>, y  no podr?? de ninguna forma entenderse por prorrogado al t??rmino establecido si es que no media de por medio nuevo contrato por escrito. </p>
                  <p> <b> TERCERA.- ???EL TRABAJADOR??? </b> desempe??ar?? para <b> ???EL PATR??N??? </b> los servicios de <b> Ejecutivo de Ventas </b>, consistentes  en:  <b> <u> Realizar ventas via telefonica, con metas ya establecidas por el ???El  patr??n??? o sus representantes en su rol</u> </b> de quedando sujeto <b> A PRUEBA</b>, aceptando por s?? mismo en seguir las instrucciones  que reciba del <b> ???PATR??N??? </b> en relaci??n con la forma, lugar y tiempo en que deba desarrollar su trabajo, <b> en la inteligencia de que queda expresamente acordado que al t??rmino de la duraci??n del presente Contrato, el ???TRABAJADOR???   permanecer?? al servicio del ???PATR??N??? en caso de haber campa??as libres; en caso de rescindir el contrato con el Cliente de la campa??a a la que estuvo asignado, se rescindir?? del antes mencionado contrato, si a su Juicio y tomando en cuenta la opini??n de la Comisi??n Mixta de Productividad, Capacitaci??n y Adiestramiento,  lo considera apto para el desempe??o de dicha funci??n, pues, de lo contrario, el presente Contrato, se dar??, por terminado, asi como tambien sera motivo de rescision el no cumplir con las metas establecidas en el periodo que el ???PATRON??? lo estipule, sin responsabilidad alguna para las partes. </b> </p>
                  <p> <b> CUARTA.- ???EL TRABAJADOR??? El ???TRABAJADOR??? </b> se obliga a prestar sus servicios que se especifican en la cl??usula anterior, subordinado jur??dicamente al ???PATR??N???, en las oficinas del patr??n, o en cualquier lugar donde el patr??n desempe??e sus actividades. </p>
                  <p> Queda expresamente convenido que el trabajador <b> acatara en el desempe??o de su trabajo todas las disposiciones de las condiciones generales de trabajo, todas las ordenes, circulares y disposiciones que dicte el patr??n, representantes del mismo y los superiores jer??rquicos del trabajador, as?? como los ordenamientos legales que le sean aplicables. </b> </p>
                  <p> <b> QUINTA.- </b> Asimismo <b> ???LAS PARTES??? </b> convienen y el <b> ???TRABAJADOR??? </b> acepta que cuando por razones administrativas o de desarrollo de la actividad o prestaci??n de los servicios contratados haya necesidad de removerlo, podr?? trasladarse al lugar que <b> ???EL PATR??N??? </b> le asigne, siempre y cuando dicho movimiento no sea en menoscabo de su salario. </p>
                  <p> En este caso <b> ???EL PATR??N??? </b> le comunicar?? con anticipaci??n la remoci??n del lugar de prestaci??n de servicios indic??ndole el nuevo asignado. </p>
                  <p> Para el caso que en el nuevo lugar de prestaci??n de servicios que le fuera asignado variara el horario de labores, <b> ???EL TRABAJADOR??? </b> acepta dicha modalidad. </p>
                  <p> <b> SEXTA.-  ???EL TRABAJADOR??? </b> prestar?? sus servicios a <b> ???EL PATR??N??? </b> dentro de una jornada comprendida de Lunes a S??bado de '.$controller_hora_trabajo.' horas contando con un descanso de 30 minutos para comer; en la inteligencia que deber?? laborar m??ximo 48 horas como marca la Ley Federal de Trabajo. </p>
                  <p> <b> SEPTIMA.- ???EL TRABAJADOR??? </b> no podr?? laborar tiempo extraordinario, a menos de que <b> ???EL PATR??N??? </b> se lo ordene o se lo requiera previamente y por escrito. En caso contrario, de llegar a realizarlo, ser?? bajo su estricta responsabilidad y sin que pueda reclamar pago alguno por ese concepto. </p>
                </td>
              </tr>
            </table>
            <table style="width: 100%; text-align: justify;">
              <tr>
                <td style="width: 100%">
                  <p> <b> OCTAVA.- ???EL TRABAJADOR??? </b> recibir?? por la prestaci??n de sus servicios la cantidad de <b> $'.$data['tbl_e'] -> salario_mensual_neto_e.' ('.$data['salario'].') </b> mensuales, conformado con el salario m??nimo y otras prestaciones adicionales a trav??s  de Dep??sitos  en cuenta  bancaria  a nombre  del trabajador porque as?? se acuerda en el presente contrato quedando a cargo del <b> ???PATR??N??? </b> los gastos o costos que origine este medio de pago de conformidad con el art??culo 101 de la Ley Federal del Trabajo, de ser inh??bil el d??a de pago la fecha se aplicar?? el d??a h??bil inmediato anterior. </p>
                  <p> <b> NOVENA.- ???EL TRABAJADOR??? </b> recibir?? quincenalmente el pago de sus servicios mediante ???transferencia electr??nica??? ya incluye la proporci??n correspondiente a los s??ptimos d??as y d??as de descanso obligatorio, a su vez, <b> ???El Trabajador???</b>, cada vez que le sea pagado su salario, firmar?? el recibo correspondiente  a los salarios devengados, mismo que ser?? expedido por <b> ???El Patr??n??? </b> para tales fines. </p>
                  <p> <b> La cuenta bancaria ser?? emitida por la empresa con el banco de su preferencia</b>, tomando en cuenta el <b> ???Trabajador??? </b> que se sujeta a esta norma, de contar con cuenta del mismo banco, se respetara la cuenta que el trabajador proporciones, debiendo entregar al ???Patr??n???, a m??s tardar dos d??as despu??s de la firma del presente convenio de trabajo, toda la informaci??n necesaria de dicha cuenta as?? como una fotocopia legible del contrato firmado o estado de cuenta de la Instituci??n Bancaria. </p>
                  <p> <b> ???El Patr??n??? </b> har?? por cuenta de <b> ???El Trabajador??? </b> las deducciones legales correspondientes, particularmente las que se refieren a Impuesto sobre la Renta, y aportaciones de seguridad social (IMSS, Infonavit y SAR), efectuando las inscripciones correspondientes  ante dichas instituciones, en los t??rminos de las legislaciones respectivas. </p>
                  <p> <b> DECIMA.- ???EL TRABAJADOR??? </b> por cada seis d??as de trabajo, tendr?? derecho a uno de descanso semanal; as?? como a disfrutar de los d??as de descanso obligatorio establecidos en el art??culo 74 de la Ley Federal del Trabajo. </p>
                  <p> <b> DECIMA PRIMERA.- ???EL TRABAJADOR??? </b> disfrutar?? de seis d??as de vacaciones, e incrementara de acuerdo a la Ley Federal del Trabajo, as?? como del 25% veinticinco por ciento de prima vacacional. </p>
                  <p> <b> DECIMA SEGUNDA.- ???EL TRABAJADOR??? </b> tendr?? derecho a recibir por parte de <b> ???EL PATRON???</b>, antes del d??a 20 de Diciembre de cada a??o, el importe correspondiente a quince d??as de salario como pago del aguinaldo a que se refiere el art??culo 87 de la Ley, o su parte proporcional por fracci??n de a??o. </p>
                  <p> <b> DECIMA TERCERA.- ???EL TRABAJADOR???</b>, Se obliga a observar y respetar las disposiciones de este contrato y las condiciones generales de trabajo que rige a la Instituci??n. </p>
                  <p> <b> DECIMA CUARTA.- ???EL TRABAJADOR??? </b> deber?? observar y cumplir todo lo contenido en el Reglamento Interno de Trabajo. </p>
                  <p> <b> DECIMA QUINTA.- ???EL TRABAJADOR??? </b> acepta y por ende queda establecido que cuando por razones convenientes para <b> ???EL PATR??N??? </b> ??ste modifique el horario de trabajo, podr?? desempe??ar su jornada en el que quede establecido ya que sus actividades al servicio de <b> ???EL PATR??N??? </b> son prioritarias y no se contraponen a otras que pudiera desarrollar. </p>
                  <p> <b> DECIMA SEXTA.- ???EL TRABAJADOR??? </b> deber?? dar fiel cumplimiento a las disposiciones contenidas en el art??culo 134 de la Ley y que corresponden a las obligaciones de los trabajadores en el desempe??o de sus labores al servicio de ???EL PATR??N???. </p>
                </td>
              </tr>
            </table>
            <table style="width: 100%; text-align: justify;">
              <tr>
                <td style="width: 100%">
                  <p> <b> DECIMA SEPTIMA.- ???EL TRABAJADOR??? </b> deber?? presentarse puntualmente a sus labores en el horario de trabajo establecido y firmar las listas de asistencia acostumbradas. </p>
                  <p> En caso de retraso o falta de asistencia injustificada <b> ???EL PATR??N??? </b> podr?? imponerle cualquier correcci??n disciplinaria de las que conten??a el Reglamento Interior de Trabajo o de la Ley. </p>
                  <p> <b> DECIMA OCTAVA.- </b> Para todo lo no previsto en el presente <b> ???CONTRATO??? </b> se estar?? a lo contenido en la Ley Federal del Trabajo, Contrato Colectivo de Trabajo con que cuente el <b> ???PATR??N??? </b> o bien lo prescrito por la Ley o el Contrato Ley respectivo en su caso as?? como el reglamento Interior de Trabajo </p>
                  <p> Enteradas las partes del contenido y alcance de las estipulaciones del presente contrato, manifiesta su m??s entera conformidad y lo firman en la Ciudad de M??xico, DF a '.$data['fecha_actual'].'. </p>
                </td>
              </tr>
            </table>
            <br><br><br><br><br><br>
            <table style="text-align: center">
              <tr>
                <td valign="top">
                  <p> <b> EL TRABAJADOR </b> </p> <br><br><br><br>
                  <p> _________________________________ <br> <b> '.$data['tbl_e'] -> apellido_paterno_e.' '.$data['tbl_e'] -> apellido_materno_e.' '.$data['tbl_e'] -> nombre_e.' </b> </p>
                </td>
                <td valign="top">
                <p> <b> EL PATR??N </b> </p> <br><br><br><br>
                <p style="width: 60%; margin-left: 95px"> _________________________________ <br> <b> ARMANDO JAVIER FLORES <br> Representante legal de RH EFICACIA ORGANIZACIONAL, <br> S DE RL DE CV </b> </p>
              </td>
            </tr>
          </table>
        </center>
      </body>
    </html>';
    // echo "<pre>"; print_r($txtbody); echo "</pre>"; die();
    $generarPDF = new  Dompdf();
    $filename =  $data['tbl_e'] -> numero_empleado_e;
    // $generarPDF -> set_option("isPhpEnabled", true);
    $generarPDF -> loadHtml ($txtbody);
    // (Opcional) Configure el tama??o y la orientaci??n del papel
    $generarPDF -> setPaper ( ' A4 ' , ' landscape ' );
    // Renderiza el HTML como PDF
    $generarPDF -> render ();
    // obtener el PDF generado
    $crearPDF = $generarPDF -> output();
    //Enviar el PDF generado al navegador
    $salidaPDF = $generarPDF -> stream ('partial-contract-'.date('Y-m-d').'-'.$filename);
  }
}
