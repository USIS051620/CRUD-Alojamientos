<div class="row justify-content-center">
  <div class="col-md-6">
    <h2>Iniciar sesión</h2>
    <?php if (!empty($error)): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
    <form method="post" action="index.php?page=auth&action=login">
      <div class="mb-3"><label class="form-label">Correo</label><input class="form-control" name="email" type="email" required></div>
      <div class="mb-3"><label class="form-label">Contraseña</label><input class="form-control" name="password" type="password" required></div>
      <button class="btn btn-primary">Entrar</button>
    </form>
  </div>
</div>
