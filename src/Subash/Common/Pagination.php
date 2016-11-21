<?php
class Pagination {
	private $totalRecords;
	private $perPageRecords;
	private $currentPageNo;
	
	public function __construct ($perPageRecords,$totalRecords) {
		$this->perPageRecords = $perPageRecords;
		$this->totalRecords = $totalRecords;
	}
	
	public function getTotalRecords () {
		return $this->totalRecords;
	}
	public function getCurrentPageNo () {
		return $this->currentPageNo;
	}
}
