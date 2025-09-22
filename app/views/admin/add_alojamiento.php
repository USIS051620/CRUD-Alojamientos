<h2>Agregar Alojamiento</h2>
<form method="post" action="index.php?page=admin&action=store">
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="title" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Descripción</label>
    <textarea name="description" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Precio</label>
    <input type="number" step="0.01" name="price" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">URL Imagen (opcional)</label>
    <input type="text" name="image" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Guardar</button>
  <a href="index.php?page=admin" class="btn btn-secondary">Cancelar</a>
</form>