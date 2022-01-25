<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar producto</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="container">
        <h1 class="center">Detalle del producto <?php echo $this->producto->sku; ?> </h1>
		
		<div class="center"><?php echo $this->mensaje; ?></div>

        <form action="<?php echo constant('URL'); ?>main/actualizarProducto" method="POST" class="center">
            <p>
                <label for="sku">*SKU</label><br>
                <input type="text" name="sku" value="<?php echo $this->producto->sku; ?>" required>
            </p>
            <p>
                <label for="descripcion">*Descripción</label><br>
                <input type="text" name="descripcion" value="<?php echo $this->producto->descripcion; ?>" required>
            </p>
            <p>
                <label for="marca">*Marca</label><br>
                <input type="text" name="marca" value="<?php echo $this->producto->marca; ?>" required>
            </p>
			<p>
                <label for="color">*Color</label><br>
                <input type="text" name="color" value="<?php echo $this->producto->color; ?>" required>
            </p>
			<p>
                <label for="precio">*Precio</label><br>
                <input type="text" name="precio" value="<?php echo $this->producto->precio; ?>" required>
            </p>

            <br/>
            <input class="btn btn-primary" type="submit" value="Actualizar producto">
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>