<?php
	class Main extends Controller{
		
		function __construct(){
			parent::__construct();
			$this->view->productos = [];
		}
		
		function render() {
			$productos = $this->model->get();
			$this->view->productos = $productos;
			$this->view->render('main/index');
		}

		function verProducto($param = null) {
			if ($param != null) {
				$idProducto = $param[0];
				$producto = $this->model->getById($idProducto);

				session_start();
				$_SESSION['id_verProducto'] = $producto->idProducto;

				$this->view->producto = $producto;
				$this->view->mensaje = "";
				$this->view->render('main/detalle');
			}
		}

		function actualizarProducto() {
			session_start();
			$idProducto = $_SESSION['id_verProducto'];
			$sku = $_POST['sku'];
			$descripcion = $_POST['descripcion'];
			$marca = $_POST['marca'];
			$color = $_POST['color'];
			$precio = $_POST['precio'];

			unset($_SESSION['id_verProducto']);

			if ($this->model->update(['idProducto' => $idProducto, 'sku' => $sku, 'descripcion' => $descripcion, 'marca' => $marca, 'color' => $color, 'precio' => $precio])) {
				$producto = new Producto();
				$producto->idProducto = $idProducto;
				$producto->sku = $sku;
				$producto->descripcion = $descripcion;
				$producto->marca = $marca;
				$producto->color = $color;
				$producto->precio = $precio;
				$this->view->producto = $producto;
				$this->view->mensaje = "Producto actualizado correctamente";
			} else {
				$this->view->mensaje = "No se pudo actualizar el producto";
			}

			$this->view->render('main/detalle');
		}
		
		function saludo() {
			echo "<p>Ejecutaste el método saludo</p>";
		}
	}
?>