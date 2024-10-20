<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <meta name="theme-color" content="#3498DB">

    <meta name="og:type" content="website">
    <meta name="og:title" content="Vulgarisation Science">
    <meta name="og:url" content="https://www.vulgarisation-science.fr/">
    <meta name="og:image" content="https://www.vulgarisation-science.fr/webroot/img/logo.png">
    <meta name="og:description" content="Site de vulgarisation scientifique avec des articles rédigés régulièrement, sourcés et insiprés sur de grands laboratoires tels que l'INRIA, l'INSA, l'INSERM, le CNRS etc.">

    <title>Vulgarisation Science</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="<?= $url ?>webroot/css/style.css" rel="stylesheet" type="text/css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class="alert alert-info" style="border-radius:0!important;">
      <div class="container">
        <b style="text-decoration:underline;">Attention:</b> Le site est toujours en développement et peut comporter des bugs !
      </div>
    </div>

    <!-- MENU BOOSTRAP -->
    <nav class="navbar navbar-expand-lg phone-hide">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          ..
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= $url ?>index"><img src="<?= $url ?>webroot/img/logo.png" width="50px"></a>
            </li>
            <li class="nav-item nav-item-link">
              <a class="nav-link nav-active" href="<?= $url ?>">Accueil</a>
            </li>
            <li class="nav-item nav-item-link">
              <a class="nav-link" href="<?= $url ?>list">Nouvelles</a>
            </li>
            <li class="nav-item nav-item-link">
              <a class="nav-link" href="<?= $url ?>about">A propos</a>
            </li>
            <li class="nav-item nav-item-link">
              <a class="nav-link" href="<?= $url ?>contact">Nous contacter</a>
            </li>
          </ul>
          <div class="form-inline my-2 my-lg-0">
            <?php if (isset($_SESSION['user']['id'])) { ?>
                <a class="nav-link" href="<?= $url ?>profile">Mon profil</a>
            <?php } else { ?>
                <a class="nav-link" href="<?= $url ?>login">Connexion</a>
                <a class="nav-link" href="<?= $url ?>register">Inscription</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>

    <div class="computer-hide phone-menu">
      <a class="nav-link" href="<?= $url ?>" style="padding:0px;">Accueil</a> <br>
      <a class="nav-link" href="<?= $url ?>list" style="padding:0px;">Nouvelles</a> <br>
      <a class="nav-link" href="<?= $url ?>about" style="padding:0px;">A propos</a> <br>
      <a class="nav-link" href="<?= $url ?>contact" style="padding:0px;">Nous contacter</a> <br>
      <?php if (isset($_SESSION['user']['id'])) { ?>
        <a class="nav-link" href="<?= $url ?>profile" style="padding:0px;">Mon profil</a> <br>
      <?php } else { ?>
        <a class="nav-link" href="<?= $url ?>login" style="padding:0px;">Connexion</a> <br>
        <a class="nav-link" href="<?= $url ?>register" style="padding:0px;">Inscription</a> <br>
      <?php } ?>
    </div>
