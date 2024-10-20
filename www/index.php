<?php
  session_start();

  $url = "https://www.vulgarisation-science.fr/";

  # On récupére la page
  if (isset($_GET['page']) AND !empty($_GET['page'])) {
    $page = strtolower(htmlspecialchars($_GET['page']));
  } else {
    $page = "home";
  }

  # On inclue les fichiers controleurs.
  require_once "Controllers/database.php";
  require_once "Controllers/" . $page . "Controller.php";

  # On inclue les fichiers vues.
  require_once "Views/Include/heading.php";
  require_once "Views/" . $page . ".php";
  require_once "Views/Include/footer.php";
