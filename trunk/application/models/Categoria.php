<?php 

Class Categoria extends BaseSQLModel{
    
    protected $alias = 'C';
        protected $pk = 'id'; 
        
    public function __construct() {
        parent::__construct();
    }
    
    public function buscar(){
        try {
            return $this->find();
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
        $this->deleteBy('id', $value);
      }  catch (Exception $e){
          $e->getMessage();
      }
    }
}

?>