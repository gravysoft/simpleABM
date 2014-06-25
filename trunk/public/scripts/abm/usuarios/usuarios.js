$(document).ready(function(){
    table = $("#tabla_usuarios");    
    user.search();
//Eventos    
$('#sectionCentral').on('click', '#guardar' , function(){
    user.save();
    user.search();
});    

$('#agregarUsuario').on('click', function(event){
    $.post('/abm/usuarios/addForm', function(response){
           $(response).appendTo($('#sectionCentral'));
           $('#formUsuario').modal('show');
           //alert(response);
           $('#formUsuario').on('hide.bs.modal', function(e){
           $('#formUsuario').remove();
            });
            
           
       });
    return false
});

$('#sectionCentral').on('click', '.editar' , function(){
    var idUsuario = {_id: $(this).attr('id')};		
    user.searchOne(idUsuario);
});

$('#sectionCentral').on('click', '.borrar' , function(){
    var idUsuario = {_id: $(this).attr('id')};		
    user.delete(idUsuario);
});

$('#sectionCentral').on('click', '#editar' , function(){
    var idUsuario = {_id: $(this).attr('id')};		
    user.update();
});
//Fin eventos    
});

var user = {
    orderBy : null,
    direction : null,
    pageNumber : null,
    campos : function(){
        var objeto = {
            _nombre: $('#inputNombre').val(),
            _email : $('#inputEmail').val(),
            _pass :  $('#inputPassword').val(),
            _level : $('#inputLevel').val()
        }
        return objeto;
    },
    camposUpdate : function(){
        var objeto = {
            _id :$('.modal-dialog').attr("id"),
            _nombre: $('#inputNombre').val(),
            _email : $('#inputEmail').val(),
            _pass : $('#inputPass').val(),
            _level : $('#inputLevel').val()
        }
        return objeto;
    },
    search : function(){
       $.post('/abm/usuarios/search', function(response){
           var objeto = $.parseJSON(response);
               view = objeto.list_item_usuario;
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
      var inputNombre = $($('#formUsuario form #inputNombre'));
      var inputEmail = $($('#formUsuario form #inputEmail'));
      var inputPassword = $($('#formUsuario form #inputPassword'));
      var inputLevel = $($('#formUsuario form #inputLevel'));
      
      if(inputNombre.valid() && inputEmail.valid() && inputPassword.valid() && inputLevel.valid()){
          return true
      }else{
          return false
      }
    },
    save :function(){ 
                if (user.validate()){
                    $.ajax({
                     type: "POST",
                     url: '/abm/usuarios/add',
                     data: this.campos(),
                     success: function(response){
                         $('#formUsuario').reset();
                         $('#formUsuario').modal('hide');
                         user.search();
                     },
                     error: function() {
                         alert("some error");
                     }
                 });
               }else{
                   alert('debe rellenar los campos requeridos');
               }
                
    },
    delete : function(idUsuario){
                $.ajax({
                    type: "POST",
                    url: '/abm/usuarios/delete',
                    data: idUsuario,
                    success: function(response){
                        alert('usuario borrado');
                        user.search();
                    },
                    error: function() {
                        alert("some error");
                    }
                }); 
    },
    update : function(){
                $.ajax({
                    type: "POST",
                    url: '/abm/usuarios/update',
                    data: this.camposUpdate(),
                    success: function(response){
                        $('#formUsuario').reset();
                        alert('usuario editado');
                        $('#formUsuario').modal('hide');
                        user.search();
                    },
                    error: function() {
                        alert("some error");
                    }
                });
    },
    searchOne: function(idUsuario){
        $.post('/abm/usuarios/editForm', idUsuario, function(response){
           $(response).appendTo($('#sectionCentral'));
           $('#formUsuario').modal('show');
           //alert(response);
           $('#formUsuario').on('hide.bs.modal', function(e){
           $('#formUsuario').remove();
        });
           //alert(response);
       });
    }
}

$.fn.reset = function(){
    var a = $('.form-group input');
    $.each(a,function(key, val){val.value = ""});
}