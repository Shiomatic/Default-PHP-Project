<?php

namespace core;

use PDO;

class db {
    public $connection;
    public $config;
    public function __construct() {
        $this->config = new config();
        if($this->config->db->host) $this->connection = self::setConnection();
    }
    private function setConnection() {
        $dsn = 'mysql:host=' . $this->config->db()->host . ';dbname=' . $this->config->db()->dbname . ';charset=utf8';
        $db = new PDO($dsn, $this->config->db()->user, $this->config->db()->pass);
        return $db;
    }
}

?>