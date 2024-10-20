<div class="slider-page">
  <div class="slider-page-filter">
    <div class="container">
      <h1>Connexion</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-6">
      <div class="content">
        <?php
        if (isset($message) && !empty($message)) {
          echo "<div class='alert alert-".$message['type']."'>";
          echo $message['message'];
          echo "</div>";
        }
        ?>
        <form method="post">
          <label for="username">Pseudo</label>
          <input type="text" name="username" placeholder="Ex: Antoine" required class="form-control">

          <label for="password">Mot de passe</label>
          <input type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required class="form-control">

          <input type="submit" name="sendLogin" value="Se connecter" class="btn btn-info btn-large">
        </form>
      </div>
    </div>
  </div>
</div>
