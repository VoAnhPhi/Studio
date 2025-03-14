<?php
class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "studio";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected Successfully";
        } catch (PDOException $e) {
            echo "Connection Fail: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
    // Phương thức insert của bạn
    public function insert($sql, $param)
    {
        $this->execute($sql, $param);
        return $this->conn->lastInsertId();
    }


    public function getAll($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function execute($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            echo "SQL Execution Error" . $e->getMessage();
            return false;
        }
    }
}
