<?php

class SubCategoriasDocumentView extends CommonDocumentView {
     public function __construct( $template = null, $title = null ) {

        parent::__construct( $template, $title );
        $this->_loadLoginLibraries();

    }
    
    private function _loadLoginLibraries(){
        $this->addCSS('/styles/abm/subcategorias/subCategorias.css');
        $this->addJS('/scripts/abm/subcategorias/subCategorias.js');
    }
}

?>
