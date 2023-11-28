<?php

$titulo = "Inicio";
$activo = "Inicio";

    require_once "modelo/Articulo.php";
    require_once "modelo/RepositorioArticulos.php";
    require_once "modelo/conexion.php";
    require_once "templates/header.php";

    

?>



<main>

<?php
    $repo=new RepositorioArticulos($conexion);

    $repo->mostrarCarousel();

?>

  <section class="text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1>Blog de Adrián</h1>
      </div>
    </div>
  </section>

  <div class="album bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php

            $lista = $repo->findAll();
            
            foreach($lista as $articulo){

              $articulo->mostrarCard();


            }


            ?>

      </div>
    </div>
  </div>

</main>
<?php
require_once "templates/footer.php";
?>