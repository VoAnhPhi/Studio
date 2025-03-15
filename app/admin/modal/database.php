<?php

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "studio";
    private $conn;

    /**
     * Constructor của lớp Database, tự động kết nối khi khởi tạo.
     */
    public function __construct()
    {
        $this->connect();
    }


    /**
     * Kết nối đến cơ sở dữ liệu.
     */
    private function connect()
    {
        try {
            $dsn = "mysql:host={$this->servername};dbname={$this->dbname};charset=utf8";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->logError("Connection Error", $e);
            die("Database connection failed. Please try again later.");
        }
    }

    /**
     * Trả về kết nối PDO.
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->conn;
    }

    /**
     * Thực thi truy vấn SQL và trả về kết quả (INSERT, UPDATE, DELETE, SELECT).
     * @param string $sql
     * @param array $params
     * @param bool $returnInsertId
     * @return mixed
     */
    public function executeQuery(string $sql, array $params = [], bool $returnInsertId = false): mixed
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);

            if ($returnInsertId) {
                return $this->conn->lastInsertId();
            }

            // Nếu là câu lệnh SELECT, trả về kết quả
            if (str_starts_with(strtoupper(trim($sql)), 'SELECT')) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            // Các câu lệnh khác (INSERT, UPDATE, DELETE)
            return true;
        } catch (PDOException $e) {
            $this->logError("SQL Execution Error", $e, $sql, $params);
            echo "Lỗi SQL: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Thực thi truy vấn INSERT và trả về ID vừa được thêm.
     * @param string $sql
     * @param array $params
     * @return int|false
     */
    public function insert(string $sql, array $params = []): int|false
    {
        return $this->executeQuery($sql, $params, true);
    }

    /**
     * Lấy tất cả kết quả từ truy vấn SELECT.
     * @param string $sql
     * @param array $params
     * @return array
     */
    public function getAll(string $sql, array $params = []): array
    {
        return $this->executeQuery($sql, $params) ?? [];
    }

    /**
     * Lấy một dòng kết quả từ truy vấn SELECT.
     * @param string $sql
     * @param array $params
     * @return array|false
     */
    public function getOne(string $sql, array $params = []): array|false
    {
        $results = $this->executeQuery($sql, $params);
        return $results ? $results[0] : false;
    }

    /**
     * Thực thi truy vấn không trả về dữ liệu (INSERT, UPDATE, DELETE).
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = []): bool
    {
        return (bool) $this->executeQuery($sql, $params);
    }

    /**
     * Thực hiện transaction với callback.
     * @param callable $callback
     * @return bool
     */
    public function transaction(callable $callback): bool
    {
        try {
            $this->conn->beginTransaction();
            $callback($this);
            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            $this->logError("Transaction Error", $e);
            return false;
        }
    }

    /**
     * Ghi log lỗi chi tiết vào file.
     * @param string $context
     * @param PDOException $e
     * @param string|null $sql
     * @param array|null $params
     */
    private function logError(string $context, PDOException $e, string $sql = null, array $params = null): void
    {
        $logMessage = sprintf(
            "[%s] %s: %s\nSQL: %s\nParams: %s\n\n",
            date('Y-m-d H:i:s'),
            $context,
            $e->getMessage(),
            $sql ?? 'N/A',
            $params ? json_encode($params) : 'N/A'
        );

        file_put_contents('error_log.txt', $logMessage, FILE_APPEND);
    }

    /**
     * Đóng kết nối PDO.
     */
    public function close(): void
    {
        $this->conn = null;
    }
}
