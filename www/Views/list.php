<div class="slider-page">
  <div class="slider-page-filter">
    <div class="container">
      <h1>Liste des <span class="color">articles</span></h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="content">
    <form method="post">
      <div class="row">
        <div class="col-lg-9">
          <input type="text" class="form-control" name="search" placeholder="Rechercher un article..." style="margin:0px;">
        </div>
        <div class="col-lg-3">
          <input type="submit" name="searchSend" value="Rechercher" class="btn btn-large btn-info" style="border:0px;padding:4px;">
        </div>
      </div>
    </form>
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
  </div>
</div>
