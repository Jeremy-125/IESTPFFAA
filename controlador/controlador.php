<?php
require_once __DIR__ . '/../modelos/modelo.php';

$producto = new Producto();
$op = $_GET['op'] ?? '';

switch ($op) {
    case 'guardar':
        $nombre = $_POST['nombre'] ?? '';
        $categoria = $_POST['categoria'] ?? '';
        $precio = $_POST['precio'] ?? 0;
        $stock = $_POST['stock'] ?? 0;
        $fecha_registro = $_POST['fecha_registro'] ?? date('Y-m-d');

        $resultado = $producto->insertar($nombre, $categoria, $precio, $stock, $fecha_registro);

        if ($resultado) {
            header("Location: ../vistas/index.php");
        } else {
            echo "Error al guardar";
        }
        break;

    case 'eliminar':
        $id = $_GET['id'] ?? 0;
        $resultado = $producto->eliminar($id);

        if ($resultado) {
            header("Location: ../vistas/index.php");
        } else {
            echo "Error al eliminar";
        }
        break;

    default:
        echo "Operación no válida";
        break;
}
?>