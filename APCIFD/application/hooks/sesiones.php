<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed');
class Sesiones {
	private $ci;
	private $allowed_controllers; // Controlladores que puede acceder sin estar loggeado
  private $disallowed_controllers; // Controlladores que NO puede acceder sin estar loggeado
	// private $allowed_methods; // Metodos a los que puede acceder sin loggearse
	private $disallowed_methods; // Metodos a los que puede acceder sin loggearse
	public function __construct() {
		$this -> ci = & get_instance ();
		$this -> ci -> load -> helper ( "url" );
		$this -> ci -> load -> library ( "session" );

		$this -> allowed_controllers = [
				'',
				'APCILogin'
		];
    $this -> disallowed_controllers = [
				'',
				'ValidarLogin'
		];
		// $this -> allowed_methods = [
		// 		'',
		// 		'login_panel',
		// 		'login_action' ,
		// 		'solicitudes'
		// ];
		 $this -> disallowed_methods = [
		 		'cerrarSesion',
        'index'
		 ];
	}
}
/*
/end hooks/home.php
*/
