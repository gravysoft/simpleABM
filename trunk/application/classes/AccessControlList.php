<?php
/**
 * Created by Alan.
 * User: 4D
 * To change this template use File | Settings | File Templates.
 */
class AccessControlList{
    public static function puede($perm){
        $permisos = Permisos::getPermisos();
        $rol = SessionManager::get('level');
        if (array_key_exists($perm, $permisos)){
            if (isset($rol) && !empty($rol) ){
                    if ($permisos[$perm] == $rol){
                        return true;
                    }else{
                        return false;
                    }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}
