<?php
class UsuariosController extends Controller {

	function __construct() {
		parent::__construct();
	}

	public function defaultAction() {
		$view = new UsuariosDocumentView('/abm/usuarios/usuarios', "Usuarios");
		$view->setDescription("");
		$view->setKeywords("");
                $view->categorias = array('cat1' => 'cat1', 'cat2' => 'cat2');
                $view->subCategorias = array('subcat1' => 'subcat1', 'subcat2' => 'subcat2');

		echo $view;
	}
        
        public function searchAction(){
           try{ 
                $list_view = new View("abm/usuarios/list_item_usuario");
                $response['list_item_usuario'] = $list_view->render();
                $usuarioModel = new Usuario();
                $listaUsuarios = $usuarioModel->getUsers();
                $response['items'] = $listaUsuarios->toArray(); 
                $response['paginator'] = $listaUsuarios->getScroller();
           }  catch (Exception $e){
               $e->getMessage();
           }
           echo json_encode($response);
        }
        
        public function addAction(){
            try{
                $usuarioModel = new Usuario();
                $_REQUEST['_pass'] = sha1($_REQUEST['_pass']);
                $usuarioModel->agregar($_REQUEST);
            }catch(Exception $e){
                $e->getMessage();
            }
        }
        
        public function updateAction(){
            try{
                $usuarioModel = new Usuario();
                $_REQUEST['_pass'] = sha1($_REQUEST['_pass']);
                $usuarioModel->modificar($_REQUEST);
            }catch(Exception $e){
                $e->getMessage();
            }
        }
        
        public function deleteAction(){
            try{
                $usuarioModel = new Usuario();
                $usuarioModel->borrar($_REQUEST['_id']);
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
        
        public function addFormAction(){
            try{
                $view = new View('abm/usuarios/form_usuarios_add');
                echo $view;
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
        
        public function editFormAction(){
            try{
                $view = new View('abm/usuarios/form_usuarios_edit');
                $usuarioModel = new Usuario();               
                $view->datos = $usuarioModel->filterBy('_id = ' . $_REQUEST['_id'])->findOne()->toArray();
                echo $view;
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
}
?>