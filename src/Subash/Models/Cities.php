<?php

namespace Subash\Models;

class Cities extends Database {
	function __construct() {
		parent::__construct ();
	}
	public function getAllCities() {
		$query = "SELECT id,city_name from cities";
		// print $query;
		$result = $this->preparedExecute ( $query );
		return $result;
	}
}