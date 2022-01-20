<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sassper extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> library('email');
		$this -> load -> helper('url');
	}
	public function index(){
		$this -> load -> view ('ViewSASSPERheader');
		$this -> load -> view ('ViewSASSPERhomepage');
		$this -> load -> view ('ViewSASSPERfooter');
	}
	// public function SendMail(){
	// 	$data['nombre'] = $this -> input -> post('nombre');
	// 	$data['email'] = $this -> input -> post('email');
	// 	$data['mensaje'] = $this -> input -> post('mensaje');
	// 	print_r($data);
	// 	exit;
	// 	$this -> load -> view ('ViewSASSPERheader');
	// 	$this -> load -> view ('ViewSASSPERhomepage');
	// 	$this -> load -> view ('ViewSASSPERfooter');
	// }
}
