<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class sesion{
  public function index(){
    //instanciamos al objeto codeigniter
    $s_hook =& get_instance();
    // obtenemos el nombre del controlador en el que estamos
    $s_controller = $s_hook -> router -> class;
    // echo "<pre>"; print_r($s_hook); echo "</pre>"; die();
  }
}
