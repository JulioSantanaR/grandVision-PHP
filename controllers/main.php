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
			$successUpdate = false;
			$mensaje = "";
			session_start();
			$idProducto = $_SESSION['id_verProducto'];
			$sku = $_POST['sku'];
			$descripcion = $_POST['descripcion'];
			$marca = $_POST['marca'];
			$color = $_POST['color'];
			$precio = $_POST['precio'];

			unset($_SESSION['id_verProducto']);

			if ($this->model->update(['idProducto' => $idProducto, 'sku' => $sku, 'descripcion' => $descripcion, 'marca' => $marca, 'color' => $color, 'precio' => $precio])) {
				$mensaje = "Producto actualizado correctamente";
				$successDelete = true;
			} else {
				$mensaje = "No se pudo actualizar el producto";
			}
			
			$response_array['mensaje'] = $mensaje;
			$response_array['successDelete'] = $successDelete;
        	echo json_encode($response_array);
		}

		function eliminarProducto() {
			$successDelete = false;
			$mensaje = "";
			$productId = $_POST['productId'];
			if ($this->model->deleteProduct($productId)) {
				$successDelete = true;
				$mensaje = "Producto eliminado correctamente";
			} else {
				$mensaje = "No se pudo eliminar el producto";
			}
				
			$response_array['mensaje'] = $mensaje;
			$response_array['successDelete'] = $successDelete;
        	echo json_encode($response_array);
		}

		function showProduct() {
			$productId = $_POST['productId'];
			$producto = $this->model->getById($productId);

			session_start();
			$_SESSION['id_verProducto'] = $producto->idProducto;

			$this->view->producto = $producto;
			$this->view->render('main/editarProducto');
		}
	}
?>