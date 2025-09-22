<div class="row">
  <div class="col-12"><h1 class="mb-4">Alojamientos disponibles</h1></div>
  <?php if (empty($accommodations)): ?><div class="col-12"><p>No hay alojamientos.</p></div><?php endif; ?>
  <?php foreach ($accommodations as $acc): ?>
  <div class="col-md-4 mb-4">
    <div class="card h-100 shadow-lg">
      <img src="<?php echo ($acc['image']? htmlspecialchars($acc['image']) : 'https://via.placeholder.com/800x400?text='.urlencode($acc['title'])); ?>" class="card-img-top" alt="Imagen">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title"><?php echo htmlspecialchars($acc['title']); ?></h5>
        <p class="card-text"><?php echo htmlspecialchars($acc['description']); ?></p>
        <p class="mt-auto"><strong>Precio:</strong> $<?php echo number_format($acc['price'],2); ?></p>
        <?php if (isset($_SESSION['user'])): ?>
          <?php $has = (new UserAccommodation())->userHas($_SESSION['user']['id'], $acc['id']); ?>
          <?php if ($has): ?>
            <form method="post" action="index.php?page=user&action=remove" class="mt-2">
              <input type="hidden" name="accommodation_id" value="<?php echo $acc['id']; ?>">
              <button class="btn btn-outline-danger btn-sm">Eliminar de mi cuenta</button>
            </form>
          <?php else: ?>
            <form method="post" action="index.php?page=user&action=add" class="mt-2">
              <input type="hidden" name="accommodation_id" value="<?php echo $acc['id']; ?>">
              <button class="btn btn-primary btn-sm">Agregar a mi cuenta</button>
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
