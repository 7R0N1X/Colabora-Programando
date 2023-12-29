<?php

session_start();

require_once('../database/db.php');

// Verificar si se proporcionó un código de sala
if (isset($_GET['codigo_sala']) && !empty($_GET['codigo_sala'])) {
    $codigo_sala = $_GET['codigo_sala'];

    // Consulta a la base de datos para verificar el código de sala
    $sql = "SELECT * FROM salas WHERE codigo = '$codigo_sala'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Código de sala válido, redirigir a la página de la sala
        header("Location: sala.php?codigo=$codigo_sala");
        exit;
    } else {
        // Código de sala inválido, redirigir a index.html
        header("Location: index.php");
        exit;
    }
} else {
    // Si no se proporciona un código, redirigir de vuelta a index.html
    header("Location: index.php");
    exit;
}

?>