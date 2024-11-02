<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "login_registrer");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si el formulario fue enviado
if (isset($_POST['numero_casillero']) && isset($_POST['nombre']) && isset($_POST['matricula']) && isset($_POST['hora_entrada']) && isset($_POST['hora_salida'])) {
    $numero_casillero = $_POST['numero_casillero'];
    $nombre = $_POST['nombre'];
    $matricula = $_POST['matricula'];
    $hora_entrada = $_POST['hora_entrada'];
    $hora_salida = $_POST['hora_salida'];

    // Actualizar el estado del casillero a "ocupado" y registrar los detalles de la reservación
    $sql = "UPDATE casilleros 
            SET estado = 'Ocupado', fecha_reservacion = CURDATE(), usuario = '$nombre', matricula = '$matricula', hora_entrada = '$hora_entrada', hora_salida = '$hora_salida' 
            WHERE numero_casillero = $numero_casillero";
    
    if ($conexion->query($sql) === TRUE) {
        echo "Cubiculo reservado exitosamente a nombre de $nombre. <a href='index.php'>Volver</a>";
    } else {
        echo "Error al reservar: " . $conexion->error;
    }
} else {
    echo "Faltan datos para la reservación. <a href='index.php'>Volver</a>";
}

// Cerrar la conexión
$conexion->close();
?>
