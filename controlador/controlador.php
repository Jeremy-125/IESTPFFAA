<?php
require_once "../modelos/modelo.php";

class Controlador
{
    public function mostrarMensaje()
    {
        $modelo = new Modelo();
        return $modelo->obtenerMensaje();
    }
}
?>