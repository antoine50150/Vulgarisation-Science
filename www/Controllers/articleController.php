<?php
  if (isset($_GET['arg2']) AND !empty($_GET['arg2'])) {
    $get = htmlspecialchars($_GET['arg2']);
    $get = explode("-", $get);
    $id = $get[0];

    $req = $db->prepare("SELECT * FROM articles WHERE id = ?");
    $req->execute(array($id));
    $r = $req->fetch();

    $author = $db->prepare("SELECT * FROM users WHERE id = ?");
    $author->execute(array($r['author']));
    $author = $author->fetch();
    $author = $author['username'];

    $date = explode(" ", $r['date']);
    $date = $date[0];

    $like = $db->prepare("SELECT COUNT(*) AS nb FROM likes WHERE article = ?");
    $like->execute(array($r['id']));
    $like = $like->fetch();
    $like = $like['nb'];

    if (isset($_POST['sendComment']) AND !empty($_POST['sendComment'])) {
      if (isset($_POST['comment']) AND !empty($_POST['comment'])) {
        $comment = htmlspecialchars($_POST['comment']);
        $date = date("Y-m-d H:i:s");
        $req = $db->prepare("INSERT INTO comments (username, comment, date, article) VALUES (?, ?, ?, ?)");
        $req->execute(array($_SESSION['user']['username'], $comment, $date, $id));
        $req = $db->prepare("UPDATE FROM users SET nb_comment = nb_comment + 1 WHERE id = ?");
        $req->execute(array($_SESSION['user']['username']));
        header("Location: #");
      }
    }

    $comment = $db->prepare("SELECT * FROM comments WHERE article = ?");
    $comment->execute(array($id));

  } else {
    header("Location: ..");
  }
