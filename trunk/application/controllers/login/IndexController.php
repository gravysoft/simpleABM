<?php

class IndexController extends Controller {

	function __construct() {
		parent::__construct();
	}

        public function defaultAction() {
		$view = new LoginDocumentView('login/login', "Login");
		$view->setViewHeader(null);
                $view->setViewFooter(null);
		echo $view;
        }

        public function searchAction() {
            try {
                $userName = $_REQUEST['nombre'];
                $passWord = $_REQUEST['password'];
                $userModel = new Usuario();
                echo trim($userModel->login($userName, $passWord));
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
        }
}

?>