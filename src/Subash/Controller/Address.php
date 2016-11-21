<?php

namespace Subash\Controller;

use Subash\Models\AddressBook;
use Subash\Models\Cities;
use Subash\Common\ViewHelper;
use Subash\Common\Pagination;

/**
 * Address related functionality goes here
 *
 * @name Address.php
 * @author subash
 *        
 */
class Address extends BaseController {
	/**
	 * City Model Object
	 * 
	 * @var Subash\Models\Citie
	 */
	private $city;
	/**
	 * AddressBook Model Object
	 * 
	 * @var Subash\Models\AddressBook
	 */
	private $address;
	private $errors = array ();
	public function __construct() {
		parent::__construct ();
		$this->city = new Cities ();
		$this->address = new AddressBook ();
	}
	public function index($request) {
		$currentPage = 1;
		if (isset ( $request ['page'] )) {
			$currentPage = ( int ) $request ['page'];
			if ($currentPage <= 0) {
				$currentPage = 1;
			}
		}
		$totalCount = $this->address->getTotalAddress ();
		$perPage = 2;
		$pagination = new Pagination ( $perPage, $totalCount, $currentPage );
		$start = $pagination->getStartPoint ();
		$data ['address_list'] = $this->address->getAddresses ( $start, $perPage );
		$data ['pagination'] = $pagination;
		$this->render ( 'list', $data );
	}
	public function add($post) {
		if (! empty ( $post ) && $this->validateAdress ( $post )) {
			$ad = new AddressBook ();
			$ad->add ( $post );
			$this->view->setMessage ( "Contact Added successfuly." );
			header ( "location: " . $this->view->getSiteUrl () . "index.php/address/index" );
			exit ();
		}
		$data ['cities'] = $this->city->getAllCities ();
		
		$this->render ( 'add', $data );
	}
	public function edit($request) {
		// get by id and pass to
		$data ['address'] = $this->address->getAddressById ( $request ['id'] );
		if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			$data ['address'] = $request;
			if ($this->validateAdress ( $request )) {
				$ad = new AddressBook ();
				$ad->update ( $request );
				$this->view->setMessage ( "Contact Updated successfuly." );
				// header("location: ".$this->view->getSiteUrl()."index.php/address/index");exit;
			}
		}
		
		$data ['cities'] = $this->city->getAllCities ();
		$this->render ( 'edit', $data );
	}
	public function xml() {
		$result = $this->address->getAddresses ( 0, 1000 );
		$this->array_to_xml ( $result, new \SimpleXMLElement ( '<root/>' ) )->asXML ();
	}
	private function validateAdress($post) {
		$errorFlag = false;
		$name = $post ['fullname'];
		$city = $post ['city'];
		$street = $post ['street'];
		$zipcode = $post ['zipcode'];
		// var_dump($this->isRequired($name) );exit;
		if ($this->isRequired ( $name ) === false || $this->isRequired ( $city ) === false || $this->isRequired ( $street ) === false || $this->isRequired ( $zipcode ) === false) {
			$errorFlag = true;
			$this->errors ['all_required'] = "All are required fields";
			$this->view->setErrors ( $this->errors );
			return false;
		}
		
		return true;
	}
	/**
	 * to check the value is empty or not
	 * if not empty return true else false
	 */
	private function isRequired($value) {
		$value = trim ( $value );
		if (strlen ( $value ) > 0) {
			return true;
		} else {
			return false;
		}
	}
	private function isNumber($value) {
	}
	private function isAlphanumeric($value, $isSpaceAllowed = false) {
	}
	private function array_to_xml(array $arr, \SimpleXMLElement $xml) {
		// echo "<pre>";print_r($arr);exit;
		foreach ( $arr as $k => $v ) {
			is_array ( $v ) ? $this->array_to_xml ( $v, $xml->addChild ( "address" ) ) : $xml->addChild ( $k, $v );
		}
		header ( 'Content-type: text/xml' );
		header ( 'Content-Disposition: attachment; filename="text.xml"' );
		echo $xml;
		exit ();
	}
}