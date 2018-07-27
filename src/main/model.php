<?php
namespace src\main;
use \PDO;

class Model {
    protected $db;

    function __construct() {
        $this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
        $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );
        $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        //$this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }

    function set($sql, $vars = null)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($vars);
    }

    function setReturn($sql, $vars = null)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($vars);
        return $this->db->lastInsertId();
    }

    function get($sql, $vars = null)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($vars);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function bind_int($sql, $params = null)
    {
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => &$val) {
            $stmt->bindValue(':'.$key, intval($val), PDO::PARAM_INT);
        }
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function bind_get($sql, $params = null)
    {
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => &$val) {
            $stmt->bindParam(':'.$key,$val,PDO::PARAM_INT,1);
        }
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function __destruct() {
        $this->db = null;
    }
}
