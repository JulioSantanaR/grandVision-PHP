<?php

class Almacen extends Controller{

    function __construct(){
        parent::__construct();
		$this->view->mensaje = "";
        $this->view->tiposAlmacen = [];
    }
	
	function render(){
        $tiposAlmacen = $this->model->getTipoAlmacen();
		$this->view->tiposAlmacen = $tiposAlmacen;
		$this->view->render('almacen/index');
	}

    function CatalogoAlmacen() {
        $almacenes = $this->model->getCatalogoAlmacen();
		$this->view->almacenes = $almacenes;
		$this->view->render('almacen/catalogoAlmacen');
    }

    function registrarAlmacen(){
        $nombreAlmacen = $_POST['nombreAlmacen'];
        $localizacion = $_POST['localizacion'];
        $responsable = $_POST['responsable'];
		$idTipoAlmacen = $_POST['idTipoAlmacen'];
        if($this->model->insertarAlmacen(['nombreAlmacen' => $nombreAlmacen, 'localizacion' => $localizacion, 'responsable' => $responsable, 'idTipoAlmacen' => $idTipoAlmacen])){
            $mensaje = "Almacen creado correctamente";
        } else {
			$this->view->mensaje = "No se pudo crear el almacen";
		}
		
		$this->view->mensaje = $mensaje;
        $this->render();
    }

    function almacenFisico($param = null) {
        if ($param != null) {
            $idTipoAlmacen = 1;
            $idProducto = $param[0];
            $existencia = $this->model->getExistenciaProducto($idProducto, $idTipoAlmacen);

            $this->view->existencia = $existencia;
            $this->view->mensaje = "Físico";
            $this->view->render('almacen/existencias');
        }
    }

    function almacenVirtual($param = null) {
        if ($param != null) {
            $idTipoAlmacen = 2;
            $idProducto = $param[0];
            $existencia = $this->model->getExistenciaProducto($idProducto, $idTipoAlmacen);

            $this->view->existencia = $existencia;
            $this->view->mensaje = "Virtual";
            $this->view->render('almacen/existencias');
        }
    }
}

?>