<?php
include("php/conexion_be.php");

if ($conn->connect_error) {
    die(json_encode(['message' => 'Error al conectar a la base de datos.']));
}

$data = json_decode(file_get_contents('php://input'), true);

if ($data['needLocker'] === 'si') {
    $sql = "SELECT numero_locker FROM lockers WHERE ocupado = 0 ORDER BY numero_locker ASC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $numero_locker = $row['numero_locker'];

        $update_sql = "UPDATE lockers SET ocupado = 1 WHERE numero_locker = $numero_locker";
        if ($conn->query($update_sql) === TRUE) {
            echo json_encode(['message' => "Locker número $numero_locker ha sido reservado."]);
        } else {
            echo json_encode(['message' => 'Error al actualizar el estado del locker.']);
        }
    } else {
        echo json_encode(['message' => 'No hay lockers disponibles.']);
    }
} else {
    echo json_encode(['message' => 'No se necesita un locker.']);
}

$conn->close();
?>
