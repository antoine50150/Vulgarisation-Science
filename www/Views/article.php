<div class="slider-page">
  <div class="slider-page-filter">
    <div class="container">
      <h1><?= $r['title'] ?></h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="content">
    <p>
      <?= $r['contents'] ?>
    </p>
    <p style="padding:0px;margin:0px;">
      Publié le <span class="color"><?= $date ?></span> par <span class="color"><?= $author ?></span>.
    </p>
    <?php if (isset($_SESSION['user'])) {
      echo '<a href="../like/'.$r['id'].'" class="btn btn-info right" style="margin-top:-40px;">J\'aime ('.$like.')</a>';
    } else {
      echo '<a class="btn btn-info right" style="margin-top:-40px;">'.$like.' likes</a>';
     } ?>
  </div>

  <?php if (isset($_SESSION['user'])) { ?>
    <div class="content">
      <h2>Ajouter un commentaire</h2>
      <hr>
      <div class="clearfix">
      </div>
      <br>
      <form method="post">
        <textarea name="comment" rows="8" class="form-control"></textarea>
        <div class="row">
          <div class="col-lg-9">
          </div>
          <div class="col-lg-3">
            <input type="submit" name="sendComment" value="Envoyer" class="btn btn-large btn-info">
          </div>
        </div>
      </form>
    </div>
  <?php } ?>

  <div class="row">
    <?php
    while ($c = $comment->fetch()) { ?>
      <div class="col-lg-6">
        <div class="content">
          <h3><?= $c['username'] ?></h3>
          <p><?= $c['comment'] ?></p>
        </div>
      </div>
    <?php
    }
     ?>
  </div>


</div>
