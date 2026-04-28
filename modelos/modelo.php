<?php
require_once __DIR__ . '/../conexion/conexion.php';

class Producto {
    private $conn;
    private $table = 'productos';

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->conectar();
    }

    public function listar() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $categoria, $precio, $stock, $fecha_registro) {
        $sql = "INSERT INTO {$this->table} (nombre, categoria, precio, stock, fecha_registro)
                VALUES (:nombre, :categoria, :precio, :stock, :fecha_registro)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':nombre' => $nombre,
            ':categoria' => $categoria,
            ':precio' => $precio,
            ':stock' => $stock,
            ':fecha_registro' => $fecha_registro
        ]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id
        ]);
    }
}
?>