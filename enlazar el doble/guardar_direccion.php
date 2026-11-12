<?php
$conn = new mysqli("localhost", "root", "", "mi_base");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$direccion = $_POST['direccion'] ?? '';
$cp = $_POST['cp'] ?? '';
$genero = $_POST['genero'] ?? '';
$comentario = $_POST['comentario'] ?? '';

$stmt = $conn->prepare("INSERT INTO direcciones (direccion, cp, genero, comentario) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $direccion, $cp, $genero, $comentario);

if ($stmt->execute()) {
    echo "Dirección guardada. <a href='index.html'>Volver</a>";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>