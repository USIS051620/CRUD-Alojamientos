<div class="row justify-content-center"><div class="col-lg-8"><div class="card shadow-lg p-4"><h3 class="mb-4"><i class="bi bi-pencil-square me-2"></i>Editar alojamiento (ID: <?php echo $item['id']; ?>)</h3><div class="row justify-content-center">
  <div class="col-md-8">
    <h2>Editar alojamiento (ID: <?php echo $item['id']; ?>)</h2>
    <?php if (!empty($error)): ?><div class="alert alert-danger"><?php echo $error; ?></div></div><?php endif; ?>
    <form method="post" action="index.php?page=admin&action=edit&id=<?php echo $item['id']; ?>">
      <div class="mb-3"><label class="form-label">Título</label><div class="input-group"><span class="input-group-text"><i class="bi bi-house"></i></span><input class="form-control" name="title" value="<?php echo htmlspecialchars($item['title']); ?>" required></div></div>
      <div class="mb-3"><label class="form-label">Descripción</label><textarea class="form-control" name="description"><?php echo htmlspecialchars($item['description']); ?></textarea></div>
      <div class="mb-3"><label class="form-label">Precio (USD)</label><div class="input-group"><span class="input-group-text"><i class="bi bi-cash"></i></span><input class="form-control" name="price" type="number" step="0.01" value="<?php echo number_format($item['price'],2); ?>"></div>
      <div class="mb-3"><label class="form-label">Imagen (URL)</label><input class="form-control" name="image" type="text" value="<?php echo htmlspecialchars($item['image']); ?>"></div>
      <button class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>
</div></div></div>