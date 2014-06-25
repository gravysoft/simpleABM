$(document).ready(function(){
//Eventos    
$('form').on('submit', function(){    
    logger.search();
    return false;
});    
//Fin eventos    
});

var logger = {
    filters : function(){
        var objeto = {
            nombre: $('#username').val(),
            password : $('#password').val()
        }        
        return objeto
    },
    search : function(){
       $.post('login/index/search', this.filters(), function(response){
           $(location).attr('href', response.trim());
       }); 
    }
}