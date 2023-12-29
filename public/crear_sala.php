<?php

session_start();

require_once('../database/db.php');

// Generar un código único para la sala
$codigo_sala = substr(md5(uniqid(rand(), true)), 0, 8);

// Insertar el nuevo código de sala en la base de datos
$sql = "INSERT INTO salas (codigo) VALUES ('$codigo_sala')";

if ($conn->query($sql) === TRUE) {
    echo "<script>window.location.href = 'sala.php?codigo=$codigo_sala';</script>";
    exit;
} else {
    echo "Error al crear la sala: " . $conn->error;
}

?>