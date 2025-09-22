<div class="card shadow-lg"><div class="card-header d-flex justify-content-between align-items-center"><h3 class="m-0"><i class="bi bi-speedometer2 me-2"></i>Panel administrador — Alojamientos</h3><a href="index.php?page=admin&action=create" class="btn btn-success"><i class="bi bi-plus-circle"></i> Agregar</a></div><div class="card-body"><div class="row">
  <div class="col-12">
    <table class="table table-striped table-hover align-middle">
      <thead><tr><th>ID</th><th>Título</th><th>Descripción</th><th>Ubicación</th><th>Precio</th><th>Imagen</th><th>Acciones</th></tr></thead>
      <tbody>
        <?php foreach ($list as $a): ?>
          <tr>
            <td><?php echo $a['id']; ?></td>
            <td><?php echo htmlspecialchars($a['title']); ?></td>
            <td><?php echo htmlspecialchars($a['description']); ?></td>
            <td><?php echo htmlspecialchars($a['location']); ?></td>
            <td><?php echo number_format($a['price'],2); ?></td>
            <td style="width:120px;"><img src="<?php echo ($a['image']?htmlspecialchars($a['image']):'https://via.placeholder.com/120x80'); ?>" style="width:120px;height:80px;object-fit:cover;"></td>
            <td class="text-nowrap">
              <div class="d-inline-flex align-items-center gap-2">
                <a class="btn btn-warning btn-sm d-inline-flex align-items-center gap-2"
                  href="index.php?page=admin&action=edit&id=<?php echo $a['id']; ?>">
                  <i class="bi bi-pencil-square"></i><span>Editar</span>
                </a>
                <a class="btn btn-danger btn-sm d-inline-flex align-items-center gap-2"
                  href="index.php?page=admin&action=delete&id=<?php echo $a['id']; ?>"
                  onclick="return confirm('¿Eliminar alojamiento?')">
                  <i class="bi bi-trash3"></i><span>Eliminar</span>
                </a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div></div>