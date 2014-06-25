<?php

class Usuario extends BaseSQLModel{
    
    protected $alias = 'U';
    protected $pk = '_id';        
    
    public function getUsers(){
        try {
            $paginateParams = array(
            'action' => 'abm/usuarios/search',                   // url to link to (ex: /users/search)
            'resultsPerPage' => 10,                              // expected results per page
                  'numItems' => 2,                               // items in scroller, at sides of current page
                  'page' => $_REQUEST['pageNumber']
        );
            return $this->paginate($paginateParams)->find();
        } catch (Exception $e) {
            throw $e;
        }        
    }
    
    public function __construct() {
        parent::__construct();       
    }
    
    protected function _isUser($nombre = '', $pass = ''){
        if (stripos($nombre, '@') === FALSE){
            $usuario = '_nombre';
        }else{
            $usuario = '_email';
        }
        $filtro = array(
                  $usuario =>  $nombre,
                  '_pass'    => sha1($pass)
        );
      
        try{
             $result = $this->filterBy($filtro)->findOne();
            if(empty($result->getData())){
               return 'vacio'; 
            }else{
               return $result;
            }
        }catch(Exception $e){
            $e->getMessage();
        }
    }
    
    public static function isLogged(){
        return isset($_SESSION['nombre']);
    }
    
    public function login($nombre = '', $pass = ''){
      try{
        $result = $this->_isUser($nombre, $pass);

        if ($result != 'vacio'){
            SessionManager::set(nombre, $result->getNombre());
            SessionManager::set('autenticado', true);
            SessionManager::set(level, $result->getLevel());

            return 'index';
        }else{
            return 'login';
        }
      } catch (Exception $e) {
          $e->getMessage('no se pudo realizar la consulta');
      } 
    }
    
    public function agregar($input){
        $this->saveForm($input);
    }

    public function modificar($input){
        $this->saveForm($input);
    }
    
    public function borrar($value = null){
        $this->deleteBy('_id', $value);
        prd($this->getQuery());
    }
    
    public static function logout(){
        SessionManager::destroy();
    }
}
 
?>