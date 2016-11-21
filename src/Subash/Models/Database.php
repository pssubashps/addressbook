<?php 
namespace Subash\Models;
use Subash\Common\ViewHelper;
class Database  {
	
	
	private $link ;
	
	public function __construct() {
		$view = new  ViewHelper ();
		try {
			$iniValues = $view->getIniValues();
			$this->link = new \PDO("mysql:host=".$iniValues['db.host'].";dbname=".$iniValues['db.name'], $iniValues['db.user'], $iniValues['db.password']);
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
		
		$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}
}
