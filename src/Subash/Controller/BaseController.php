<?php

namespace Subash\Controller;

use Subash\Common\ViewHelper;

/**
 * to give the base functionality to controllers
 *
 * @name BaseController.php
 * @author subash
 *        
 */
class BaseController {
	/**
	 * to access the view for the controllers
	 * 
	 * @var Subash\Common\ViewHelper
	 */
	protected $view;
	public function __construct() {
		$this->view = new ViewHelper ();
	}
	/**
	 * to display the view file
	 * 
	 * @param string $viewFile        	
	 * @param array $data        	
	 */
	protected function render($viewFile, $data = array ()) {
		/**
		 * To get the viewHelper object from the view files
		 * 
		 * @var Subash\Common\ViewHelper
		 */
		$view = new ViewHelper ();
		
		/**
		 * Is any pagination set from controller,
		 * give access to the view file
		 */
		if (isset ( $data ['pagination'] )) {
			$pagination = $data ['pagination'];
		}
		/**
		 * Rendering the view files
		 */
		require_once 'views/' . $viewFile . '.php';
	}
}
