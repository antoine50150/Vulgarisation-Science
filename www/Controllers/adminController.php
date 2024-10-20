<?php
  if (isset($_SESSION['user']) OR !empty($_SESSION['user'])) {
    if ($_SESSION['user']['access'] == 1){
      $categorie = $db->prepare("SELECT * FROM categories ORDER BY id DESC");
      $categorie->execute();

      $categorie_choose = $db->prepare("SELECT * FROM categories ORDER BY id DESC");
      $categorie_choose->execute();

      $article = $db->prepare("SELECT * FROM articles ORDER BY id DESC");
      $article->execute();

      $user_comments = $db->prepare("SELECT COUNT(*) AS nb, username FROM comments GROUP BY username");
      $user_comments->execute();

      $article_comment = $db->prepare("SELECT * FROM users HAVING nb_comment > 1");
      $article_comment->execute();
    } else {
      header("Location: ..");
    }
  } else {
    header("Location: ..");
  }

  if (isset($_POST['sendNewCategorie']) AND !empty($_POST['sendNewCategorie'])) {
    if (isset($_POST['name']) AND !empty($_POST['name'])) {
      if (isset($_POST['color']) AND !empty($_POST['color'])) {

        $name = htmlspecialchars($_POST['name']);
        $color = htmlspecialchars($_POST['color']);

        $req = $db->prepare("INSERT INTO categories(name, color) VALUES (?, ?)");
        $req->execute(array($name, $color));

      }
    }
  }


  if (isset($_POST['sendNewArticle']) AND !empty($_POST['sendNewArticle'])) {
    if (isset($_POST['title']) AND !empty($_POST['title'])) {
      if (isset($_POST['categorie']) AND !empty($_POST['categorie'])) {
        if (isset($_POST['picture']) AND !empty($_POST['picture'])) {
          if (isset($_POST['content']) AND !empty($_POST['content'])) {

            $title = htmlspecialchars($_POST['title']);
            $categorie = htmlspecialchars($_POST['categorie']);
            $picture = htmlspecialchars($_POST['picture']);
            $content = $_POST['content'];
            $date = date("Y-m-d H:i:s");

            $req = $db->prepare("INSERT INTO articles(title, categorie, picture, contents, date, author) VALUES (?, ?, ?, ?, ?, ?)");
            $req->execute(array(
              $title,
              $categorie,
              $picture,
              $content,
              $date,
              $_SESSION['user']['id']
            ));

          }
        }
      }
    }
  }
