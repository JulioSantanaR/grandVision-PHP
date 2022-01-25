<!DOCTYPE html>
<html>
<body>
	<?php require 'views/header.php' ?>

    <div class="container">
        <h1 class="center">Existencia almacén <?php echo $this->mensaje; ?></h1><br/>
        <button type="button" class="btn btn-primary">Nueva existencia (+)</button><br/><br/>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nombre almacén</th>
                            <th scope="col">Existencia</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once 'models/existencias.php';
                        if ($this->existencia != null) {
                            foreach($this->existencia as $row){
                                $existencia = new Existencias();
                                $existencia = $row; 
                            ?>
                            <tr>
                                <td><?php echo $existencia->nombreAlmacen; ?></td>
                                <td><?php echo $existencia->existencias; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success" title="Editar" onclick="location.href='<?php echo constant('URL') . 'main/verProducto/' . $existencia->idProducto; ?>'">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" title="Eliminar" onclick="location.href='<?php echo constant('URL') . 'main/eliminarProducto/' . $existencia->idProducto; ?>'">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>	
	<?php require 'views/footer.php' ?>
</body>
</html>