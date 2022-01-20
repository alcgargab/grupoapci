<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
	}
	public function index(){
		$this -> load -> view ('ViewRHEOheader');
		$this -> load -> view ('ViewRHEOhomepage');
		$this -> load -> view ('ViewRHEOfooter');
	}
}
