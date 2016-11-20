<?php 
namespace Subash\Controller;

use Subash\Models\AddressBook;
use Subash\Models\Cities;
class Address extends BaseController {
	private $city;
	private $address;
	public function __construct()   {
		$this->city = new Cities ();
		$this->address = new AddressBook;
	}
	
	public function index()  {
		$data['address_list']  = $this->address->getAddresses ();
		$this->render('list',$data);
	}
	
	public function add ($post) {
		if(!empty($post)) {
			$ad = new AddressBook ();
			$ad->add($post);
		}
		$data['cities']  = $this->city->getAllCities ();
		$this->render('add',$data);
		
	}
	public function edit () {
		
	}
}
