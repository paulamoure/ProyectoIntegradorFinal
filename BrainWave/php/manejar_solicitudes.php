<?php

// Acceder a los datos JSON enviados desde el cliente
$datos_json = file_get_contents('php://input');
$datos = json_decode($datos_json, true);

// Enviar una respuesta al cliente
$respuesta = array('mensaje' => 'Solicitud recibida correctamente');
echo json_encode($respuesta);
?>
