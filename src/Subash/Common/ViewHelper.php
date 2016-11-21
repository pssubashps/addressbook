<?php

namespace Subash\Common;

class ViewHelper {
	private $iniValues;
	public function __construct() {
		$this->iniValues = parse_ini_file ( __DIR__ . "/../../../config/config.ini", true );
	}
	public function getIniValues() {
		return $this->iniValues;
	}
	public function getSiteUrl() {
		return $this->iniValues ['site_url'];
	}
	public function setErrors($errors) {
		$_SESSION ['errors'] = $errors;
	}
	
	/**
	 *
	 * @return array
	 */
	public function getErrors() {
		if (isset ( $_SESSION ['errors'] )) {
			$errors = $_SESSION ['errors'];
			unset ( $_SESSION ['errors'] );
			return $errors;
		} else {
			return false;
		}
	}
	public function getMessage() {
		if (isset ( $_SESSION ['message'] )) {
			$message = $_SESSION ['message'];
			unset ( $_SESSION ['message'] );
			return $message;
		} else {
			return false;
		}
	}
	public function setMessage($message) {
		$_SESSION ['message'] = $message;
	}
}
