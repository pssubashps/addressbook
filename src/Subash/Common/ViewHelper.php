<?php
namespace Subash\Common;

class ViewHelper {

    public  function getSiteUrl()
    {
        return 'http://localhost:8090/addressbook/';
    }

    public function setErrors ($errors) {
        $_SESSION['errors'] = $errors;
    }
    /**
    * @return array
    */
    public function getErrors () {
        if(isset($_SESSION['errors'])) {
            return $_SESSION['errors'];
        }else{
            return false;
        }
    }
}