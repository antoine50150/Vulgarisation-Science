<div class="slider">
  <div class="sliderFilter">
    <div class="container">
      <span class="welcome">Bienvenue sur</span>
      <h1><span class="color">V</span>ulgarisation<br><span class="color">S</span>cience</h1>
      <br><br>
      <a href="<?= $url ?>list" class="btn btn-info">Découvrir</a>
    </div>
  </div>
</div>

<div class="news">
  <div class="container">
    <span class="badge badge-info"><?= $countArticles['nb'] ?> articles</span>
    <h2>Derniers articles</h2>

    <div class="row">

      <?php
        while ($a = $articles->fetch()) {
          $title = str_replace(" ", "-", $a['title']);
          $title = str_replace("#", "", $title);
          ?>
          <div class="col-lg-4" style="margin-bottom:20px;">
            <a href="article/<?= $a['id'] ?>-<?= $title ?>">
              <article>
                <img src="<?= $a['picture'] ?>" height="200px">
                <?php
                $req = $db->prepare("SELECT * FROM categories WHERE id = ?");
                $req->execute(array($a['categorie']));
                $r = $req->fetch();
                ?>
                <span class="badge badge-<?= $r['color'] ?>"><?= $r['name'] ?></span>
                <h3><?= $a['title'] ?></h3>
              </article>
            </a>
          </div>
        <?php } ?>

    </div>

    <br><br>

    <center>
      <a href="list" class="btn btn-rounded btn-info">En voir plus</a>
    </center>
  </div>
</div>
