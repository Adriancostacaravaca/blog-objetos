<?php
        require_once "modelo/conexion.php";
        require_once "modelo/RepositorioArticulos.php";
        $id=$_GET["id"];

        $repo = new RepositorioArticulos($conexion);

        $articulo = $repo->findById($id);

    $titulo="Detalles del artículo";
    $activo = "";
    include_once "templates/header.php";
?>

    <main>
        
        <?php

        $articulo->mostrarDetalles();
?>

    </main>

    <?php include_once "templates/footer.php"; ?>