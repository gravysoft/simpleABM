<?php

class CategoriasDocumentView extends CommonDocumentView {
     public function __construct( $template = null, $title = null ) {

        parent::__construct( $template, $title );
        $this->_loadLoginLibraries();

    }
    
    private function _loadLoginLibraries(){
        $this->addCSS('/styles/abm/categoria/categoria.css');
        $this->addJS('/scripts/abm/categoria/categoria.js');
    }
}

?>
