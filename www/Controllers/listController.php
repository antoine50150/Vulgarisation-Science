<?php
  if (isset($_POST['searchSend']) AND isset($_POST['search']) AND !empty($_POST['searchSend']) AND !empty($_POST['search'])) {
    $search = htmlspecialchars($_POST['search']);
    $articles = $db->prepare("SELECT * FROM articles WHERE title LIKE ? ORDER BY id DESC LIMIT 0, 50");
    $articles->execute(array("%".$search."%"));

    $countArticles = $db->prepare("SELECT COUNT(*) AS nb FROM articles WHERE title LIKE ?");
    $countArticles->execute(array("%".$search."%"));
    $countArticles = $countArticles->fetch();
  } else {
    $articles = $db->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT 0, 50");
    $articles->execute();

    $countArticles = $db->prepare("SELECT COUNT(*) AS nb FROM articles");
    $countArticles->execute();
    $countArticles = $countArticles->fetch();
  }
