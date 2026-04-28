<?php
require_once "../controlador/controlador.php";

$controlador = new Controlador();
$mensaje = $controlador->mostrarMensaje();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto IESTPFFAA</title>
</head>
<body>
    <h1>Proyecto base MVC</h1>
    <p><?php echo $mensaje; ?></p>
</body>
</html>