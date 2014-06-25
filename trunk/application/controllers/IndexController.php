<?php

class IndexController extends Controller {

	function __construct() {
		parent::__construct();
	}

	public function defaultAction() {
		$view = new CommonDocumentView('home', "Home");
		$view->setDescription("");
		$view->setKeywords("");
		die ($view);
	}

}
?>