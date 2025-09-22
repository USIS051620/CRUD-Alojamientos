<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="mb-0">Iniciar sesión</h2>
      <a
        href="index.php?page=home"
        class="btn btn-outline-secondary d-inline-flex align-items-center gap-2"
        onclick="if (document.referrer) { history.back(); return false; }"
      >
        <i class="bi bi-arrow-left"></i><span>Atrás</span>
      </a>
    </div>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post" action="index.php?page=auth&action=login">
      <!-- Correo -->
      <div class="mb-3">
        <label for="email" class="form-label">Correo</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input id="email" class="form-control" name="email" type="email"
            placeholder="tu@correo.com" autocomplete="email" required>
        </div>
      </div>

      <!-- Contraseña -->
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock"></i></span>
          <input id="password" class="form-control" name="password" type="password"
            placeholder="********" autocomplete="current-password" required>
        </div>
      </div>

      <button class="btn btn-primary d-inline-flex align-items-center gap-2">
        <i class="bi bi-box-arrow-in-right"></i><span>Entrar</span>
      </button>
    </form>
  </div>
</div>