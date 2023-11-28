<?php
    session_start();
?>
<!doctype html>
<html lang="es">

<head>
  <title><?php echo $titulo?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


</head>

<body>
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" <?php if($activo== "Inicio") echo "class='nav-link px-2 text-white'"; else echo "class='nav-link px-2 text-secondary'"?>>Inicio</a></li>
        </ul>

        <div class="text-end">
        <a href="crud/index.php"><button type="button" class="btn btn-outline-light me-2">Ir al CRUD</button></a>
        </div>

      </div>
    </div>
  </header>