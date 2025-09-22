<div class="row">
  <div class="col-md-8">
    <h3>Todos los alojamientos</h3>
    <div class="row">
      <?php
        $mine_ids = array_column($mine, 'id');
      ?>
      <?php foreach($all as $a): ?>
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-body">
              <h5><?php echo htmlspecialchars($a['title']); ?></h5>
              <p class="small"><?php echo htmlspecialchars(substr($a['description'],0,120)); ?>...</p>
              <p class="mb-1"><strong>$<?php echo number_format($a['price'],2); ?></strong></p>
              <?php if(in_array($a['id'], $mine_ids)): ?>
                <button class="btn btn-secondary btn-sm" disabled>Ya agregado</button>
              <?php else: ?>
                <a class="btn btn-success btn-sm" href="index.php?page=account&action=add&id=<?php echo $a['id']; ?>">Agregar</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="col-md-4">
    <h3>Mis alojamientos</h3>
    <?php if(empty($mine)): ?>
      <p>No has agregado alojamientos aún.</p>
    <?php else: ?>
      <ul class="list-group">
        <?php foreach($mine as $m): ?>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div>
              <div class="fw-bold"><?php echo htmlspecialchars($m['title']); ?></div>
              <small><?php echo htmlspecialchars(substr($m['description'],0,80)); ?></small>
            </div>
            <div>
              <a href="index.php?page=account&action=remove&id=<?php echo $m['id']; ?>" class="btn btn-sm btn-danger">Eliminar</a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</div>
