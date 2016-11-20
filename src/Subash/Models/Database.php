<?php 
namespace Subash\Models;

class Database  {
	
	
	private $link ;
	
	public function __construct() {
		try {
			$this->link = new \PDO("mysql:host=localhost;dbname=address", 'root', 'root');
			// 			set the PDO error mode to exception
									   $this->link->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully";
		}
		catch(\PDOException $e)
						    {
			echo "Connection failed: " . $e->getMessage();exit;
		}
	}
	
	public function execute($query) {
		return $this->link->query($query);
	}
	
	public function preparedExecute($query) {
		$sth = $this->link->prepare($query);
		$sth->execute();
		
		$result = $sth->fetchAll();
		return $result;
	}
}
