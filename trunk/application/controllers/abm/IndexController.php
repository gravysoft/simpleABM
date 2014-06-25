<?php

class IndexController extends Controller {

	function __construct() {
		parent::__construct();
	}

	public function defaultAction() {
		$view = new LoginDocumentView('home', "ABM");
		$view->setDescription("");
		$view->setKeywords("");

		echo $view;
	}

}
?>