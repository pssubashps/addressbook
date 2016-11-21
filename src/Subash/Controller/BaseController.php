<?php 
namespace Subash\Controller;
use Subash\Common\ViewHelper;
class BaseController {
	protected $view ;
	
	public function __construct () {
		$this->view = new ViewHelper ();
	}
	protected function render ($viewFile,$data =array ()) {
		$view = new ViewHelper ();
		if(isset($data['pagination'])) {
			$pagination = $data['pagination'];
		}
		
		require_once 'views/'.$viewFile.'.php';
	}
	
	
	
}
