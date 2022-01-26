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
                        <tr data-id="<?php echo $producto->idProducto; ?>">
                            <td><?php echo $producto->sku; ?></td>
                            <td><?php echo $producto->descripcion; ?></td>
                            <td><?php echo $producto->marca; ?></td>
                            <td><?php echo $producto->color; ?></td>
                            <td><?php echo $producto->precio; ?></td>
                            <td>
                                <button type="button" class="btn btn-success editProduct" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger deleteProduct" title="Eliminar">
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
    <div id="editProductModal" class="modal fade"></div>

	<?php require 'views/footer.php' ?>

    <script>
        $(function () {
            $(".deleteProduct").on("click", function () {
                var productId = $(this).closest('tr').data("id");
                DeleteProduct(productId);
            });

            $(".editProduct").on("click", function () {
                var editUri = "<?php echo constant('URL') . 'main/showProduct'; ?>";
                var productId = $(this).closest('tr').data("id");
                $.post(editUri, { productId }, function (response) {
                    $('#editProductModal').html(response);
                    $("#editProductModal").modal("show");

                    $(".updateProduct").on("click", function () {
                        UpdateProduct();
                    });
                });
            });
        });

        function DeleteProduct(productId) {
            var deleteUri = "<?php echo constant('URL') . 'main/eliminarProducto'; ?>";
            swal({
                title: "¿Estás seguro?",
                text: "Una vez eliminado no podrás recuperar la información del producto",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: deleteUri,
                        type: "POST",
                        data: { productId },
                        dataType: "html",
                        success: function (response) {
                            var result = $.parseJSON(response);
                            if (result.successDelete) {
                                swal("", result.mensaje, "success");
                                window.setTimeout(function () { location.reload() }, 1500);
                            } else {
                                swal("", result.mensaje, "error");
                            }
                        }
                    });
                }
            });
        }

        function UpdateProduct() {
            var updateUri = "<?php echo constant('URL') . 'main/actualizarProducto'; ?>",
                sku = $("#sku").val(),
                descripcion = $("#descripcion").val(),
                marca = $("#marca").val(),
                color = $("#color").val(),
                precio = $("#precio").val();
            $.ajax({
                url: updateUri,
                type: "POST",
                data: {sku, descripcion, marca, color, precio},
                success: function (response) {
                    if (response !== null) {
                        var result = $.parseJSON(response);
                        if (result.successDelete) {
                            swal("", result.mensaje, "success");
                            window.setTimeout(function () { location.reload() }, 1500);
                        } else {
                            swal("", result.mensaje, "error");
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>