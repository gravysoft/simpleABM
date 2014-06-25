
<section id="notificaciones" class="notificaciones col-lg-2 pull-left">
            <h3 class="textWhite">Tabla de notificaciones</h3>    
</section>

<section class="col-lg-7" id="sectionCentral">
    <h1>abm usuarios</h1>
 
        <!-- Button trigger modal -->
    <button class="btn btn-danger btn-lg" data-toggle="modal" id="agregarUsuario" data-target="#formUsuario">
      Agregar Usuario 
   </button>

    
    <div id="subContainer"></div>
    
    <div class="paginator"></div>

    <table class="table" id="tabla_usuarios">
        <thead>
            <tr>
                <th abbr="nombre"><?= _('Nombre') ?></th>     
                <th abbr="email"><?= _('Email') ?></th>     
                <th abbr="password"><?= _('Password') ?></th>     
                <th abbr="level"><?= _('Level') ?></th>     
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
