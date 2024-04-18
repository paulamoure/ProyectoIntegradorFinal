<?php
require_once 'conecta.php';
ini_set('display_errors', 1);
error_reporting(E_ALL); 
session_start();

$conexion = getConexion();
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    if ( isset( $_POST[ 'nombre' ] ) && 
         isset( $_POST[ 'apellidos' ] ) && 
         isset( $_POST[ 'correo' ] ) ) {

        $nombre = mysqli_real_escape_string( $conexion, $_POST[ 'nombre' ] );
        $apellidos = mysqli_real_escape_string( $conexion, $_POST[ 'apellidos' ] );
        $email = mysqli_real_escape_string( $conexion, $_POST[ 'correo' ] );
        $descrption = mysqli_real_escape_string( $conexion, $_POST[ 'descripcion' ] );
        
        $query = "UPDATE users SET 
                  nombre = ?,
                  apellidos = ?,
                  email = ?,
                  descrption = ?
                  WHERE username = ?";

        if ( $conexion->connect_error ) {
            die( 'Connection failed: ' . $conexion->connect_error );
        }

        $stmt = mysqli_prepare( $conexion, $query );
        mysqli_stmt_bind_param( $stmt, 'sssss', $nombre, $apellidos, $email, $descrption, $_SESSION[ 'username' ] );

        if ( mysqli_stmt_execute( $stmt ) ) {
            $response = array(
                'status' => 'success',
                'message' => 'Datos actualizados correctamente'
            );
            echo json_encode( $response );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error al actualizar los datos. Por favor, inténtalo de nuevo más tarde.'

            );
            echo json_encode( $response );
        }

        mysqli_stmt_close( $stmt );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Por favor, completa todos los campos del formulario.'
        );
        echo json_encode( $response );
    }
} else {
    header( 'Location: editUser.php' );
    exit();
}
?>
