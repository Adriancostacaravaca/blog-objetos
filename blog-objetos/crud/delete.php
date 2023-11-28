<?php
    require_once("../modelo/conexion.php");
    require_once("../modelo/Articulo.php");
    require_once("../modelo/RepositorioArticulos.php");

    $id = $_GET["id"];

        $repo=new RepositorioArticulos($conexion);
        $repo->deleteById($id);
    
    
        header("location: index.php");
      