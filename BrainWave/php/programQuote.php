<?php
require_once 'conecta.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Verificar si se reciben datos por POST
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    // Obtener el JSON enviado en la solicitud
    $json = file_get_contents( 'php://input' );

    // Decodificar el JSON en un array asociativo
    $data = json_decode( $json, true );

    // Verificar si el JSON se decodificó correctamente
    if ( $data !== null ) {
        // Acceder a los valores del array asociativo
        $fecha = $data[ 'fecha' ];
        $hora = $data[ 'hora' ];
        $id_psicologo = $data[ 'id_psicologo' ];
        $usuario = $data[ 'usuario' ];

        // Escapar los datos para evitar inyección SQL
        $fecha = mysqli_real_escape_string( getConexion(), $fecha );
        $hora = mysqli_real_escape_string( getConexion(), $hora );
        $id_psicologo = mysqli_real_escape_string( getConexion(), $id_psicologo );
        $usuario = mysqli_real_escape_string( getConexion(), $usuario );

        // Construir la consulta SQL para insertar la cita
        $query = "INSERT INTO appts (id_psych, id_patient, date, hour ) VALUES ('$id_psicologo', '$usuario', '$fecha', '$hora')";

        if ( mysqli_query( getConexion(), $query ) ) {
            $res = array( 'status' => 'ok' );
            echo json_encode( $res );
        } else {
            echo 'Error al programar la cita: ' . mysqli_error( getConexion() );
        }
        mysqli_close(getConexion());
    } else {
        // Si no se pudo decodificar el JSON correctamente
        echo 'Error al decodificar el JSON.';
    }
} else {
    // Si no se recibieron datos por POST
    echo 'Acceso denegado.';
}
?>
