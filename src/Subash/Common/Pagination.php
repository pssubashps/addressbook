<?php

namespace Subash\Common;

class Pagination {
	private $totalRecordCount;
	private $perPageRecordCount;
	private $currentPageNo;
	public function __construct($perPageRecordCount, $totalRecordCount, $currentPageNo = 1) {
		$this->perPageRecordCount = $perPageRecordCount;
		$this->totalRecordCount = $totalRecordCount;
		$this->currentPageNo = $currentPageNo;
	}
	public function getTotalRecordCount() {
		return $this->totalRecordCount;
	}
	public function getCurrentPageNo() {
		return $this->currentPageNo;
	}
	public function getPerPageRecordCount() {
		return $this->perPageRecordCount;
	}
	public function getStartPoint() {
		return ($this->currentPageNo - 1) * $this->perPageRecordCount;
	}
	public function getTotalPages() {
		return ceil ( $this->totalRecordCount / $this->perPageRecordCount );
	}
}