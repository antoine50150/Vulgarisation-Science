<?php

if (!empty($_POST["registerSend"]) && isset($_POST["registerSend"])) {
  if (!empty($_POST["username"]) && isset($_POST["username"])) {
    if (!empty($_POST["email"]) && isset($_POST["email"]) && !empty($_POST["email_confirmation"]) && isset($_POST["email_confirmation"])) {
      if (!empty($_POST["password"]) && isset($_POST["password"])) {
        if (!empty($_POST["password_confirmation"]) && isset($_POST["password_confirmation"])) {
          if (!empty($_POST["cgu"]) && isset($_POST["cgu"])) {

            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $password_confirmation = htmlspecialchars($_POST['password_confirmation']);
            $email_confirmation = htmlspecialchars($_POST['email_confirmation']);
            $email = htmlspecialchars($_POST['email']);
            $cgu = htmlspecialchars($_POST['cgu']);


            if ($password === $password_confirmation AND $email == $email_confirmation) {

              $req = $db->prepare("SELECT COUNT(*) As nbtype FROM users WHERE username = ?");
              $req->execute(array($username));
              $req = $req->fetch();

              if($req['nbtype'] <= 0){

                $req = $db->prepare("SELECT COUNT(*) As nbtype FROM users WHERE email = ?");
                $req->execute(array($email));
                $req = $req->fetch();

                if($req['nbtype'] <= 0){
                  if (strlen($username) >= 3  && strlen($username) <= 16) {
                    if (strlen($password) >= 5  && strlen($password) <= 100) {
                      if (strlen($email) >= 5  && strlen($email) <= 60) {
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                          $password = md5($password);
                          $password = hash('sha512', $password);
                          $date = date("Y-m-d H:i:s");

                          $req = $db->prepare("INSERT INTO users(username, email, password, date) VALUES(?, ?, ?, ?)");
                          $req->execute(array($username, $email, $password, $date));

                          $message['type'] = "success";
                          $message['message'] = "Bravo pour votre connexion !";

                          $req = $db->prepare("SELECT * FROM users WHERE username = ?");
                          $req->execute(array($username));
                          $r = $req->fetch();

                          $_SESSION['user']['id'] = $r['id'];
                          $_SESSION['user']['username'] = $r['username'];
                          $_SESSION['user']['access'] = $r['rank'];
                          $_SESSION['user']['email'] = $r['email'];
                          $_SESSION['user']['date'] = $date;

                          header("Location: ".$url."profile");

                        } else {
                          $message['type'] = "danger";
                          $message['message'] = "L'email est invalide";
                        }
                      } else {
                        $message['type'] = "danger";
                        $message['message'] = "L'email est invalide";
                      }
                    } else {
                      $message['type'] = "danger";
                      $message['message'] = "Le mot de passe est trop court ou trop long !";
                    }
                  } else {
                    $message['type'] = "danger";
                    $message['message'] = "Le pseudo est trop court ou trop long !";
                  }
                } else {
                  $message['type'] = "danger";
                  $message['message'] = "Le mail est déjà enregistré !";
                }
              } else {
                $message['type'] = "danger";
                $message['message'] = "Le pseudo est déjà enregistré !";
              }
            } else {
              $message['type'] = "danger";
              $message['message'] = "Les mots de passe ou emails ne correspondent pas !";
            }
          } else {
            $message['type'] = "danger";
            $message['message'] = "Vous devez accepter les cgu !";
          }
        } else {
          $message['type'] = "danger";
          $message['message'] = "Vous devez entrer un mot de passe !";
        }
      } else {
        $message['type'] = "danger";
        $message['message'] = "Vous devez entrer un mot de passe !";
      }
    } else {
      $message['type'] = "danger";
      $message['message'] = "Vous devez entrer un email !";
    }
  } else {
    $message['type'] = "danger";
    $message['message'] = "Vous devez entrer un nom d'utilisateur !";
  }
}
