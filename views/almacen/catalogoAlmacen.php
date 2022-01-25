<!DOCTYPE html>
<html>
<body>
	<?php require 'views/header.php' ?>

    <div class="container">
        <h1 class="center">Catálogo de almacenes</h1><br/>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Localización</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">Tipo de almacén</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($this->almacenes as $row){
                            $almacen = new Almacen();
                            $almacen = $row;
                        ?>
                        <tr>
                            <td><?php echo $almacen->nombreAlmacen; ?></td>
                            <td><?php echo $almacen->localizacion; ?></td>
                            <td><?php echo $almacen->responsable; ?></td>
                            <td><?php echo $almacen->tipoAlmacen; ?></td>
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