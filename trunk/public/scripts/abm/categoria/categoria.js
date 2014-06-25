$(document).ready(function(){
    table = $("#tabla_categorias");    
    category.search();
//Eventos    
$('#sectionCentral').on('click', '#guardar' , function(){
    category.save();
    category.search();
});    

$('#agregarCategoria').on('click', function(event){
    $.post('/abm/categorias/addForm', function(response){
           $(response).appendTo($('#sectionCentral'));
           $('#formCategoria').modal('show');
           //alert(response);
           $('#formCategoria').on('hide.bs.modal', function(e){
           $('#formCategoria').remove();
         }); 
       });
    return false
});

$('#sectionCentral').on('click', '.editar' , function(){
    var idCategoria = {id : $(this).attr('id')};
    category.searchOne(idCategoria);
});

$('#sectionCentral').on('click', '.borrar' , function(){
    var idCategoria = {id : $(this).attr('id')};		
    category.delete(idCategoria);
});

$('#sectionCentral').on('click', '#editar' , function(){
    var idCategoria = {id : $(this).attr('id')};		
    category.update();
});
//Fin eventos    
});

var category = {
    orderBy : null,
    direction : null,
    pageNumber : null,
    campos : function(){
        var objeto = {
             nombre: $('#inputNombre').val(),
        }
        return objeto;
    },
    camposUpdate : function(){
        var objeto = {
            id :$('.modal-dialog').attr("id"),
            nombre: $('#inputNombre').val(),
        }
        return objeto;
    },
    search : function(){
       $.post('/abm/categorias/search', function(response){
           var objeto = $.parseJSON(response);
               view = objeto.list_item_categoria;
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
      var inputNombre = $($('#formCategoria form #inputNombre'));
      
      if(inputNombre.valid()){
          return true
      }else{
          return false
      }
    },
    save :function(){ 
                if (category.validate()){
                    $.ajax({
                     type: "POST",
                     url: '/abm/categorias/add',
                     data: this.campos(),
                     success: function(response){
                         $('#formCategoria').reset();
                         $('#formCategoria').modal('hide');
                         category.search();
                     },
                     error: function() {
                         alert("some error");
                     }
                 });
               }else{
                   alert('debe rellenar los campos');
               }                
    },
    delete : function(idCategoria){
                $.ajax({
                    type: "POST",
                    url: '/abm/categorias/delete',
                    data: idCategoria,
                    success: function(response){
                        alert('categoria borrada');
                        category.search();
                    },
                    error: function() {
                        alert("some error");
                    }
                }); 
    },
    update : function(){
                $.ajax({
                    type: "POST",
                    url: '/abm/categorias/update',
                    data: this.camposUpdate(),
                    success: function(response){
                        $('#formCategoria').reset();
                        alert('categoria editada');
                        $('#formCategoria').modal('hide');
                        category.search();
                    },
                    error: function() {
                        alert("some error");
                    }
                });
    },
    searchOne: function(idCategoria){
        $.post('/abm/categorias/editForm', idCategoria, function(response){
           $(response).appendTo($('#sectionCentral'));
           $('#formCategoria').modal('show');
           //alert(response);
           $('#formCategoria').on('hide.bs.modal', function(e){
           $('#formCategoria').remove();
        });
           //alert(response);
       });
    }
}

$.fn.reset = function(){
    var a = $('.form-group input');
    $.each(a,function(key, val){val.value = ""});
}