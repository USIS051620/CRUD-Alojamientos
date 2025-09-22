<div class="row justify-content-center">
  <div class="col-md-8">
    <h2>Agregar alojamiento (administrador)</h2>
    <?php if (!empty($error)): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
    <form method="post" action="index.php?page=admin&action=create">
      <div class="mb-3"><label class="form-label">Título</label><input class="form-control" name="title" required></div>
      <div class="mb-3"><label class="form-label">Descripción</label><textarea class="form-control" name="description"></textarea></div>
      <div class="mb-3"><label class="form-label">Precio (USD)</label><input class="form-control" name="price" type="number" step="0.01"></div>
      <div class="mb-3"><label class="form-label">Imagen (URL)</label><input class="form-control" name="image" type="text"></div>
      <button class="btn btn-success">Agregar alojamiento</button>
    </form>
  </div>
</div>
