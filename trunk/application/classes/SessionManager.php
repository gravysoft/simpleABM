<?php


class SessionManager
{
    public static function init()
    {
        session_start();
    }
    
    public static function destroy($clave = false)
    {
        if($clave){
            if(is_array($clave)){
                for($i = 0; $i < count($clave); $i++){
                    if(isset($_SESSION[$clave[$i]])){
                        unset($_SESSION[$clave[$i]]);
                    }
                }
            }
            else{
                if(isset($_SESSION[$clave])){
                    unset($_SESSION[$clave]);
                }
            }
        }
        else{
            session_destroy();
        }
    }
    
    public static function set($clave, $valor)
    {
        if(!empty($clave))
        $_SESSION[$clave] = $valor;
    }
    
    public static function get($clave)
    {
        if(isset($_SESSION[$clave]))
            return $_SESSION[$clave];
    }

    public static function getLevel($level)
    {
        
        $role['admin'] = 3;
        $role['especial'] = 2;
        $role['usuario'] = 1;

        if(array_key_exists($level, $role)){
            return $role[$level];
        }else{
            throw new Exception('Error de acceso');
        }
    }

    public static function acceso($level)
//esta funcion es medio cabeza hacer un tipo de excepcion que me redirija
    {
        if(!SessionManager::get('autenticado')){
            header('location: /login');
            return false;
        }

        if(SessionManager::getLevel($level) > SessionManager::getLevel(SessionManager::get('level'))){
            header('location: /error');
            return false;
        }
        return true;
    }
    
    public static function accesoView($level)
    {
        if(!SessionManager::get('autenticado')){
            return false;
        }
        
        if(SessionManager::getLevel($level) > SessionManager::getLevel(SessionManager::get('level'))){
            return false;
        }
        
        return true;
    }
}

?>