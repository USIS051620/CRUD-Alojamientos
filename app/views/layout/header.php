<!doctype html>
<html lang="es" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alojamientos — Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <?php $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'); ?>
    <link rel="icon" type="image/svg+xml" sizes="any" href="<?php echo $base; ?>/img/favicon.svg?v=3">
    <link href="<?php echo $base; ?>/assets/css/style.css" rel="stylesheet">
    <style>.card-img-top{height:200px;object-fit:cover}</style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-pro shadow-sm">
      <div class="container-xxl">
        <a class="navbar-brand fw-bold" href="index.php?page=home"><i class="bi bi-houses me-2"></i>Alojamientos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainnav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainnav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="index.php?page=home"><i class="bi bi-grid-1x2"></i> Inicio</a></li>
            <?php if(!empty($_SESSION['user'])): ?>
              <?php if(!empty($_SESSION['user']['is_admin'])): ?>
                <li class="nav-item"><a class="nav-link" href="index.php?page=admin&action=index"><i class="bi bi-speedometer2"></i> Admin</a></li>
              <?php endif; ?>
              <li class="nav-item"><a class="nav-link" href="index.php?page=user&action=account"><i class="bi bi-person-circle"></i> Mi cuenta</a></li>
              <li class="nav-item"><a class="nav-link text-danger" href="index.php?page=auth&action=logout"><i class="bi bi-box-arrow-right"></i> Salir</a></li>
            <?php else: ?>
              <li class="nav-item"><a class="nav-link" href="index.php?page=auth&action=login"><i class="bi bi-door-open"></i> Ingresar</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?page=auth&action=register"><i class="bi bi-pencil-square"></i> Registrarse</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <main class="container-xxl py-4">
