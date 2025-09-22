<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card shadow-lg p-4">
      <h3 class="mb-4"><i class="bi bi-pencil-square me-2"></i>Editar alojamiento (ID: <?php echo $item['id']; ?>)</h3>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <?php if (!empty($error)): ?><div class="alert alert-danger"><?php echo $error; ?></div>
        </div><?php endif; ?>
      <form method="post" action="index.php?page=admin&action=edit&id=<?php echo $item['id']; ?>">
        <div class="mb-3"><label class="form-label">Título</label>
          <div class="input-group"><span class="input-group-text"><i class="bi bi-house"></i></span><input class="form-control" name="title" value="<?php echo htmlspecialchars($item['title']); ?>" required></div>
        </div>
        <div class="mb-3"><label for="description" class="form-label">Descripción</label>
          <div class="input-group"><span class="input-group-text"><i class="bi bi-card-text"></i></span><textarea id="description" name="description" rows="3" class="form-control"><?php echo htmlspecialchars($item['description']); ?></textarea></div>
        </div>
        <div class="mb-3"><label for="location" class="form-label">Ubicación</label>
          <div class="input-group"><span class="input-group-text"><i class="bi bi-geo-alt"></i></span><input id="location" name="location" type="text" class="form-control" value="<?php echo htmlspecialchars($item['location']); ?>" required></div>
        </div>
        <div class="mb-3"><label class="form-label">Precio (USD)</label>
          <div class="input-group"><span class="input-group-text"><i class="bi bi-cash"></i></span><input class="form-control" name="price" type="number" step="0.01" value="<?php echo number_format($item['price'], 2); ?>"></div>
        </div>
        <div class="mb-3"><label for="image" class="form-label">Imagen (URL)</label>
          <div class="input-group"><span class="input-group-text"><i class="bi bi-image"></i></span><input id="image" name="image" type="text" class="form-control" value="<?php echo htmlspecialchars($item['image']); ?>"></div>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-2">
          <!-- Cancelar: vuelve a la página anterior si existe; si no, al listado -->
          <a
            href="index.php?page=admin&action=index"
            class="btn btn-outline-secondary d-inline-flex align-items-center gap-1"
            onclick="if (document.referrer) { history.back(); return false; }">
            <i class="bi bi-arrow-left"></i><span>Cancelar</span>
          </a>

          <!-- Actualizar (submit) -->
          <button class="btn btn-primary d-inline-flex align-items-center gap-1">
            <i class="bi bi-save"></i><span>Actualizar</span>
          </button>
        </div>

      </form>
      </div>
    </div>
  </div>
</div>
</div>