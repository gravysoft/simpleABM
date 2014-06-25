$(document).ready(function(){
    table = $("#tabla_productos");    
    product.search();
//Eventos    
$('#sectionCentral').on('click', '#guardar' , function(){
    product.save();
    product.search();
});    

$('#agregarProducto').on('click', function(event){
    $.post('/abm/productos/addForm', function(response){
           $(response).appendTo($('#sectionCentral'));
           $('#formProducto').modal('show');
           //alert(response);
           $('#formProducto').on('hide.bs.modal', function(e){
           $('#formProducto').remove();
         }); 
       });
    return false
});

$('#sectionCentral').on('click', '.editar' , function(){
    var idProducto = {id_producto : $(this).attr('id')};
    product.searchOne(idProducto);
});

$('#sectionCentral').on('click', '.borrar' , function(){
    var idProducto = {id_producto : $(this).attr('id')};		
    product.delete(idProducto);
});

$('#sectionCentral').on('click', '#editar' , function(){
    var idProduct = {id_producto : $(this).attr('id')};		
    product.update();
});
//Fin eventos    
});

var product = {
    orderBy : null,
    direction : null,
    pageNumber : null,
    campos : function(){
        var objeto = {
             nombre: $('#inputNombre').val(),
             descripcion : $('#inputDescripcion').val(),
             costo :  $('#inputCosto').val(),
             descuento : $('#inputDescuento').val(),
             recargo : $('#inputRecargo').val(),
             stock : $('#inputStock').val(),
             categoria : $('#inputCategoria').val(),
             subcategoria : $('#inputSubCategoria').val()
        }
        return objeto;
    },
    camposUpdate : function(){
        var objeto = {
            id_producto :$('.modal-dialog').attr("id"),
            nombre: $('#inputNombre').val(),
            descripcion : $('#inputDescripcion').val(),
            costo :  $('#inputCosto').val(),
            descuento : $('#inputDescuento').val(),
            recargo : $('#inputRecargo').val(),
            stock : $('#inputStock').val(),
            categoria : $('#inputCategoria').val(),
            subcategoria : $('#inputSubCategoria').val()
        }
        return objeto;
    },
    search : function(){
       $.post('/abm/productos/search', function(response){
           var objeto = $.parseJSON(response);
               view = objeto.list_item_producto;
               results = objeto.items;
             
             //  if(!isUndefined(objeto.pageNumber))
             //   user.pageNumber = objeto.pageNumber;
            
                tbody = table.find("tbody");
                
                var newContent = $('<tbody></tbody>');
                
                
                if(results.length > 0){
                
                for(var i=0; i<results.length; i++){

                    var item = results[i];
                    var row = view;
                    
                    // bulk replaces
                    for (var key in item) {
                        
                        if (isEmpty(item[key]))
                            item[key] = "-"; // null value
                        
                        var re = new RegExp("%"+key+"%","g");
                        row = row.replace(re, item[key]);
                        
                    }                                        
                    
                    newContent.append(row);
                }
                
                tbody.replaceWith(newContent); // truncate table
                
            } else {
                fb("No se encontraron resultados.");
                //j.jGrowl("No se encontraron resultados.");
            }
            if(isEmpty(response.paginator))     
                $(".paginator").html('');
            else  
                $(".paginator").replaceWith(response.paginator);
       }); 
    },
    validate : function(){
      var inputNombre = $($('#formProducto form #inputNombre'));
      var inputDescripcion = $($('#formProducto form #inputDescripcion'));
      var inputCosto = $($('#formProducto form #inputCosto'));
      var inputDescuento = $($('#formProducto form #inputDescuento'));
      var inputRecargo = $($('#formProducto form #inputRecargo'));
      var inputStock = $($('#formProducto form #inputStock'));
      var inputCategoria = $($('#formProducto form #inputCategoria'));
      var inputSubCategoria = $($('#formProducto form #inputSubCategoria'));
      
      if(inputNombre.valid() && inputDescripcion.valid() && inputCosto.valid() && inputDescuento.valid() && inputRecargo.valid() && inputStock.valid() && inputCategoria.valid() && inputSubCategoria.valid()){
          return true
      }else{
          return false
      }
    },
    save :function(){ 
                if (product.validate()){
                    $.ajax({
                     type: "POST",
                     url: '/abm/productos/add',
                     data: this.campos(),
                     success: function(response){
                         $('#formProducto').reset();
                         $('#formProducto').modal('hide');
                         product.search();
                     },
                     error: function() {
                         alert("some error");
                     }
                 });
               }else{
                   alert('debe rellenar los campos');
               }                
    },
    delete : function(idProducto){
                $.ajax({
                    type: "POST",
                    url: '/abm/productos/delete',
                    data: idProducto,
                    success: function(response){
                        alert('producto borrado');
                        product.search();
                    },
                    error: function() {
                        alert("some error");
                    }
                }); 
    },
    update : function(){
                $.ajax({
                    type: "POST",
                    url: '/abm/productos/update',
                    data: this.camposUpdate(),
                    success: function(response){
                        $('#formProducto').reset();
                        alert('producto editado');
                        $('#formProducto').modal('hide');
                        product.search();
                    },
                    error: function() {
                        alert("some error");
                    }
                });
    },
    searchOne: function(idProducto){
        $.post('/abm/productos/editForm', idProducto, function(response){
           $(response).appendTo($('#sectionCentral'));
           $('#formProducto').modal('show');
           //alert(response);
           $('#formProducto').on('hide.bs.modal', function(e){
           $('#formProducto').remove();
        });
           //alert(response);
       });
    }
}

$.fn.reset = function(){
    var a = $('.form-group input');
    $.each(a,function(key, val){val.value = ""});
}