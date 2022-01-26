<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edición de Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo constant('URL'); ?>main/actualizarProducto" method="POST">
                <input type="hidden" id="edit_productId" value="<?php echo $this->producto->idProducto; ?>" />
                <div class="form-group row">
                    <label for="sku" class="col-sm-2 col-form-label">*SKU</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sku" value="<?php echo $this->producto->sku; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="descripcion" class="col-sm-2 col-form-label">*Descripción</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="descripcion" value="<?php echo $this->producto->descripcion; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="marca" class="col-sm-2 col-form-label">*Marca</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="marca" value="<?php echo $this->producto->marca; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="color" class="col-sm-2 col-form-label">*Color</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="color" value="<?php echo $this->producto->color; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="precio" class="col-sm-2 col-form-label">*Precio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="precio" value="<?php echo $this->producto->precio; ?>">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary updateProduct">Actualizar producto</button>
        </div>
    </div>
</div>