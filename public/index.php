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
  <title>Plataforma de Colaboración Estudiantil</title>
</head>

<body>

  <div id="particles-js"></div>

  <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="container-sm text-start">
      <h1 class="mb-4">Bienvenido a la Plataforma de Colaboración Estudiantil</h1>
      <p class="mb-3">Únete a una sala de colaboración:</p>
      <div class="row">
        <div class="col-12 col-md-3 mb-3">
          <a href="crear_sala.php" class="btn btn-primary btn-block">Nueva sala</a>
        </div>
        <div class="col-12 col-md-5 mb-3">
          <!-- Formulario para ingresar a una sala existente -->
          <form action="ingresar_sala.php" method="GET">
            <div class="input-group">
              <input type="text" class="form-control" id="codigo_sala" name="codigo_sala" placeholder="Código de sala"
                required>
              <button type="submit" class="btn btn-secondary btn-block mt-sm-0 mt-2">Ingresar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="./js/particles.min.js"></script>
  <script src="./js/particles.js"></script>

</body>

</html>