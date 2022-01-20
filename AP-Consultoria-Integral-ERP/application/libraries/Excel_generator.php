<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  class Excel_generator {
    public function index(){ }
    // --------------- GENERAR FORMATO PARA DAR DE ALTA AL EMPLEADO EN NOMINA --------------- //
    public function programaNomina($empleado = NULL){
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet -> getActiveSheet();
      $sheet -> setCellValue('A1', 'Código');
      $sheet -> setCellValue('A2', $empleado['empleado'] -> NumEmp);
      $sheet -> setCellValue('B1', 'ApePat');
      $sheet -> setCellValue('B2', $empleado['empleado'] -> ApellidoPEmp);
      $sheet -> setCellValue('C1', 'ApeMat');
      $sheet -> setCellValue('C2', $empleado['empleado'] -> ApellidoMEmp);
      $sheet -> setCellValue('D1', 'Nombres');
      $sheet -> setCellValue('D2', $empleado['empleado'] -> NomEmp);
      $sheet -> setCellValue('E1', 'Genero');
      $sheet -> setCellValue('E2', $empleado['empleado'] -> E_idGenero);
      $sheet -> setCellValue('F1', 'CURP');
      $sheet -> setCellValue('F2', $empleado['empleado'] -> CURPEmp);
      $sheet -> setCellValue('G1', 'RFC');
      $sheet -> setCellValue('G2', $empleado['empleado'] -> RFCEmp);
      $sheet -> setCellValue('H1', 'IMSS');
      $sheet -> setCellValue('H2', $empleado['empleado'] -> IMSSEmp);
      $sheet -> setCellValue('I1', 'NacFecha');
      $sheet -> setCellValue('I2', $empleado['empleado'] -> FNacimientoEmp);
      $sheet -> setCellValue('J1', 'NacEstadoCodigo');
      $sheet -> setCellValue('J2', $empleado['noestados'] -> Codigo);
      $sheet -> setCellValue('K1', 'IngresoFecha');
      $sheet -> setCellValue('K2', $empleado['empleado'] -> FIngresoEmp);
      $sheet -> setCellValue('L1', 'EmpresaCodigo');
      $sheet -> setCellValue('L2', $empleado['empleadonomina'] -> EmpresaCodigo);
      $sheet -> setCellValue('M1', 'RegPatronCodigo');
      $sheet -> setCellValue('M2', $empleado['empleadonomina'] -> RegPatronCodigo);
      $sheet -> setCellValue('N1', 'PuestoCodigo');
      $sheet -> setCellValue('N2', $empleado['nopuestos'] -> Codigo);
      $sheet -> setCellValue('O1', 'Nivel1Codigo');
      $sheet -> setCellValue('O2', $empleado['nodepartamento'] -> Codigo);
      $sheet -> setCellValue('P1', 'UbicacionCodigo');
      $sheet -> setCellValue('P2', $empleado['noubicaciones'] -> Codigo);
      $sheet -> setCellValue('Q1', 'TipoNominaCodigo');
      $sheet -> setCellValue('Q2', $empleado['nonomina'] -> Codigo);
      $sheet -> setCellValue('R1', 'TurnoCodigo');
      $sheet -> setCellValue('R2', $empleado['noturnos'] -> Codigo);
      $sheet -> setCellValue('S1', 'PaqueteCodigo');
      $sheet -> setCellValue('S2', $empleado['empleadonomina'] -> PaqueteCodigo);
      $sheet -> setCellValue('T1', 'Salario');
      $sheet -> setCellValue('T2', $empleado['empleado'] -> SalMenBEmp);
      $sheet -> setCellValue('U1', 'SalPerVar');
      $sheet -> setCellValue('U2', $empleado['empleadonomina'] -> SalPerVar);
      $sheet -> setCellValue('V1', 'SalInt');
      $sheet -> setCellValue('V2', $empleado['empleadonomina'] -> SalInt);
      $sheet -> setCellValue('W1', 'EmpCuenta');
      $sheet -> setCellValue('W2', $empleado['empleado'] -> NumCuentaEmp);
      $sheet -> setCellValue('X1', 'EmpPago');
      $sheet -> setCellValue('X2', $empleado['nopago'] -> Codigo);
      $sheet -> setCellValue('Y1', 'BancoID');
      $sheet -> setCellValue('Y2', $empleado['nobancos'] -> Codigo);
      $sheet -> setCellValue('Z1', 'PrestaLeyCodigo');
      $sheet -> setCellValue('Z2', $empleado['noprestaciones'] -> Codigo);
      $sheet -> setCellValue('AA1', 'EmpCheca');
      $sheet -> setCellValue('AA2', $empleado['empleadonomina'] -> EmpCheca);
      $writer = new Xlsx($spreadsheet);
      $filename = $empleado['empleado'] -> ApellidoPEmp.'-'.$empleado['empleado'] -> ApellidoMEmp.'-'.$empleado['empleado'] -> NumEmp;
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
      header('Cache-Control: max-age=0');
      $writer -> save('php://output');
      exit;
    }
    // --------------- reporte de empleados activos --------------- //
    public function active_employee_report($empleado = NULL){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet -> getActiveSheet();
        $sheet -> setCellValue('A1', 'Número de empleado');
        $total = count($empleado['tbl_e']);
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('A'.$add, $empleado['tbl_e'][$i] -> numero_empleado_e);
        }
        $sheet -> setCellValue('B1', 'Nombre(s)');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('B'.$add, $empleado['tbl_e'][$i] -> nombre_e);
        }
        $sheet -> setCellValue('C1', 'Apellido parterno');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('C'.$add, $empleado['tbl_e'][$i] -> apellido_paterno_e);
        }
        $sheet -> setCellValue('D1', 'Apellido materno');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('D'.$add, $empleado['tbl_e'][$i] -> apellido_materno_e);
        }
        $sheet -> setCellValue('E1', 'Clave de sexo');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          if ($empleado['tbl_e'][$i] -> sexo_e == 1) {
            $sheet -> setCellValue('E'.$add, 'M');
          }else {
            $sheet -> setCellValue('E'.$add, 'F');
          }
        }
        $sheet -> setCellValue('F1', 'Fecha de antiguedad');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('F'.$add, $empleado['tbl_e'][$i] -> fecha_ingreso_e);
        }
        $sheet -> setCellValue('G1', 'Fecha de nacimiento');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('G'.$add, $empleado['tbl_e'][$i] -> fecha_nacimiento_e);
        }
        $sheet -> setCellValue('H1', 'Edad');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('H'.$add, $empleado['tbl_e'][$i] -> edad_e);
        }
        $sheet -> setCellValue('I1', 'RFC');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('I'.$add, $empleado['tbl_e'][$i] -> rfc_e);
        }
        $sheet -> setCellValue('J1', 'CURP');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('J'.$add, $empleado['tbl_e'][$i] -> curp_e);
        }
        $sheet -> setCellValue('K1', 'IMSS');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('K'.$add, $empleado['tbl_e'][$i] -> imss_e);
        }
        $sheet -> setCellValue('L1', 'Departamento');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          foreach ($empleado['tbl_pue'] as $row) {
            if ($row -> id_pue == $empleado['tbl_e'][$i] -> puesto_e) {
              foreach ($empleado['tbl_a'] as $rowa) {
                if ($rowa -> id_a == $row -> area_pue ) {
                  $sheet -> setCellValue('L'.$add, $rowa -> area_a);
                }
              }
            }
          }
        }
        $sheet -> setCellValue('M1', 'Descr. Posición');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          foreach ($empleado['tbl_pue'] as $row) {
            if ($row -> id_pue == $empleado['tbl_e'][$i] -> puesto_e) {
              $sheet -> setCellValue('M'.$add, $row -> puesto_pue);
            }
          }
        }
        $sheet -> setCellValue('N1', 'Número de Cuenta');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('N'.$add, $empleado['tbl_e'][$i] -> numero_cuenta_e);
        }
        $sheet -> setCellValue('O1', 'Salario mensual bruto');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('O'.$add, $empleado['tbl_e'][$i] -> salario_mensual_bruto_e);
        }
        $sheet -> setCellValue('P1', 'Salario mensual neto');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('P'.$add, $empleado['tbl_e'][$i] -> salario_mensual_neto_e);
        }
        $sheet -> setCellValue('Q1', 'Otros ingresos');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('Q'.$add, $empleado['tbl_e'][$i] -> otros_ingresos_e);
        }
        $sheet -> setCellValue('R1', 'Salario diario');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('R'.$add, $empleado['tbl_e'][$i] -> salario_diario_e);
        }
        $sheet -> setCellValue('S1', 'Salario base de cotización');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('S'.$add, $empleado['tbl_e'][$i] -> salario_base_cotizacion_e);
        }
        $sheet -> setCellValue('T1', 'Domicilio calle');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('T'.$add, $empleado['tbl_e'][$i] -> calle_e);
        }
        $sheet -> setCellValue('U1', 'Número externo');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('U'.$add, $empleado['tbl_e'][$i] -> numero_exterior_e);
        }
        $sheet -> setCellValue('V1', 'Número interno');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('V'.$add, $empleado['tbl_e'][$i] -> numero_interior_e);
        }
        $sheet -> setCellValue('W1', 'Colonia');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('W'.$add, $empleado['tbl_e'][$i] -> colonia_e);
        }
        $sheet -> setCellValue('X1', 'Alcaldía o municipio');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('X'.$add, $empleado['tbl_e'][$i] -> municipio_e);
        }
        $sheet -> setCellValue('Y1', 'Código postal');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('Y'.$add, $empleado['tbl_e'][$i] -> cp_e);
        }
        $sheet -> setCellValue('Z1', 'Número de contacto');
        for ($i = 0; $i < $total; $i++) {
          $add = $i + 2;
          $sheet -> setCellValue('Z'.$add, $empleado['tbl_e'][$i] -> numero_casa_e);
        }
        // $sheet -> setCellValue('AA1', 'Correo');
        // for ($i = 0; $i < $total; $i++) {
        //   $add = $i + 2;
        //   $sheet -> setCellValue('AA'.$add, $empleado['tbl_e'][$i] -> email_e);
        // }
        $writer = new Xlsx($spreadsheet);
        $filename = $empleado['tbl_em'] -> ruta_em.'_Empleados_activos_hasta_hoy_'.date('Y-m-d');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer -> save('php://output');
        exit;
      }
    // --------------- reporte de empleados de baja --------------- //
    public function unsubscribe_employee_report($empleado = NULL){
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet -> getActiveSheet();
      $sheet -> setCellValue('A1', 'Número de empleado');
      $total = count($empleado['tbl_e']);
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('A'.$add, $empleado['tbl_e'][$i] -> numero_empleado_e);
      }
      $sheet -> setCellValue('B1', 'Nombre(s)');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('B'.$add, $empleado['tbl_e'][$i] -> nombre_e);
      }
      $sheet -> setCellValue('C1', 'Apellido parterno');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('C'.$add, $empleado['tbl_e'][$i] -> apellido_paterno_e);
      }
      $sheet -> setCellValue('D1', 'Apellido materno');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('D'.$add, $empleado['tbl_e'][$i] -> apellido_materno_e);
      }
      $sheet -> setCellValue('E1', 'Clave de sexo');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        if ($empleado['tbl_e'][$i] -> sexo_e == 1) {
          $sheet -> setCellValue('E'.$add, 'M');
        }else {
          $sheet -> setCellValue('E'.$add, 'F');
        }
      }
      $sheet -> setCellValue('F1', 'Fecha de antiguedad');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('F'.$add, $empleado['tbl_e'][$i] -> fecha_ingreso_e);
      }
      $sheet -> setCellValue('G1', 'Fecha de nacimiento');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('G'.$add, $empleado['tbl_e'][$i] -> fecha_nacimiento_e);
      }
      $sheet -> setCellValue('H1', 'Edad');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('H'.$add, $empleado['tbl_e'][$i] -> edad_e);
      }
      $sheet -> setCellValue('I1', 'RFC');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('I'.$add, $empleado['tbl_e'][$i] -> rfc_e);
      }
      $sheet -> setCellValue('J1', 'CURP');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('J'.$add, $empleado['tbl_e'][$i] -> curp_e);
      }
      $sheet -> setCellValue('K1', 'IMSS');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('K'.$add, $empleado['tbl_e'][$i] -> imss_e);
      }
      $sheet -> setCellValue('L1', 'Departamento');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        foreach ($empleado['tbl_pue'] as $row) {
          if ($row -> id_pue == $empleado['tbl_e'][$i] -> puesto_e) {
            foreach ($empleado['tbl_a'] as $rowa) {
              if ($rowa -> id_a == $row -> area_pue ) {
                $sheet -> setCellValue('L'.$add, $rowa -> area_a);
              }
            }
          }
        }
      }
      $sheet -> setCellValue('M1', 'Descr. Posición');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        foreach ($empleado['tbl_pue'] as $row) {
          if ($row -> id_pue == $empleado['tbl_e'][$i] -> puesto_e) {
            $sheet -> setCellValue('M'.$add, $row -> puesto_pue);
          }
        }
      }
      $sheet -> setCellValue('N1', 'Número de Cuenta');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('N'.$add, $empleado['tbl_e'][$i] -> numero_cuenta_e);
      }
      $sheet -> setCellValue('O1', 'Salario mensual bruto');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('O'.$add, $empleado['tbl_e'][$i] -> salario_mensual_bruto_e);
      }
      $sheet -> setCellValue('P1', 'Salario mensual neto');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('P'.$add, $empleado['tbl_e'][$i] -> salario_mensual_neto_e);
      }
      $sheet -> setCellValue('Q1', 'Otros ingresos');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('Q'.$add, $empleado['tbl_e'][$i] -> otros_ingresos_e);
      }
      $sheet -> setCellValue('R1', 'Salario diario');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('R'.$add, $empleado['tbl_e'][$i] -> salario_diario_e);
      }
      $sheet -> setCellValue('S1', 'Salario base de cotización');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('S'.$add, $empleado['tbl_e'][$i] -> salario_base_cotizacion_e);
      }
      $sheet -> setCellValue('T1', 'Domicilio calle');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('T'.$add, $empleado['tbl_e'][$i] -> calle_e);
      }
      $sheet -> setCellValue('U1', 'Número externo');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('U'.$add, $empleado['tbl_e'][$i] -> numero_exterior_e);
      }
      $sheet -> setCellValue('V1', 'Número interno');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('V'.$add, $empleado['tbl_e'][$i] -> numero_interior_e);
      }
      $sheet -> setCellValue('W1', 'Colonia');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('W'.$add, $empleado['tbl_e'][$i] -> colonia_e);
      }
      $sheet -> setCellValue('X1', 'Alcaldía o municipio');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('X'.$add, $empleado['tbl_e'][$i] -> municipio_e);
      }
      $sheet -> setCellValue('Y1', 'Código postal');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('Y'.$add, $empleado['tbl_e'][$i] -> cp_e);
      }
      $sheet -> setCellValue('Z1', 'Número de contacto');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('Z'.$add, $empleado['tbl_e'][$i] -> numero_casa_e);
      }
      $sheet -> setCellValue('AA1', 'Correo');
      for ($i = 0; $i < $total; $i++) {
        $add = $i + 2;
        $sheet -> setCellValue('AA'.$add, $empleado['tbl_e'][$i] -> email_e);
      }
      $writer = new Xlsx($spreadsheet);
      $filename = $empleado['tbl_em'] -> ruta_em.'_Empleados_activos_hasta_hoy_'.date('Y-m-d');
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
      header('Cache-Control: max-age=0');
      $writer -> save('php://output');
      exit;
    }
  }
