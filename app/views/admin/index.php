<div class="card shadow-lg">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h3 class="m-0">
      <i class="bi bi-speedometer2 me-2"></i>Panel administrador — Alojamientos
    </h3>
    <a href="index.php?page=admin&action=create" class="btn btn-success">
      <i class="bi bi-plus-circle"></i> Agregar
    </a>
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-12">

        <!-- ====== Tabla: visible desde md (>=768px) ====== -->
        <div class="d-none d-md-block">
          <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Título</th>
                  <th>Descripción</th>
                  <th>Ubicación</th>
                  <th>Precio</th>
                  <th>Imagen</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list as $a): ?>
                  <tr>
                    <td><?php echo $a['id']; ?></td>
                    <td><?php echo htmlspecialchars($a['title']); ?></td>
                    <td><?php echo htmlspecialchars($a['description']); ?></td>
                    <td><?php echo htmlspecialchars($a['location']); ?></td>
                    <td><?php echo number_format($a['price'], 2); ?></td>
                    <td style="width:120px;">
                      <img
                        src="<?php echo ($a['image'] ? htmlspecialchars($a['image']) : 'https://via.placeholder.com/120x80'); ?>"
                        style="width:120px;height:80px;object-fit:cover;"
                        class="rounded"
                        alt="">
                    </td>
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

        <!-- ====== Cards: visibles solo en móvil (<768px) ====== -->
        <div class="d-md-none">
          <?php foreach ($list as $a): ?>
            <div class="card border-0 shadow-sm mb-3">
              <div class="card-body">
                <div class="d-flex gap-3">
                  <img
                    src="<?php echo ($a['image'] ? htmlspecialchars($a['image']) : 'https://via.placeholder.com/160x100'); ?>"
                    alt=""
                    class="rounded"
                    style="width:120px;height:80px;object-fit:cover;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1"><?php echo htmlspecialchars($a['title']); ?></h6>
                    <div class="text-secondary small text-clamp-2 mb-2">
                      <?php echo htmlspecialchars($a['description']); ?>
                    </div>
                    <div class="small d-flex flex-wrap gap-3">
                      <span><i class="bi bi-geo-alt"></i>
                        <?php echo htmlspecialchars($a['location']); ?>
                      </span>
                      <span><i class="bi bi-cash"></i>
                        <?php echo number_format($a['price'], 2); ?>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="mt-3 d-flex justify-content-end gap-2">
                  <a href="index.php?page=admin&action=edit&id=<?php echo $a['id']; ?>"
                    class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1">
                    <i class="bi bi-pencil-square"></i><span>Editar</span>
                  </a>
                  <a href="index.php?page=admin&action=delete&id=<?php echo $a['id']; ?>"
                    class="btn btn-danger btn-sm d-inline-flex align-items-center gap-1"
                    onclick="return confirm('¿Eliminar alojamiento?');">
                    <i class="bi bi-trash3"></i><span>Eliminar</span>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </div>
</div>