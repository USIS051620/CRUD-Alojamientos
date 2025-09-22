<div class="row">
  <div class="col-12">
    <h2>Hola, <?php echo htmlspecialchars($user['name']); ?> — Tus alojamientos</h2>
    <p>Vista de cuenta. Aquí puedes ver los alojamientos que agregaste a tu cuenta y eliminarlos si lo deseas.</p>
  </div>
  <?php if (empty($selected)): ?><div class="col-12"><p>No has agregado alojamientos aún.</p></div><?php endif; ?>
  <?php foreach ($selected as $acc): ?>
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="<?php echo ($acc['image']? htmlspecialchars($acc['image']) : 'https://via.placeholder.com/800x400?text='.urlencode($acc['title'])); ?>" class="card-img-top" alt="Imagen">
        <div class="card-body">
          <h5 class="card-title"><?php echo htmlspecialchars($acc['title']); ?></h5>
          <p class="card-text"><?php echo htmlspecialchars($acc['description']); ?></p>
          <p><strong>Precio:</strong> $<?php echo number_format($acc['price'],2); ?></p>
          <form method="post" action="index.php?page=user&action=remove">
            <input type="hidden" name="accommodation_id" value="<?php echo $acc['id']; ?>">
            <button class="btn btn-danger btn-sm">Eliminar de mi cuenta</button>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
