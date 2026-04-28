<?php
require_once __DIR__ . '/../modelos/modelo.php';
$producto = new Producto();
$productos = $producto->listar();

$id = $_GET['id'] ?? '';
$nombre = $_GET['nombre'] ?? '';
$categoria = $_GET['categoria'] ?? '';
$precio = $_GET['precio'] ?? '';
$stock = $_GET['stock'] ?? '';
$fecha_registro = $_GET['fecha_registro'] ?? '';

$accion = $id ? 'actualizar' : 'guardar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }
        .contenedor {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }
        h1 {
            text-align: center;
        }
        form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }
        input, button {
            padding: 10px;
        }
        button {
            background: green;
            color: white;
            border: none;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #333;
            color: white;
        }
        .eliminar {
            background: red;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>CRUD de Productos</h1>

        <form action="../controlador/controlador.php?op=<?php echo $accion; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="nombre" placeholder="Nombre del producto" value="<?php echo $nombre; ?>" required>
            <input type="text" name="categoria" placeholder="Categoría" value="<?php echo $categoria; ?>" required>
            <input type="number" step="0.01" name="precio" placeholder="Precio" value="<?php echo $precio; ?>" required>
            <input type="number" name="stock" placeholder="Stock" value="<?php echo $stock; ?>" required>
            <input type="date" name="fecha_registro" value="<?php echo $fecha_registro; ?>" required>
            <button type="submit"><?php echo $id ? 'Actualizar' : 'Guardar'; ?></button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $item): ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['nombre']; ?></td>
                        <td><?php echo $item['categoria']; ?></td>
                        <td><?php echo $item['precio']; ?></td>
                        <td><?php echo $item['stock']; ?></td>
                        <td><?php echo $item['fecha_registro']; ?></td>
                        <td>
                            <a href="index.php?id=<?php echo $item['id']; ?>&nombre=<?php echo urlencode($item['nombre']); ?>&categoria=<?php echo urlencode($item['categoria']); ?>&precio=<?php echo $item['precio']; ?>&stock=<?php echo $item['stock']; ?>&fecha_registro=<?php echo $item['fecha_registro']; ?>">
                                Editar
                            </a>
                            |
                            <a class="eliminar" href="../controlador/controlador.php?op=eliminar&id=<?php echo $item['id']; ?>">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>