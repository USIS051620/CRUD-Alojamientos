<div class="card shadow-lg"><div class="card-header d-flex justify-content-between align-items-center"><h3 class="m-0"><i class="bi bi-speedometer2 me-2"></i>Panel administrador — Alojamientos</h3><a href="index.php?page=admin&action=create" class="btn btn-success"><i class="bi bi-plus-circle"></i> Agregar</a></div><div class="card-body"><div class="row">
  <div class="col-12">
    <h2>Panel administrador — Alojamientos</h2>
    <a href="index.php?page=admin&action=create" class="btn btn-success mb-3">Agregar Alojamiento</a>
  </div>
  <div class="col-12">
    <table class="table table-striped table-hover align-middle">
      <thead><tr><th>ID</th><th>Título</th><th>Descripción</th><th>Precio</th><th>Imagen</th><th>Acciones</th></tr></thead>
      <tbody>
        <?php foreach ($list as $a): ?>
          <tr>
            <td><?php echo $a['id']; ?></td>
            <td><?php echo htmlspecialchars($a['title']); ?></td>
            <td><?php echo htmlspecialchars($a['description']); ?></td>
            <td><?php echo number_format($a['price'],2); ?></td>
            <td style="width:120px;"><img src="<?php echo ($a['image']?htmlspecialchars($a['image']):'https://via.placeholder.com/120x80'); ?>" style="width:120px;height:80px;object-fit:cover;"></td>
            <td>
              <a class="btn btn-warning btn-sm" href="index.php?page=admin&action=edit&id=<?php echo $a['id']; ?>">Editar</a>
              <a class="btn btn-danger btn-sm" href="index.php?page=admin&action=delete&id=<?php echo $a['id']; ?>" onclick="return confirm('¿Eliminar alojamiento?')">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div></div>