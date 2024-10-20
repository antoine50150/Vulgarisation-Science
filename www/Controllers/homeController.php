<?php

  $countArticles = $db->prepare("SELECT COUNT(*) AS nb FROM articles");
  $countArticles->execute();
  $countArticles = $countArticles->fetch();

  $articles = $db->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT 0, 3");
  $articles->execute();
