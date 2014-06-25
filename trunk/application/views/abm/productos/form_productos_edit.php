
    <div class="modal fade" id="formProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" id="<?php if (isset($datos['id_producto']))echo $datos['id_producto'] ?>">
        <div class="modal-content col-lg-9">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Usuario</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal col-lg-offset-1" role="form">
                <div class="form-group mTop25 padRight40">
                    <input type="text" class="form-control required" id="inputNombre" placeholder="Nombre" value="<?php if(isset($datos['nombre'])) echo $datos['nombre'] ?>" required>
                </div>      
                <div class="form-group mTop25 padRight40">            
                   <input type="text" class="form-control" id="inputDescripcion" placeholder="Descipcion" value="<?php if(isset($datos['descripcion'])) echo $datos['descripcion'] ?>" required>
                </div>
                <div class="form-group mTop25 padRight40">            
                   <input type="text" class="form-control" id="inputCosto" placeholder="Costo" value="<?php if(isset($datos['costo'])) echo $datos['costo'] ?>" required>
                </div>
                <div class="form-group mTop25 padRight40">            
                    <input type="text" class="form-control" id="inputDescuento" placeholder="Descuento" value="<?php if(isset($datos['descuento'])) echo $datos['descuento'] ?>" required>
                </div>
                <div class="form-group mTop25 padRight40">
                   <input type="text" class="form-control required" id="inputRecargo" placeholder="Recargo" value="<?php if(isset($datos['recargo'])) echo $datos['recargo'] ?>" required>
                </div>
                <div class="form-group mTop25 padRight40">
                   <input type="text" class="form-control required" id="inputStock" placeholder="Stock" value="<?php if(isset($datos['stock'])) echo $datos['stock'] ?>" required>
                </div>
                <div class="form-group mTop25 padRight40">
                   <input type="text" class="form-control required" id="inputCategoria" placeholder="Categoria" value="<?php if(isset($datos['categoria'])) echo $datos['categoria'] ?>" required>
                </div>
                <div class="form-group mTop25 padRight40">
                   <input type="text" class="form-control required" id="inputSubCategoria" placeholder="Sub Categoria" value="<?php if(isset($datos['subcategoria'])) echo $datos['subcategoria'] ?>" required>
                </div>
            </form>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="editar">Editar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>