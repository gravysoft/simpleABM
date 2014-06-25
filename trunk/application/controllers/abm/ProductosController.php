<?php
class ProductosController extends Controller {

	function __construct() {
		parent::__construct();
	}

	public function defaultAction() {
		$view = new ProductosDocumentView('abm/productos/productos', "Productos");
		$view->setDescription("");
		$view->setKeywords("");

		echo $view;
	}
        
        public function searchAction(){
            try{
                
                $list_view = new View("abm/productos/list_item_producto");
                $response['list_item_producto'] = $list_view->render();
                $productoModel = new Producto();
                $listaProductos = $productoModel->buscar();
                $response['items'] = $listaProductos->toArray();
                $response['paginator'] = $listaProductos->getScroller();
            
            }  catch (Exception $e){
                $e->getMessage();
            }
            echo json_encode($response);
        }
        
        public function addAction(){
            try{
                $productoModel = new Producto();
                $_REQUEST['precio_sugerido'] = $_REQUEST['costo'] - $_REQUEST['descuento'] + $_REQUEST['recargo'];
                $productoModel->agregar($_REQUEST);
            }catch(Exception $e){
                $e->getMessage();
            }
        }
        
        public function updateAction(){
            try{
                $productoModel = new Producto();
                $_REQUEST['precio_sugerido'] = $_REQUEST['costo'] - $_REQUEST['descuento'] + $_REQUEST['recargo'];
                $productoModel->editar($_REQUEST);
                prd($productoModel->getQuery());
            }catch(Exception $e){
                $e->getMessage();
            }
        }
        
        public function deleteAction(){
            try{
                $productoModel = new Producto();
                $productoModel->borrar($_REQUEST['id_producto']);
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
        public function addFormAction(){
            try{
                $view = new View('abm/productos/form_productos_add');
                echo $view;
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
        
        public function editFormAction(){
            try{
                $view = new View('abm/productos/form_productos_edit');
                $productoModel = new Producto();               
                $view->datos = $productoModel->filterBy('id_producto = ' . $_REQUEST['id_producto'])->findOne()->toArray();
                echo $view;
            }  catch (Exception $e){
                $e->getMessage();
            }
        }
}
?>