<?php 

class DataHandler {
    private PDO $db;
    public function __construct($host, $database, $username, $password)
    {
        $this->db = new PDO("mysql:host=".$host.";dbname=".$database, $username, $password);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function set($sql, $params) {
        $stmt = $this->db->prepare($sql);
        $i = 1;
        foreach($params as $param) {
            $stmt->bindParam($i, $param[0], $param[1]);
            $i++;
            
        }
        $stmt->execute();
    }

    public function get($sql, $params): array {

        $stmt = $this->db->prepare($sql);
        $i = 1;
        foreach($params as $param) {
            $stmt->bindParam($i, $param[0], $param[1]);
            $i++;
            
        }
        $stmt->execute();
        return  $stmt->fetchAll();
        
    }
}