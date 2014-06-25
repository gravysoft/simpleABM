<?php
/**
 * Created by Alan.
 * User: 4D
 * To change this template use File | Settings | File Templates.
 */
class Permisos{
        public static function getPermisos(){
        $permisos = array(
            'index' => 'admin',
            'abm' => 'admin',
            'abm/usuarios' => 'admin',
            'abm/usuarios/search' => 'admin',
            'abm/usuarios/add' => 'admin',
            'abm/usuarios/delete' => 'admin',
            'abm/usuarios/update' => 'admin',
        );
        return $permisos;
    }
}