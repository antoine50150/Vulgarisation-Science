<?php

if (!empty($_POST['sendLogin']) AND isset($_POST['sendLogin'])) {
  if (!empty($_POST['username']) AND isset($_POST['username'])) {
    if (!empty($_POST['password']) AND isset($_POST['password'])) {
      if (strlen($_POST['username']) >= 3  && strlen($_POST['username']) <= 16) {

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

          $req = $db->prepare("SELECT * FROM users WHERE username = ?");
          $req->execute(array($username));
          $r = $req->fetch();

          $password = md5($password);
          $password = hash('sha512', $password);

          if ($r['password'] === $password) {
            if ($r['rank'] != 5) { # 5 -> Utilisateur banni

              $date = date("Y-m-d H:i:s");

              $_SESSION['user']['id'] = $r['id'];
              $_SESSION['user']['username'] = $r['username'];
              $_SESSION['user']['email'] = $r['email'];
              $_SESSION['user']['access'] = $r['rank'];
              $_SESSION['user']['date'] = $r['date'];
              $_SESSION['user']['lastLogin'] = $date;

              $message['type'] = "success";
              $message['message'] = "Vous êtes connecté à votre compte !";

              header('Location: profile');

            } else {
              $message['type'] = "danger";
              $message['message'] = "Le compte est actuellement banni !";
            }
          } else {
            $message['type'] = "danger";
            $message['message'] = "Le mot de passe ou l'identifiant est incorrect !";
          }
      } else {
        $message['type'] = "danger";
        $message['message'] = "Une erreur est survenue !";
      }
    } else {
      $message['type'] = "danger";
      $message['message'] = "Vous devez entrer un mot de passe !";
    }
  } else {
    $message['type'] = "danger";
    $message['message'] = "Vous devez entrer un nom d'utilisateur !";
  }
}
