<?php
class SubcategoriasController extends Controller {

	function __construct() {
		parent::__construct();
	}

	public function defaultAction() {
		$view = new SubCategoriasDocumentView('abm/subCategorias/subCategorias', "Sub-Categorias");
		$view->setDescription("");
		$view->setKeywords("");

		echo $view;
	}
        
        public function searchAction(){
            try{
                $list_view = new View("abm/subCategorias/list_item_sub_categoria");
                $response['list_item_sub_categoria'] = $list_view->render();
                $subCategoriasModel = new SubCategoria();
                $listaSubCategorias = $subCategoriasModel->buscar();
                $response['items'] = $listaSubCategorias->toArray();
            } catch (Exception $e) {
                $e->getMessage();
            }
          echo json_encode($response);
        }
        
        public function addAction(){
            try{
                $subCategoriaModel = new SubCategoria();
                $subCategoriaModel->agregar($_REQUEST);
            }catch(Exception $e){
                $e->getMessage();
            }
        }
        
        public function updateAction(){
            try{
                $subCategoriaModel = new SubCategoria();
                $subCategoriaModel->editar($_REQUEST);
            }catch(Exception $e){
                $e->getMessage();
            }
        }
        
        public function deleteAction(){
            try{
                $subCategoriaModel = new SubCategoria();
                $subCategoriaModel->borrar($_REQUEST['id_subcat']);
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
        
        public function addFormAction(){
            try{
                $view = new View('abm/subCategorias/form_sub_categorias_add');
                $categoriaModel = new Categoria();               
                $view->datos = $categoriaModel->buscar()->toArray();
                echo $view;
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
        
        public function editFormAction(){
            try{
                $view = new View('abm/subCategorias/form_sub_categorias_edit');
                $subCategoriaModel = new SubCategoria();
                $view->datos = $subCategoriaModel->filterBy('id_subcat = ' . $_REQUEST['id_subcat'])->findOne()->toArray();
                $categoriaModel = new Categoria();
                $view->categorias = $categoriaModel->buscar()->toArray();
                echo $view;
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
}
?>