<!DOCTYPE html>
<html>
<body>
	<?php require 'views/header.php' ?>

    <div class="container">
        <h1 class="center">Catálogo de productos</h1><br/>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">SKU</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Color</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Acciones</th>
                            <th scope="col">Almacenes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once 'models/producto.php';
                        foreach($this->productos as $row){
                            $producto = new Producto();
                            $producto = $row; 
                        ?>
                        <tr>
                            <td><?php echo $producto->sku; ?></td>
                            <td><?php echo $producto->descripcion; ?></td>
                            <td><?php echo $producto->marca; ?></td>
                            <td><?php echo $producto->color; ?></td>
                            <td><?php echo $producto->precio; ?></td>
                            <td>
                                <button type="button" class="btn btn-success" title="Editar" onclick="location.href='<?php echo constant('URL') . 'main/verProducto/' . $producto->idProducto; ?>'">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger" title="Eliminar" onclick="location.href='<?php echo constant('URL') . 'main/eliminarProducto/' . $producto->idProducto; ?>'">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" title="Físico" onclick="location.href='<?php echo constant('URL') . 'almacen/almacenFisico/' . $producto->idProducto; ?>'">
                                    <i class="fas fa-people-carry"></i>
                                </button>
                                <button type="button" class="btn btn-primary" title="Virtual" onclick="location.href='<?php echo constant('URL') . 'almacen/almacenVirtual/' . $producto->idProducto; ?>'">
                                    <i class="fas fa-laptop-code"></i>
                                </button>
                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>	
	<?php require 'views/footer.php' ?>
</body>
</html>