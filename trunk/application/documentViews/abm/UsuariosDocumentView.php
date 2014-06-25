<?php

class UsuariosDocumentView extends CommonDocumentView {
     public function __construct( $template = null, $title = null ) {

        parent::__construct( $template, $title );
        $this->_loadLoginLibraries();

    }
    
    private function _loadLoginLibraries(){
        $this->addCSS('/styles/abm/usuarios/usuarios.css');
        $this->addJS('/scripts/abm/usuarios/usuarios.js');
    }
}

?>
