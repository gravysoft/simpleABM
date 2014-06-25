<?php

class ProductosDocumentView extends CommonDocumentView {
     public function __construct( $template = null, $title = null ) {

        parent::__construct( $template, $title );
        $this->_loadLoginLibraries();

    }
    
    private function _loadLoginLibraries(){
        $this->addCSS('/styles/abm/productos/productos.css');
        $this->addJS('/scripts/abm/productos/productos.js');
    }
}

?>
