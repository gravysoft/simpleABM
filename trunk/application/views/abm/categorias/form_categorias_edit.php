
    <div class="modal fade" id="formCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" id="<?php if (isset($datos['id']))echo $datos['id'] ?>">
        <div class="modal-content col-lg-9">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Categoria</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal col-lg-offset-1" role="form">
                <div class="form-group mTop25 padRight40">
                    <input type="text" class="form-control required" id="inputNombre" placeholder="Nombre" value="<?php if(isset($datos['nombre'])) echo $datos['nombre'] ?>" required>
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