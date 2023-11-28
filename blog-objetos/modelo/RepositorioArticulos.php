<?php
    require_once "Articulo.php";

    class RepositorioArticulos{
        private $conexion;

        public function __construct($con)
        {            
            $this->conexion = $con;
        }

        public function findAll() {
            //Escribo el texto de la consulta para recuperar todos los artículos de la BBDD
            $textoSQL = "SELECT * FROM articulos";
            //Realizo la consulta aprovechando la conexión que me han pasado en el constructor
            $resultado = $this->conexion->query($textoSQL);
            //Array de artículos que vamos a devolver
            $arts=[];
            $cont=0;
            //Mientras haya filas en la consulta, las convierto en artículos del array
            while($fila = $resultado->fetch_object()){
                $arts[]=new Articulo();
                $arts[$cont]->setPropiedades($fila->titulo, $fila->contenido, $fila->imagen);
                $arts[$cont]->setDestacado($fila->destacado);
                $arts[$cont]->setId($fila->id);
                $cont++;
            }

            return $arts;
        }

        public function findById($idABuscar){
            $textoSQL = "SELECT * FROM articulos WHERE id=$idABuscar";
            $resultado = $this->conexion->query($textoSQL);
            $fila = $resultado->fetch_object();            
            $articulo = new Articulo();
            $articulo->setPropiedades($fila->titulo, $fila->contenido, $fila->imagen);
            $articulo->setDestacado($fila->destacado);
            $articulo->setId($fila->id);
            return $articulo;
        }

        public function save($articulo){
            $textoSQL = "INSERT INTO articulos (titulo, contenido, imagen, fecha, destacado) VALUES ";
            $textoSQL .= "('$articulo->titulo', '$articulo->contenido', '$articulo->imagen', '$articulo->fecha', '$articulo->destacado')";

            $this->conexion->query($textoSQL);
        }

        public function update($articulo){
            $textoSQL = "UPDATE articulos SET ";
            $textoSQL .= "titulo='" . $articulo->getTitulo() . "',";
            $textoSQL .= "contenido='" . $articulo->getContenido() . "',";
            $textoSQL .= "imagen='" . $articulo->getImagen() . "',";
            $textoSQL .= "fecha='" . $articulo->getFecha() . "',";
            $textoSQL .= "destacado='" . $articulo->getDestacado() . "' ";
            $textoSQL .= "WHERE id=" . $articulo->getId();
        
            $this->conexion->query($textoSQL);
        }

        public function deleteById($id){
            $textoSQL = "DELETE FROM articulos WHERE id=$id";

            $this->conexion->query($textoSQL);
        }

        public function mostrarCarousel()
        {
            echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">';
     
            $arts = $this->findAll();
            $destacadoAgregado = false;
     
            foreach ($arts as $a) {
                if ($a->getDestacado() == 1) {
                    echo "<div class='carousel-item" . (!$destacadoAgregado ? " active" : "") . "'>
                  <img class='d-block w-100' src='img/" . $a->getImagen() . "' alt='Destacado' style='max-height: 500px;'>
                </div>";
     
                    $destacadoAgregado = true;
                }
            }
     
            if (!$destacadoAgregado) {
                foreach ($arts as $a) {
                    echo "<div class='carousel-item active'>
                  <img class='d-block w-100' src='../img/" . $a->getImagen() . "' alt='Artículo' style='max-height: 500px;'>
                </div>";
                }
            }
     
            echo '</div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>';
        }

    }