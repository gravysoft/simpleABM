<?php

/**
 * Le agrega a la clase Exception algunos metodos mas que nada para determinar ciertas acciones despues de detectar un error.
 * Como redirigir o setear errores tanto para recargas de pagina como para llamdas ajax.
 * 
 * @author Gaston Nan
 * @version 0.1 beta
 * 
 * ChangeLog:
 * 
 */

class CommonException extends Exception{
        
    private $redirectUrl = null;
    private $msgType = null;
    
    /**
     * @param $msgType el tipo de mensaje error, warning, info
     * @param $redirectUrl String Url a la que redireccionar en caso de error. si es llamada ajax, la url se coloca en la respuesta json. 
     */
    
        
    function __construct( $message, $msgType = null, $redirectUrl = null, $code = null, $previous = null ) {
    
        parent::__construct($message, $code, $previous);
        
        $this->redirectUrl = $redirectUrl;
        $this->msgType = $msgType;
        
        Logs::getInstance()->logException( $this );
        
    }
    public function errorManager( $title = '', $msg = '', $type = '' ){
        
        $msg = empty( $msg ) ? $this->getMessage() : $msg;
        $title = empty( $title ) ? l('Error') : $title;
        $type = empty( $type ) ? ( empty( $this->msgType ) ? 'error' : $this->msgType ) : $type;
        
        if( Request::getInstance()->isAjax() )
            $this->setAjaxError( $title , $msg, $type );
        
        else
            $this->setError( $title, $msg, $type );
        
    }
    public function setError( $title = '', $msg = '', $type = '' ){
        
        if( !empty($msg) )
            Messages::getInstance()->add( $msg, $type, $title ); 
        $this->redirect();
        
    }
    
    public function setAjaxError( $title = '', $msg = '', $type = '' ){
        
        $response = array();                        
        $response['error'] = Messages::getInstance()->formatNotificationMsg( $msg, $type, $title );
        
        if( (bool) $this->_getRedirectUrl() )
            $response['redirectUrl'] = $this->_getRedirectUrl();
            
        die( json_encode($response) );
        
    }
    
    private function redirect(){
        
        if( (bool) $this->_getRedirectUrl() )
            Response::redirect( $this->_getRedirectUrl() );
        
    }
    
    private function _getRedirectUrl() {
        return $this->redirectUrl;
    }

    public function setRedirectUrl($redirectUrl) {
        $this->redirectUrl = $redirectUrl;
    }

    public static function exceptionHandler( $message, $title, $msgType = null, $redirectUrl = null ){
        
        $exc = new self( $message, $msgType = null, $redirectUrl );
        
        $exc->errorManager($title);
        
    }
    
}

?>
