<?php

class ListDocumentView extends CommonDocumentView {

    protected $resultsPerPage;
    protected $numItems = 3;
    protected $ulClass = 'pagination pagination-sm remove-margin';
    protected $order;
    protected $direction;
    protected $page;
    protected $action;


    public function __construct( $template = null, $title = null ) {

        parent::__construct( $template, $title );

        $this->loadViewElements(); 
    }

    private function loadViewElements() {

        /* ajax data table */
        $this->ajaxPagingTop = new view('elements/ajax_paging_top');
        $this->ajaxPagingBottom = new view('elements/ajax_paging_bottom');
        
    }

    public function getPaginateParams(){        
        
        $input = new DataInput( $_POST );
        $input->init( 'results-per-page', 'int' );
        
        $paginateParams = array(
            'action' => $this->action,
            'resultsPerPage' => ( empty( $input['results-per-page'] ) || $input['results-per-page'] < 1 ) ? null : $input['results-per-page'],  
            'numItems' => $this->numItems, // items en el paginador, o sea cantidad de paginas para mostrar a la vez
            'order' => @$input['orderBy'],
            'direction' => @$input['direction'],
            'ulClass' => $this->ulClass, // la que usa bootstrap/el template
            'page' => @$input['pageNumber'],
            'textSearch' => @$input['text-search']
        );
        
        return $paginateParams;
        
    }
    
    
    /**
     * Metodo estatico para cargar en un objeto view() los elementos
     */
    public static function setModalElementsToView( &$view ){
        
        $view->isModalView = true;
        
        $view->ajaxPagingTop = new view('elements/ajax_paging_top');
        $view->ajaxPagingBottom = new view('elements/ajax_paging_bottom');
        $view->modalTop = new view('elements/modal_top');
        $view->modalBottom = new view('elements/modal_bottom');
        
    }
    
    
    
}

