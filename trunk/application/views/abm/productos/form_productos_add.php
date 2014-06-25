
    <div class="modal fade" id="formProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content col-lg-9">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Producto</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal col-lg-offset-1" role="form">
                <div class="form-group mTop25 padRight40">
                   <input type="text" class="form-control required" id="inputNombre" placeholder="Nombre" required>
                </div>      
                <div class="form-group mTop25 padRight40">            
                   <input type="text" class="form-control" id="inputDescripcion" placeholder="Descipcion" required>
                </div>
                <div class="form-group mTop25 padRight40">            
                   <input type="text" class="form-control" id="inputCosto" placeholder="Costo">
                </div>
                <div class="form-group mTop25 padRight40">            
                    <input type="text" class="form-control" id="inputDescuento" placeholder="Descuento" required>
                </div>
                <div class="form-group mTop25 padRight40">
                   <input type="text" class="form-control required" id="inputRecargo" placeholder="Recargo" required>
                </div>
                <div class="form-group mTop25 padRight40">
                   <input type="text" class="form-control required" id="inputStock" placeholder="Stock" required>
                </div>
                <div class="form-group mTop25 padRight40">
                   <input type="text" class="form-control required" id="inputCategoria" placeholder="Categoria" required>
                </div>
                <div class="form-group mTop25 padRight40">
                   <input type="text" class="form-control required" id="inputSubCategoria" placeholder="Sub Categoria" required>
                </div>
            </form>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="guardar">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            
        </div>
      </div>
    </div>