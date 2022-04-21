<?php

require_once 'db.php';

class Supplier {
    
    function list() {
      $connection = new Connection;
      
      $mysql = $connection->create();
      
      $result = $mysql->query("SELECT * FROM suppliers");
      $suppliers = $result->fetch_all(MYSQLI_ASSOC);
      
      $connection->close($mysql);
      
      return $suppliers;
    }
    
    function create($request) {
      //
    }
    
    function show($id) {
      //
    }
    
    function update($request) {
     //
    }
    
    function delete($id) {
      //
    }
}