<section id="notificaciones" class="notificaciones col-lg-2 pull-left">
            <h3 class="textWhite">Tabla de notificaciones</h3>    
</section>

<section class="col-lg-7" id="sectionCentral">
    <h1>abm Productos</h1>
 
        <!-- Button trigger modal -->
    <button class="btn btn-danger btn-lg" data-toggle="modal" id="agregarProducto" data-target="#formProducto">
      Agregar Producto 
   </button>

    
    <div id="subContainer"></div>
    
    <div class="paginator"></div>

    <table class="table" id="tabla_productos">
        <thead>
            <tr>
                <th abbr="nombre"><?= _('Nombre') ?></th>     
                <th abbr="descripcion"><?= _('Descripcion') ?></th>     
                <th abbr="costo"><?= _('Costo') ?></th>     
                <th abbr="descuento"><?= _('Descuento') ?></th>     
                <th abbr="recargo"><?= _('Recargo') ?></th>     
                <th abbr="sugerido"><?= _('Precio sugerido') ?></th>
                <th abbr="stock"><?= _('Stock') ?></th>     
                <th abbr="categoria"><?= _('Categoria') ?></th>     
                <th abbr="subCategoria"><?= _('Sub Categoria') ?></th>     
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <div class="paginator"></div>
    </section>
<section id="mensajes" class="notificaciones col-lg-2 pull-right">
     <h3 class="textWhite">Tabla de mensajes</h3>    
</section>
    
</div>