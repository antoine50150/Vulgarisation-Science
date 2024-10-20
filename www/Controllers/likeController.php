<?php
  if (isset($_GET['arg2']) AND !empty($_GET['arg2']) AND isset($_SESSION['user'])) {
    $id = htmlspecialchars($_GET['arg2']);

    $req = $db->prepare("SELECT COUNT(*) AS nb FROM likes WHERE user = ? AND article = ?");
    $req->execute(array($_SESSION['user']['id'], $id));
    $req = $req->fetch();

    if ($req['nb'] == 0) {

      $req = $db->prepare("INSERT INTO likes (user, article) VALUES (?, ?)");
      $req->execute(array($_SESSION['user']['id'], $id));

      header("Location: ../article/".$id);

    } else {
      $req = $db->prepare("DELETE FROM likes WHERE user = ? AND article = ?");
      $req->execute(array($_SESSION['user']['id'], $id));

      header("Location: ../article/".$id);
    }
  } else {
    header("Location: ..");
  }
