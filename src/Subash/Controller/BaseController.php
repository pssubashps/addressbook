<?php 
namespace Subash\Controller;
use Subash\Common\ViewHelper;
class BaseController {
    public $myname = "Subash ass";
    protected function render ($viewFile,$data =array ()) {
        $view = new ViewHelper ();
        require_once'views/'.$viewFile.'.php';
    }

    
    
}