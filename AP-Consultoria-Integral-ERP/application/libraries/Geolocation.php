<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Geolocation extends CI_Controller {
    function __construct() {
      // $this -> ci = & get_instance();
    }
    public function index(){ }
    // --------------- oficina de iztacalco --------------- //
    public function search_location_iztacalco($ubication){
      // vertices en x del poligono
      $library_geocode_longitud = array(-99.097633, -99.094431, -99.091523, -99.090424, -99.088526, -99.089249, -99.093133, -99.098305, -99.097949);
      // vertices en y del poligono
      $library_geocode_latitud = array(19.402737, 19.402245, 19.401666, 19.399638, 19.397968, 19.396597, 19.397193, 19.397910, 19.400457);
      // número de vertices
      $library_total_geocode = count($library_geocode_longitud);
      // ubicación del usuario
      $library_explode = explode(",", $ubication);
      // ubicación del usuario en vertice x (0.000000)
      $library_latitud = trim($library_explode[0]);
      // ubicación del usuario en vertice y (-0.000000)
      $library_longitud = trim($library_explode[1]);
      // función para validar si el usuario se encuentra dentro del poligono
      function validate_point_geocode($library_total_geocode, $library_geocode_latitud, $library_geocode_longitud, $library_latitud, $library_longitud){
        $c = false;
        for ($i = 0, $j = $library_total_geocode - 1; $i < $library_total_geocode; $j = $i++) {
          if(($library_geocode_longitud[$i] > $library_longitud != ($library_geocode_longitud[$j] > $library_longitud)) &&
          ($library_latitud < ($library_geocode_latitud[$j] - $library_geocode_latitud[$i]) *
          ($library_longitud - $library_geocode_longitud[$i]) / ($library_geocode_longitud[$j] - $library_geocode_longitud[$i]) + $library_geocode_latitud[$i])) {
            $c = !$c;
          }
        }
        return $c;
      }
      if (validate_point_geocode($library_total_geocode, $library_geocode_latitud, $library_geocode_longitud, $library_latitud, $library_longitud)) {
        return $controller_geocode = "true";
      }
      else {
        return $controller_geocode = "false";
      }
    }
    // --------------- oficina de tultitlan --------------- //
    public function search_location_tultitlan($ubication){
      // vertices en x del poligono
      $library_geocode_longitud = array(-99.127287, -99.124047, -99.124914, -99.128477, -99.128871);
      // vertices en y del poligono
      $library_geocode_latitud = array(19.643318, 19.642726, 19.638114, 19.636757, 19.638515);
      // número de vertices
      $library_total_geocode = count($library_geocode_longitud);
      // ubicación del usuario
      $library_explode = explode(",", $ubication);
      // ubicación del usuario en vertice x (0.000000)
      $library_latitud = trim($library_explode[0]);
      // ubicación del usuario en vertice y (-0.000000)
      $library_longitud = trim($library_explode[1]);
      // función para validar si el usuario se encuentra dentro del poligono
      function validate_point_geocode($library_total_geocode, $library_geocode_latitud, $library_geocode_longitud, $library_latitud, $library_longitud){
        $c = false;
        for ($i = 0, $j = $library_total_geocode - 1; $i < $library_total_geocode; $j = $i++) {
          if(($library_geocode_longitud[$i] > $library_longitud != ($library_geocode_longitud[$j] > $library_longitud)) &&
          ($library_latitud < ($library_geocode_latitud[$j] - $library_geocode_latitud[$i]) *
          ($library_longitud - $library_geocode_longitud[$i]) / ($library_geocode_longitud[$j] - $library_geocode_longitud[$i]) + $library_geocode_latitud[$i])) {
            $c = !$c;
          }
        }
        return $c;
      }
      if (validate_point_geocode($library_total_geocode, $library_geocode_latitud, $library_geocode_longitud, $library_latitud, $library_longitud)) {
        return $controller_geocode = "true";
      }
      else {
        return $controller_geocode = "false";
      }
    }
    // --------------- oficina de cafetería --------------- //
    public function search_location_cafeteria($ubication){
      // vertices en x del poligono
      $library_geocode_longitud = array(-99.159651, -99.158498, -99.158123, -99.159262);
      // vertices en y del poligono
      $library_geocode_latitud = array(19.423006, 19.423241, 19.421692, 19.421426);
      // número de vertices
      $library_total_geocode = count($library_geocode_longitud);
      // ubicación del usuario
      $library_explode = explode(",", $ubication);
      // ubicación del usuario en vertice x (0.000000)
      $library_latitud = trim($library_explode[0]);
      // ubicación del usuario en vertice y (-0.000000)
      $library_longitud = trim($library_explode[1]);
      // función para validar si el usuario se encuentra dentro del poligono
      function validate_point_geocode($library_total_geocode, $library_geocode_latitud, $library_geocode_longitud, $library_latitud, $library_longitud){
        $c = false;
        for ($i = 0, $j = $library_total_geocode - 1; $i < $library_total_geocode; $j = $i++) {
          if(($library_geocode_longitud[$i] > $library_longitud != ($library_geocode_longitud[$j] > $library_longitud)) &&
          ($library_latitud < ($library_geocode_latitud[$j] - $library_geocode_latitud[$i]) *
          ($library_longitud - $library_geocode_longitud[$i]) / ($library_geocode_longitud[$j] - $library_geocode_longitud[$i]) + $library_geocode_latitud[$i])) {
            $c = !$c;
          }
        }
        return $c;
      }
      if (validate_point_geocode($library_total_geocode, $library_geocode_latitud, $library_geocode_longitud, $library_latitud, $library_longitud)) {
        return $controller_geocode = "true";
      }
      else {
        return $controller_geocode = "false";
      }
    }
  }
