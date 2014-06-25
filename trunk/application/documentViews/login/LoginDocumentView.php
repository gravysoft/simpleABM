<?php

class LoginDocumentView extends CommonDocumentView {
     public function __construct( $template = null, $title = null ) {

        parent::__construct( $template, $title );
        $this->_loadLoginLibraries();

    }
    
    private function _loadLoginLibraries(){
        $this->addCSS('/styles/login/login.css');
        $this->addJS('/scripts/login/login.js');
    }
}

?>