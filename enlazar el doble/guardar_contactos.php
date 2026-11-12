<?php
$conn = new mysqli("localhost", "root", "", "mi_base");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';

$stmt = $conn->prepare("INSERT INTO contactos (nombre, correo, mensaje) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $correo, $mensaje);

if ($stmt->execute()) {
    echo "Contacto guardado. <a href='index.html'>Volver</a>";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>