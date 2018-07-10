<?php

namespace core;

/**
 * Config short summary.
 *
 * Config description.
 *
 * @version 1.0
 * @author konstantin.haendel
 */
class config
{
    public $config;
    public function __construct(){
        $this->config = include(__DIR__ . '/../app_config.php');
    }
    public function db() {
        $tmp = (object) array(
            'host' => $this->config->db->host,
            'user' => $this->config->db->username,
            'pass' => $this->config->db->password,
            'dbname' => $this->config->db->dbname,
        );
        return $tmp;
    }
}