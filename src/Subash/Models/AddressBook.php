<?php
namespace Subash\Models;

class AddressBook extends Database {
    
    function __construct () {
        parent::__construct ();
    }

    public function add ($data) {
        $keys = array_keys($data);
        $vals = array_values($data);

        $q1 = "INSERT INTO address_book (".implode(", ",$keys).") ";
        $q2 = "VALUES (".implode(", ",array_map(function($val) { return "'".$val."'";} , $vals)).")";
        $query = $q1.$q2;
        $this->execute($query);
    }

    public function getAddresses($start,$limit) {
        $query = "SELECT a.id,a.fullname,a.street,a.zipcode,c.city_name FROM address_book a LEFT JOIN cities c ON a.city = c.id LIMIT $start,$limit";
        $result = $this->preparedExecute($query);
        return $result;
    }

    public function getTotalAddress () {
        $query = "SELECT count(id) as totalCount from address_book";
        $result = $this->preparedExecute($query);
       
        return $result[0]['totalCount'];
    }
}