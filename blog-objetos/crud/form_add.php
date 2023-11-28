<?php
  $titulo = "Añadir artículo";
  $activo = "Añadir";
  require_once("../templates/headercrud.php");
?>
<div class="container">
  <h1>Añadir articulo</h1>

  <form action="add.php" method="post" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="titulo" class="form-label">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>

    <div class="mb-3">
      <label for="contenido" class="form-label">Contenido</label>
      <textarea class="form-control" id="contenido" name="contenido" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen</label>
      <input type="file" class="form-control" id="imagen" name="imagen">
    </div>

    <div class="mb-3">
      <label for="fecha" class="form-label">Fecha</label>
      <input type="date" class="form-control" id="fecha" name="fecha" required>
    </div>

    <div class="mb-3">
      <label for="destacado" class="form-label">Destacado</label>
      <input type="checkbox" class="form-label" id="destacado" name="destacado">
    </div>

    <div class="form-group">
      <a href="index.php" class="btn btn-outline-dark">Volver al listado</a>
      <button type="submit" name="submit" class="btn btn-outline-success">Añadir</button>
    </div>
    
  </form>
  
</div>

<?php
require_once "../templates/footer.php";
?>