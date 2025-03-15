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
            $this->conn = new PDO(
                "mysql:host=$this->servername;dbname=$this->dbname;charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Log lỗi thay vì echo trực tiếp (có thể mở rộng với Logger)
            error_log("Database connection failed: " . $e->getMessage());
            die("Database connection failed. Please try again later.");
        }
    }

    /**
     * Trả về kết nối PDO
     * @return PDO
     */
    public function getConnection()
    {
        return $this->conn;
    }

    /**
     * Thực thi truy vấn INSERT và trả về ID vừa được thêm
     * @param string $sql
     * @param array $params
     * @return int
     */
    public function insert($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            $this->logError($e);
            return false;
        }
    }

    /**
     * Lấy tất cả kết quả từ truy vấn
     * @param string $sql
     * @param array $params
     * @return array
     */
    public function getAll($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->logError($e);
            return [];
        }
    }

    /**
     * Lấy một dòng kết quả từ truy vấn
     * @param string $sql
     * @param array $params
     * @return array|false
     */
    public function getOne($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->logError($e);
            return false;
        }
    }

    /**
     * Thực thi truy vấn không trả về dữ liệu (INSERT, UPDATE, DELETE)
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            $this->logError($e);
            return false;
        }
    }

    /**
     * Thực hiện transaction với callback
     * @param callable $callback
     * @return bool
     */
    public function transaction(callable $callback)
    {
        try {
            $this->conn->beginTransaction();
            $callback($this);
            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            $this->logError($e);
            return false;
        }
    }

    /**
     * Thực hiện câu lệnh UPDATE
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function update($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            $this->logError($e);
            return false;
        }
    }

    /**
     * Thực hiện câu lệnh DELETE
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function delete($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            $this->logError($e);
            return false;
        }
    }

    /**
     * Log lỗi chi tiết vào file
     * @param PDOException $e
     */
    private function logError(PDOException $e)
    {
        error_log("SQL Error: " . $e->getMessage());
    }

    /**
     * Đóng kết nối PDO
     */
    public function close()
    {
        $this->conn = null;
    }
}
