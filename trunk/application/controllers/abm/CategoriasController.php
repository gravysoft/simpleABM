<?php
class CategoriasController extends Controller {

	function __construct() {
		parent::__construct();
	}

	public function defaultAction() {
		$view = new CategoriasDocumentView('abm/categorias/categorias', "Categorias");
		$view->setDescription("");
		$view->setKeywords("");

		echo $view;
	}
        
        public function searchAction(){
            try{
                $list_view = new View("abm/categorias/list_item_categoria");
                $response['list_item_categoria'] = $list_view->render();
                $categoriasModel = new Categoria();               
                $listaCategorias = $categoriasModel->buscar();
                $response['items'] = $listaCategorias->toArray();


            }  catch (Exception $e){
                $e->getMessage();
            }
          echo json_encode($response);
        }
        
        public function addAction(){
            try{
                $categoriaModel = new Categoria();
                $categoriaModel->agregar($_REQUEST);
            }catch(Exception $e){
                $e->getMessage();
            }
        }
        
        public function updateAction(){
            try{
                $categoriaModel = new Categoria();
                $categoriaModel->editar($_REQUEST);
            }catch(Exception $e){
                $e->getMessage();
            }
        }
        
        public function deleteAction(){
            try{
                $categoriaModel = new Categoria();
                $categoriaModel->borrar($_REQUEST['id']);
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
        
        public function addFormAction(){
            try{
                $view = new View('abm/categorias/form_categorias_add');
                echo $view;
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
        
        public function editFormAction(){
            try{
                $view = new View('abm/categorias/form_categorias_edit');
                $categoriaModel = new Categoria();               
                $view->datos = $categoriaModel->filterBy('id = ' . $_REQUEST['id'])->findOne()->toArray();
                echo $view;
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
}
?>