<?php
    class Articulo{
        public $id;
        public $titulo;
        public $contenido;
        public $imagen;
        public $fecha;
        public $destacado;
        public $id_tema;

        public function __construct()
        {
            $this->fecha = date('Y-m-d');
        }

        public function setPropiedades($tit, $cont, $img){
            $this->titulo=$tit;
            $this->contenido = $cont;
            $this->imagen = $img;      
        }


        public function mostrarCard(){
           echo '<div class="col">';
           echo '   <div class="card shadow-sm">';
           echo '     <div class="row p-3">'      ;                
           echo "       <img src='img/$this->imagen' class='card-img-top mx-auto' style='max-width: 10vw;height:5vw'>   "  ;                     
           echo '     </div>';
           echo '     <div class="card-body">';
           echo '       <h3>'. $this->titulo .'</h3>';
           echo '       <p class="card-text text-break">' . $this->contenido . '</p>';
           echo '       <p class="card-text">' . ($this->destacado == 0 ? "No destacado" : "Destacado") . '</p>';
           echo '       <div class="d-flex justify-content-between align-items-center">';
           echo '          <div class="form-group">';
           echo "             <a href='detalle.php?id=$this->id'><button type='button' class='btn btn-outline-dark btn-sm'>Ver detalles</button></a>";
           echo '          </div>';
           echo '       </div>';
           echo '    </div>';
           echo '  </div>';
           echo '</div>';
        }

        public function mostrarDetalles(){
            echo '    <div class=\'container py-5\'>
                    <section style=\'background-color: #eee;\'>
                  <div class=\'container py-5\'>
                    <div class=\'row justify-content-center\'>
                      <div class=\'col-md-8 col-lg-6 col-xl-4\'>
                        <div class=\'card\' style=\'border-radius: 15px;\'>
                          <div class=\'bg-image hover-overlay ripple ripple-surface ripple-surface-light\'
                            data-mdb-ripple-color=\'light\'>
                            <img src=\'img/' . $this->imagen . '\'
                          style=\'border-top-left-radius: 15px; border-top-right-radius: 15px;\' class=\'img-fluid card-img-top\'
                          />
              
                      </div>
                      <div class=\'card-body pb-0\'>
                        <div class=\'d-flex justify-content-between\'>
                          <div>
                            <p>Artículo: ' . $this->titulo . '</p>
                          </div>
                        </div>
                      </div>
                      <hr class=\'my-0\' />
                      <div class=\'card-body pb-0\'>
                        <div class=\'justify-content-between\'>
                          <div>
                            <p>Contenido: ' . $this->contenido . '</p>
                          </div>
                        </div>
                      </div>          
                      <hr class=\'my-0\' />
                      <div class=\'card-body pb-0\'>
                        <div class=\'d-flex justify-content-between align-items-center pb-2 mb-1\'>
                          <div class=\'form-group\'>
                            <a href=\'index.php\'><button type=\'button\' class=\'btn btn-outline-dark btn-sm\'>Regresar</button></a>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
                    </div>';
          }


        public function getTitulo(){
            return $this->titulo;
        }
        

        public function getId() {
            return $this->id;
        }

        public function setId($id){
            $this->id=$id;
        }
        
        public function setFecha($fecha){
            $this->fecha=$fecha;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setContenido($contenido){
            $this->contenido=$contenido;
        }

        public function getContenido(){
            return $this->contenido;
        }

        public function setImagen($imagen){
            $this->imagen=$imagen;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function setIdTema($id_tema){
            $this->id_tema=$id_tema;
        }

        public function getIdTema(){
            return $this->id_tema;
        }

        public function setDestacado($destacado){
            $this->destacado=$destacado;
        }

        public function getDestacado(){
            return $this->destacado;
        }

    }