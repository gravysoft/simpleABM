<?php

class CommonDocumentView extends DocumentView {

    public function __construct($template = null, $title = null, array $data = array(), $viewsDir = null) {

        parent::__construct($template, $title, $data, $viewsDir);

        $this->_loadCommonElements();
        
    }

    private function _loadCommonElements() {

//        $this->userIsLogged = Users::isLogged();
//        $this->userLogged = Users::getLogged();

        $this->setViewHeader('header/header');
        $this->setViewFooter('footer/footer');
        
        $this->addCSS('/styles/basics/bootstrap.css');
        $this->addCSS('/styles/basics/commons.css');
        $this->addJS('/scripts/basics/jquery-1.10.2.min.js');
        $this->addJS('/scripts/basics/bootstrap.js');
        $this->addJS('/scripts/basics/global.js');
        $this->addJS('/scripts/basics/jquery.validate.js');
        

    }
 
}

