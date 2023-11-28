<?php
$titulo = "Modificar artículo";
$activo = "";
require_once("../templates/headercrud.php");
  require_once("../modelo/conexion.php");
    require_once("../modelo/Articulo.php");
    require_once("../modelo/RepositorioArticulos.php");

  $id = $_GET["id"];
  $repo = new RepositorioArticulos($conexion);
  $articulo = $repo->findById($id);


?>
<div class="container">
  <h1>Modificar articulo</h1>

  <form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="mb-3">
      <label for="titulo" class="form-label">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $articulo->getTitulo();?>" required>
    </div>

    <div class="mb-3">
      <label for="contenido" class="form-label">Contenido</label>
      <textarea class="form-control" id="contenido" name="contenido" rows="3" required><?php echo $articulo->getContenido();?></textarea>
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen</label>
      <input type="file" class="form-control" id="imagen" name="imagen">
      <input type="hidden" name="oculto" value="<?php echo $articulo->getImagen();?>">
      <img src="../img/<?php echo $articulo->getImagen();?>" style="height: 100px;">
    </div>

    <div class="mb-3">
      <label for="fecha" class="form-label">Fecha</label>
      <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $articulo->getFecha();?>" required>
    </div>

    <div class="mb-3">
      <label for="destacado" class="form-label">Destacado</label>
      <input type="checkbox" class="form-label" id="destacado" name="destacado" <?php echo $articulo->getDestacado() == 0 ? "" : "checked" ?>>
    </div>

    <div class="form-group">
      <a href="index.php" class="btn btn-outline-dark">Volver al listado</a>
      <button type="submit" name="submit" class="btn btn-outline-success">Modificar</button>
    </div>
  </form>

</div>

<?php include_once "../templates/footer.php"; ?>