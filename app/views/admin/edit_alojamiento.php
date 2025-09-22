<h2>Editar Alojamiento</h2>
<form method="post" action="index.php?page=admin&action=update">
  <input type="hidden" name="id" value="<?php echo $aloj['id']; ?>">
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($aloj['title']); ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Descripción</label>
    <textarea name="description" class="form-control"><?php echo htmlspecialchars($aloj['description']); ?></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Precio</label>
    <input type="number" step="0.01" name="price" value="<?php echo $aloj['price']; ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">URL Imagen (opcional)</label>
    <input type="text" name="image" value="<?php echo htmlspecialchars($aloj['image']); ?>" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Actualizar</button>
  <a href="index.php?page=admin" class="btn btn-secondary">Cancelar</a>
</form>