<?php
	class Errores extends Controller{
		
		function __construct(){
			parent::__construct();
			$this->view->mensaje = "ERROR AL CARGAR EL RECURSO";
			$this->view->render('errores/index');
		}
	}
?>