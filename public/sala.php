<?php
session_start();

// Verificar si se ha proporcionado un código de sala válido
if (!isset($_GET['codigo']) || empty($_GET['codigo'])) {
  header("Location: index.php");
  exit;
}

$codigo_sala = $_GET['codigo'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <title>Sala de Colaboración -
    <?php echo isset($codigo_sala) ? $codigo_sala : 'Código no definido'; ?>
  </title>
</head>

<body>

  <div id="particles-js"></div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">Colabora Programando</a>
      <div class="d-flex align-items-center ms-auto">
        <span class="me-2">Sala de Colaboración -
          <?php echo isset($codigo_sala) ? $codigo_sala : 'Código no definido'; ?>
        </span>
      </div>
    </div>
  </nav>

  <!-- Área del editor de código -->
  <div class="container" id="contenedor_codigo">
    <textarea id="codigo" name="codigo"></textarea>
  </div>

  <script src="./js/logica_cliente.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="./js/particles.min.js"></script>
  <script src="./js/particles.js"></script>

</body>

</html>