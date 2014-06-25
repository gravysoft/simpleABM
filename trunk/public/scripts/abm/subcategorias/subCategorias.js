$(document).ready(function(){
    table = $("#tabla_sub_categorias");    
    subCategory.search();
//Eventos    
$('#sectionCentral').on('click', '#guardar' , function(){
    subCategory.save();
    subCategory.search();
});    

$('#agregarSubCategoria').on('click', function(event){
    $.post('/abm/subcategorias/addForm', function(response){
           $(response).appendTo($('#sectionCentral'));
           $('#formSubCategoria').modal('show');
           //alert(response);
           $('#formSubCategoria').on('hide.bs.modal', function(e){
           $('#formSubCategoria').remove();
         }); 
       });
    return false
});

$('#sectionCentral').on('click', '.editar' , function(){
    var idSubCategoria = {id_subcat : $(this).attr('id')};
    subCategory.searchOne(idSubCategoria);
});

$('#sectionCentral').on('click', '.borrar' , function(){
    var idSubCategoria = {id_subcat : $(this).attr('id')};		
    subCategory.delete(idSubCategoria);
});

$('#sectionCentral').on('click', '#editar' , function(){
    var idSubCategoria = {id_subcat : $(this).attr('id')};		
    subCategory.update();
});
//Fin eventos    
});

var subCategory = {
    orderBy : null,
    direction : null,
    pageNumber : null,
    campos : function(){
        var objeto = {
             nombre_subcat: $('#inputNombre').val(),
             id_categoria: $('#formSubCategoria select option:selected').attr('id')
        }
        return objeto;
    },
    camposUpdate : function(){
        var objeto = {
            id_subcat : $('.modal-dialog').attr("id"),
            nombre_subcat : $('#inputNombre').val(),
            id_categoria : $('#formSubCategoria select option:selected').attr('id')
        }
        return objeto;
    },
    search : function(){
       $.post('/abm/subcategorias/search', function(response){
           var objeto = $.parseJSON(response);
               view = objeto.list_item_sub_categoria;
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
      var inputNombre = $($('#formSubCategoria form #inputNombre'));
      
      if(inputNombre.valid()){
          return true
      }else{
          return false
      }
    },
    save :function(){ 
                if (subCategory.validate()){
                    $.ajax({
                     type: "POST",
                     url: '/abm/subcategorias/add',
                     data: this.campos(),
                     success: function(response){
                         $('#formSubCategoria').reset();
                         $('#formSubCategoria').modal('hide');
                         subCategory.search();
                     },
                     error: function() {
                         alert("some error");
                     }
                 });
               }else{
                   alert('debe rellenar los campos');
               }                
    },
    delete : function(idSubCategoria){
                $.ajax({
                    type: "POST",
                    url: '/abm/subcategorias/delete',
                    data: idSubCategoria,
                    success: function(response){
                        alert('sub categoria borrada');
                        subCategory.search();
                    },
                    error: function() {
                        alert("some error");
                    }
                }); 
    },
    update : function(){
                $.ajax({
                    type: "POST",
                    url: '/abm/subcategorias/update',
                    data: this.camposUpdate(),
                    success: function(response){
                        $('#formSubCategoria').reset();
                        alert('sub categoria editada');
                        $('#formSubCategoria').modal('hide');
                        subCategory.search();
                    },
                    error: function() {
                        alert("some error");
                    }
                });
    },
    searchOne: function(idSubCategoria){
        $.post('/abm/subcategorias/editForm', idSubCategoria, function(response){
           $(response).appendTo($('#sectionCentral'));
           $('#formSubCategoria').modal('show');
           //alert(response);
           $('#formSubCategoria').on('hide.bs.modal', function(e){
           $('#formSubCategoria').remove();
        });
           //alert(response);
       });
    }
}

$.fn.reset = function(){
    var a = $('.form-group input');
    $.each(a,function(key, val){val.value = ""});
}