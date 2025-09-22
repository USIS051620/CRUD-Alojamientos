<?php
// Verificar que estamos en el contexto de admin
if (empty($_SESSION['user']) || !$_SESSION['user']['is_admin']) {
    header('Location: index.php?page=login');
    exit;
}
?>

<div class="row">
  <div class="col-12">
    <h2>Lista de alojamientos (Admin)</h2>
    
    <!-- DEBUG TEMPORAL - ESSENTIAL -->
    <div class="alert alert-info mb-3">
      <h4>🔍 Debug Information:</h4>
      <p><strong>User ID:</strong> <?php echo $_SESSION['user']['id'] ?? 'none'; ?></p>
      <p><strong>Is Admin:</strong> 
        <?php if (isset($_SESSION['user']['is_admin'])): ?>
          <span class="badge bg-<?php echo $_SESSION['user']['is_admin'] ? 'success' : 'danger'; ?>">
            <?php echo $_SESSION['user']['is_admin'] ? '✅ YES' : '❌ NO'; ?>
          </span>
        <?php else: ?>
          <span class="badge bg-warning">not set</span>
        <?php endif; ?>
      </p>
      <p><strong>Admin Type:</strong> <?php echo isset($_SESSION['user']['is_admin']) ? gettype($_SESSION['user']['is_admin']) : 'not set'; ?></p>
      <p><strong>Alojamientos Count:</strong> <?php echo count($alojamientos ?? []); ?></p>
    </div>

    <a href="index.php?page=admin&action=create" class="btn btn-primary mb-3">Agregar nuevo</a>
    
    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['success'])): ?>
      <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Precio</th>
          <th>Acciones</th>
          <th>Debug</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($alojamientos)): ?>
          <?php foreach($alojamientos as $a): ?>
            <tr>
              <td><?php echo $a['id']; ?></td>
              <td><?php echo htmlspecialchars($a['title']); ?></td>
              <td>$<?php echo number_format($a['price'],2); ?></td>
              <td>
                <a href="index.php?page=admin&action=edit&id=<?php echo $a['id']; ?>" 
                   class="btn btn-sm btn-warning">Editar</a>
                <a href="index.php?page=admin&action=delete&id=<?php echo $a['id']; ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('¿Eliminar este alojamiento?');">Eliminar</a>
              </td>
              <td class="small">
                ID: <?php echo $a['id']; ?><br>
                <a href="index.php?page=admin&action=edit&id=<?php echo $a['id']; ?>" 
                   target="_blank">Test URL</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="5" class="text-center text-muted">No hay alojamientos registrados</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
console.log('=== ADMIN DEBUG ===');
console.log('User:', <?php echo json_encode($_SESSION['user'] ?? null); ?>);
console.log('Alojamientos:', <?php echo json_encode($alojamientos ?? []); ?>);

// Verificar que los botones existen
document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.btn-warning');
    const deleteButtons = document.querySelectorAll('.btn-danger');
    
    console.log('Edit buttons found:', editButtons.length);
    console.log('Delete buttons found:', deleteButtons.length);
    
    // Agregar logging a los clicks
    editButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            console.log('Edit clicked:', this.href);
        });
    });
    
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            console.log('Delete clicked:', this.href);
            if (!confirm('¿Eliminar este alojamiento?')) {
                e.preventDefault();
            }
        });
    });
});
</script>