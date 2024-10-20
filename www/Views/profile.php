<div class="slider-page">
  <div class="slider-page-filter">
    <div class="container">
      <h1>Bonjour <span class="color"><?= $_SESSION['user']['username'] ?></span>,</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="content">
    <div class="row">
      <div class="col-lg-6">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" class="form-control" disabled>
      </div>
      <div class="col-lg-6">
        <label for="email">Inscription</label>
        <input type="email" name="email" value="<?= $_SESSION['user']['date'] ?>" class="form-control" disabled>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
      </div>
      <div class="col-lg-3">
        <?php if ($_SESSION['user']['access'] == 1) { ?>
          <a href="admin" class="btn btn-info btn-large">Panel Admin</a>
        <?php } ?>
      </div>
      <div class="col-lg-3">
        <a href="logout" class="btn btn-info btn-large">Déconnexion</a>
      </div>
    </div>
  </div>
</div>
