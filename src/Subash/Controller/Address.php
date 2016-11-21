<?php
namespace Subash\Controller;

use Subash\Models\AddressBook;
use Subash\Models\Cities;
use Subash\Common\ViewHelper;
use Subash\Common\Pagination;
class Address extends BaseController {
    private $city;
    private $address;
    
    private $errors = array ();
    public function __construct()   {
        parent::__construct ();
        $this->city = new Cities ();
        $this->address = new AddressBook;
        
    }
    
    public function index($request)  {
		$currentPage = 1;
		if(isset($request['page'])){
			$currentPage = (int) $request['page'];
			if($currentPage <=0) {
				$currentPage = 1;
			}
		}
        $totalCount = $this->address->getTotalAddress ();
		$perPage = 2;
        $pagination = new Pagination ($perPage,$totalCount,$currentPage );
		$start = $pagination->getStartPoint();
        $data['address_list']  = $this->address->getAddresses ($start,$perPage);
        $data['pagination'] = $pagination;
        $this->render('list',$data);
    }
    
    public function add ($post) {
        if(!empty($post) && $this->validateAdress($post)) {
            $ad = new AddressBook ();
            $ad->add($post);
            $this->view->setMessage ("Contact Added successfuly.");
            header("location: ".$this->view->getSiteUrl()."index.php/address/index");exit;
        }
        $data['cities']  = $this->city->getAllCities ();
        
        $this->render('add',$data);
        
    }
    
    public function edit () {
        
    }
    
    private function validateAdress($post) {
        $errorFlag = false;
        $name = $post['fullname'];
        $city = $post['city'];
        $street = $post['street'];
        $zipcode = $post['zipcode'];
        //var_dump($this->isRequired($name) );exit;
        if($this->isRequired($name) === false || $this->isRequired($city) === false || $this->isRequired($street) === false || $this->isRequired($zipcode) === false ) {
            $errorFlag = true;
            $this->errors['all_required'] = "All are required fields";
            $this->view->setErrors($this->errors);
            return false;
        }
        
        return true;
    }
    /**
    * to check the value is empty or not
    * if not empty return true else false
    **/
    private function isRequired($value) {
        $value = trim($value);
        if(strlen($value) > 0) {
            return true;
        }else{
            return false;
        }
    }
    
    private function isNumber($value) {
        
    }
    
    private function isAlphanumeric($value,$isSpaceAllowed = false) {
        
    }
}