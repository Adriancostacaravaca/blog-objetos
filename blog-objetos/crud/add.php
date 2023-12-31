<?php
    require_once("../modelo/conexion.php");
    require_once("../modelo/Articulo.php");
    require_once("../modelo/RepositorioArticulos.php");
    if (isset($_POST['submit'])) {
        if(isset($_FILES['imagen'])) {
          $nombreFichero = date("Y-m-d - H-i-s")."-".$_FILES['imagen']['name'];
          //Leo la ubicación temporal del archivo para después dejarlo en la carpeta deseada
          $file_loc = $_FILES['imagen']['tmp_name'];        
          //movemos el archivo a la carpeta deseada
          move_uploaded_file($file_loc, "../img/".$nombreFichero); 
      
        }else{
          $nombreFichero="imagen.jpg";
        }

        if (isset($_POST["destacado"])) {

          $destacado = 1;
        }else{
          $destacado = 0;
        }


        $articulo=new Articulo();
        $articulo->setPropiedades($_POST["titulo"], $_POST["contenido"], $nombreFichero);
        $articulo->setFecha($_POST["fecha"]);
        $articulo->setDestacado($destacado);
        $repo=new RepositorioArticulos($conexion);
        $repo->save($articulo);
    
        header("location: form_add.php?mensaje=Producto creado");
      }