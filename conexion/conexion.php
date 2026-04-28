<?php
class Conexion {
    private $host = "localhost";
    private $db = "crud_iestpffaa";
    private $user = "root";
    private $pass = "";
    public $conn;

    public function conectar() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db}",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>