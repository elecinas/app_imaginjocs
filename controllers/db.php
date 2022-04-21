<?php

class Connection {
    private $host;
    private $username;
    private $passwd;
    private $dbname;
    
    function __construct() {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->passwd = '';
        $this->dbname = 'imaginejocs-SQL';
    }
    
    function create() {
        $connection = new mysqli($this->host, $this->username, $this->passwd, $this->dbname);
        return $connection;
    }
    
    function close($connection) {
        $connection->close();
    }
}