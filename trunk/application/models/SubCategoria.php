<?php 

Class SubCategoria extends BaseSQLModel{
    
    protected $alias = 'SC';
    protected $pk = 'id_subcat'; 
    protected $joins = array(
            'Categoria' => array(
                'on' => 'SC.id_categoria = C.id',
                'doJoin' => true,
                'alias' => 'C',
                'relationType' => 'LEFT'
                )
            );
    
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
        $this->deleteBy('id_subcat', $value);
      }  catch (Exception $e){
          $e->getMessage();
      }
    }
}

?>