<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta almacén</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="container" class="center">
        <h1>Nuevo almacén</h1>
		
		<div><?php echo $this->mensaje; ?></div>

        <form action="<?php echo constant('URL'); ?>almacen/registrarAlmacen" method="POST">

            <p>
                <label for="nombreAlmacen">*Nombre almacén</label><br>
                <input type="text" name="nombreAlmacen" required>
            </p>
            <p>
                <label for="localizacion">*Localización</label><br>
                <input type="text" name="localizacion" required>
            </p>
            <p>
                <label for="responsable">*Responsable</label><br>
                <input type="text" name="responsable" required>
            </p>

            <p>
                <label for="idTipoAlmacen">*Tipo de almacén</label><br>
                <select name="idTipoAlmacen">
                    <?php
                        foreach($this->tiposAlmacen as $row){
                            $tipoAlmacen = new TipoAlmacen();
                            $tipoAlmacen = $row; 
                    ?>
                            <option value="<?php echo $tipoAlmacen->idTipoAlmacen; ?>"><?php echo $tipoAlmacen->tipoAlmacen; ?></option>
                    <?php } ?>
                </select>
            </p>

            <br/>
            <input class="btn btn-primary" type="submit" value="Registrar nuevo almacén">
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>