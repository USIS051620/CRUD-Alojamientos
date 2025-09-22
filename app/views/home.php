<div class="row">
  <div class="col-12">
    <h1 class="mb-4">Alojamientos disponibles</h1>
  </div>
  <?php if (empty($accommodations)): ?><div class="col-12">
      <p>No hay alojamientos.</p>
    </div><?php endif; ?>
  <?php foreach ($accommodations as $acc): ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-lg">
        <img src="<?php echo ($acc['image'] ? htmlspecialchars($acc['image']) : 'https://via.placeholder.com/800x400?text=' . urlencode($acc['title'])); ?>" class="card-img-top" alt="Imagen">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title d-flex align-items-center gap-2"><i class="bi bi-building fs-5"></i><span><?php echo htmlspecialchars($acc['title']); ?></span></h5>
          <p class="card-text d-flex align-items-start gap-2"><i class="bi bi-card-text mt-1"></i><span><?php echo htmlspecialchars($acc['description']); ?></span></p>
          <p class="d-flex align-items-center gap-2"><i class="bi bi-geo-alt"></i><span><strong>Ubicación:</strong> <?php echo htmlspecialchars($acc['location']); ?></span></p>
          <p class="mt-auto d-flex align-items-center gap-2"><i class="bi bi-currency-dollar"></i><span><strong>Precio:</strong> $<?php echo number_format($acc['price'],2); ?></span></p>
          <?php if (isset($_SESSION['user'])): ?>
            <?php $has = (new UserAccommodation())->userHas($_SESSION['user']['id'], $acc['id']); ?>
            <?php if ($has): ?>
              <form method="post" action="index.php?page=user&action=remove" class="mt-2">
                <input type="hidden" name="accommodation_id" value="<?php echo $acc['id']; ?>">
                <button class="btn btn-danger w-100 py-2 d-inline-flex justify-content-center align-items-center gap-2">
                  <i class="bi bi-trash3"></i><span>Eliminar de mi cuenta</span>
                </button>
              </form>
            <?php else: ?>
              <form method="post" action="index.php?page=user&action=add" class="mt-2">
                <input type="hidden" name="accommodation_id" value="<?php echo $acc['id']; ?>">
                <button class="btn btn-success w-100 py-2 d-inline-flex justify-content-center align-items-center gap-2">
                  <i class="bi bi-plus-circle"></i><span>Agregar a mi cuenta</span>
                </button>
              </form>
            <?php endif; ?>
          <?php else: ?>
            <a href="index.php?page=auth&action=login" class="btn btn-secondary btn-sm">Inicia sesión para guardar</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>