<?php
namespace Subash\Common;

class ViewHelper {
	
	public  function getSiteUrl()
	    {
		//return 'http://localhost:8090/addressbook/';
		return 'http://localhost/personal/addressbook/';
	}
	
	public function setErrors ($errors) {
		$_SESSION['errors'] = $errors;
	}
	
	/**
	* @return array
	    */
	    public function getErrors () {
		if(isset($_SESSION['errors'])) {
			$errors = $_SESSION['errors'];
			unset($_SESSION['errors']);
			return $errors;
		}
		else{
			return false;
		}
	}

    public function getMessage(){
        if(isset($_SESSION['message'])) {
			$message = $_SESSION['message'];
			unset($_SESSION['message']);
			return $message ;
		}
		else{
			return false;
		}
    }
    public function setMessage ($message) {
        
        $_SESSION['message'] = $message;
    }
}
