<section id="notificaciones" class="notificaciones col-lg-2 pull-left">
     <h3 class="textWhite">Tabla de notificaciones</h3>    
</section>

<section class="col-lg-7" id="sectionCentral">
    <h1>abm SubCategorias</h1>
 
        <!-- Button trigger modal -->
    <button class="btn btn-danger btn-lg" data-toggle="modal" id="agregarSubCategoria" data-target="#formSubCategoria">
      Agregar Sub categoria 
   </button>

    
    <div id="subContainer"></div>
    
    <div class="paginator"></div>

    <table class="table" id="tabla_sub_categorias">
        <thead>
            <tr>
                <th abbr="nombre"><?= _('Nombre') ?></th>     
                <th abbr="padre"><?= _('Categoria Padre') ?></th>     
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