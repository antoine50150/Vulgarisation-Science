<?php
  if (isset($_GET['arg2']) AND !empty($_GET['arg2'])) {
    if ($_SESSION['user']['access'] == 1) {
      $id = htmlspecialchars($_GET['arg2']);
      $req = $db->prepare("DELETE FROM categories WHERE id = ?");
      $req->execute(array($id));
      header("Location: ../admin");
    } else {
      header("Location: ..");
    }
  } else {
    header("Location: ..");
  }
