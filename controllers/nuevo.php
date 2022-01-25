<?php

class Nuevo extends Controller{

    function __construct(){
        parent::__construct();
		$this->view->mensaje = "";
    }
	
	function render(){
		$this->view->render('nuevo/index');
	}

    function registrarProducto(){
        $sku = $_POST['sku'];
        $descripcion = $_POST['descripcion'];
        $marca = $_POST['marca'];
		$color = $_POST['color'];
		$precio = $_POST['precio'];
        if($this->model->insert(['sku' => $sku, 'descripcion' => $descripcion, 'marca' => $marca, 'color' => $color, 'precio' => $precio])){
            $mensaje = "Producto creado correctamente";
        } else {
			$this->view->mensaje = "No se pudo crear el producto";
		}
		
		$this->view->mensaje = $mensaje;
        $this->render();
    }
}

?>