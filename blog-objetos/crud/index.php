<?php

    $titulo = "Inicio CRUD";
    $activo = "Inicio";

    require_once "../modelo/Articulo.php";
    require_once "../modelo/RepositorioArticulos.php";
    require_once "../modelo/conexion.php";
    require_once "../templates/headercrud.php";

    $repo=new RepositorioArticulos($conexion);

    $lista = $repo->findAll();

    echo "<div class='container table-responsive'>";
    echo "<table class='table table-bordered mt-2'>";
    echo "<tr><th class='table-light'>Id</th><th class='table-light'>Título</th><th class='table-light'>Contenido</th><th class='table-light'>Destacado</th><th class='table-light'></th><th class='table-light'></th></tr>";
    
    foreach($lista as $articulo){
        echo "<tr><td>$articulo->id</td>";
        echo "<td>$articulo->titulo</td>";
        echo "<td class='text-break'>$articulo->contenido</td>";
        echo "<td>" . ($articulo->destacado == 0 ? 'No' : 'Sí') . "</td>";
        echo "<td><a href='form_update.php?id=$articulo->id'>Modificar</a></td>";
        echo "<td><a href='delete.php?id=$articulo->id'>Borrar</a></td></tr>";
    }
    
    echo "</table></div>";

    require_once "../templates/footer.php";

