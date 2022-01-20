<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Antequera extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		// $this -> load -> library ('session');
	}
	public function index(){
		$this -> load -> view ('ANTEQUERAViewHeader');
		$this -> load -> view ('ANTEQUERAViewHome');
		$this -> load -> view ('ANTEQUERAViewFooter');
	}
	public function Mujer(){
		$this -> load -> view ('ANTEQUERAViewHeader');
		$this -> load -> view ('ANTEQUERAViewMujer');
		$this -> load -> view ('ANTEQUERAViewFooter');
	}
	public function Hombre(){
		$this -> load -> view ('ANTEQUERAViewHeader');
		$this -> load -> view ('ANTEQUERAViewHombre');
		$this -> load -> view ('ANTEQUERAViewFooter');
	}
	public function Kids(){
		$this -> load -> view ('ANTEQUERAViewHeader');
		$this -> load -> view ('ANTEQUERAViewNiños');
		$this -> load -> view ('ANTEQUERAViewFooter');
	}
	public function Accesorios(){
		$this -> load -> view ('ANTEQUERAViewHeader');
		$this -> load -> view ('ANTEQUERAViewAccesorios');
		$this -> load -> view ('ANTEQUERAViewFooter');
	}
	public function Contacto(){
		$this -> load -> view ('ANTEQUERAViewHeader');
		$this -> load -> view ('ANTEQUERAViewContacto');
		$this -> load -> view ('ANTEQUERAViewFooter');
	}
}
