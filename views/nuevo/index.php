<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta producto</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div class="container">
        <h1 class="center">Nuevo producto</h1>
		
		<div class="center"><?php echo $this->mensaje; ?></div>

        <form action="<?php echo constant('URL'); ?>nuevo/registrarProducto" method="POST" class="center">
            <p>
                <label for="sku">*SKU</label><br>
                <input type="text" name="sku" required>
            </p>
            <p>
                <label for="descripcion">*Descripción</label><br>
                <input type="text" name="descripcion" required>
            </p>
            <p>
                <label for="marca">*Marca</label><br>
                <input type="text" name="marca" required>
            </p>
			<p>
                <label for="color">*Color</label><br>
                <input type="text" name="color" required>
            </p>
			<p>
                <label for="precio">*Precio</label><br>
                <input type="text" name="precio" required>
            </p>

            <br/>
            <input class="btn btn-primary" type="submit" value="Registrar nuevo producto">
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>