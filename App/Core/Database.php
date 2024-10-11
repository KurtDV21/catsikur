<?php

namespace App\Core;

use mysqli;

class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = ''; 
    private $dbname = 'cat_adoption'; 
    private $connection;

    public function connect() {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        return $this->connection;
    }
}
