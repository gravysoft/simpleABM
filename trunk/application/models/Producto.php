<?php

Class Producto extends BaseSQLModel{
        protected $alias = 'P';
        protected $pk = 'id_producto'; 
        
    public function __construct() {
        parent::__construct();
    }
    
    public function buscar(){
        try {
            $paginateParams = array(
            'action' => 'abm/productos/search',                   // url to link to (ex: /users/search)
            'resultsPerPage' => 10,                              // expected results per page
                  'numItems' => 2,                               // items in scroller, at sides of current page
                  'page' => $_REQUEST['pageNumber']
        );
            return $this->paginate($paginateParams)->find();
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function agregar($input){
        try{
            $this->saveForm($input);
        }catch (Exception $e){
            $e->getMessage();
        }
    }
    
    public function editar($input){
        try{
            $this->saveForm($input);
        }catch (Exception $e){
            $e->getMessage();
        }
    }
    
    public function borrar($value){
      try{  
        $this->deleteBy('id_producto', $value);
      }  catch (Exception $e){
          $e->getMessage();
      }
    }
}

?>