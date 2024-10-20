 <div class="slider-page">
  <div class="slider-page-filter">
    <div class="container">
      <h1>Panel <span class="color">Admin</span></h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="content">
    <h2>Ajouter un article</h2>
    <hr>
    <div class="clearfix">
    </div>
    <br>
    <form method="post">
      <label for="title">Titre</label>
      <input type="text" name="title" placeholder="Titre de l'article" class="form-control">
      <div class="row">
        <div class="col-lg-6">
          <label for="picture">Image</label>
          <input type="text" name="picture" placeholder="Url de l'image" class="form-control">
        </div>
        <div class="col-lg-6">
          <label for="categorie">Choisir la catégorie</label>
          <select class="form-control" name="categorie">
            <option>Choisir une catgéorie</option>
            <?php
            while ($c = $categorie_choose->fetch()) { ?>
              <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
      <label for="content">Contenue de l'article</label>
      <textarea name="content" width="100%" class="form-control" rows="10" placeholder="Ecrire l'article"></textarea>
      <div class="row">
        <div class="col-lg-9">
        </div>
        <div class="col-lg-3">
          <input type="submit" name="sendNewArticle" value="Envoyer" class="btn btn-large btn-info">
        </div>
      </div>
    </form>
  </div>

  <div class="content">
    <h2>Supprimer un article</h2>
    <hr>
    <div class="clearfix">
    </div>
    <br>
    <table class="table">
      <thead>
        <td><b>#</b></td>
        <td><b>Nom</b></td>
        <td><b>Catégorie</b></td>
        <td><b>Action</b></td>
      </thead>
      <?php
      while ($a = $article->fetch()) {
        ?>

        <tr>
          <td><?= $a['id'] ?></td>
          <td><?= $a['title'] ?></td>
          <td><?= $a['categorie'] ?></td>
          <td><a href="delete_article/<?= $a['id'] ?>" class="color">Supprimer</a></td>
        </tr>

        <?php
        }
      ?>
    </table>
  </div>

  <div class="content">
    <h2>Ajouter une catégorie</h2>
    <hr>
    <div class="clearfix">
    </div>
    <br>
    <form method="post">
      <label for="name">Nom</label>
      <input type="text" name="name" placeholder="Titre de la catégorie" class="form-control">
      <label for="name">Couleur</label>
      <select class="form-control" name="color">
        <option value="green">Vert</option>
        <option value="blue">Bleu</option>
        <option value="red">Rouge</option>
        <option value="orange">Orange</option>
      </select>
      <div class="row">
        <div class="col-lg-9">
        </div>
        <div class="col-lg-3">
          <input type="submit" name="sendNewCategorie" value="Envoyer" class="btn btn-large btn-info">
        </div>
      </div>
    </form>
  </div>

  <div class="content">
    <h2>Supprimer une catégorie</h2>
    <hr>
    <div class="clearfix">
    </div>
    <br>
    <table class="table">
      <thead>
        <td><b>#</b></td>
        <td><b>Nom</b></td>
        <td><b>Couleur</b></td>
        <td><b>Action</b></td>
      </thead>
      <?php
      while ($c = $categorie->fetch()) {
        ?>

        <tr>
          <td><?= $c['id'] ?></td>
          <td><?= $c['name'] ?></td>
          <td><?= $c['color'] ?></td>
          <td><a href="delete_categorie/<?= $c['id'] ?>" class="color">Supprimer</a></td>
        </tr>

        <?php
        }
      ?>
    </table>
  </div>

  <div class="content">
    <h2>Commentaires par personne</h2>
    <hr>
    <div class="clearfix">
    </div>
    <br>
    <table class="table">
      <thead>
        <td><b>Catégorie</b></td>
        <td><b>Nombre de commentaires</b></td>
      </thead>
      <?php
      while ($uc = $user_comments->fetch()) {
        ?>

        <tr>
          <td><?= $uc['username'] ?></td>
          <td><?= $uc['nb'] ?></td>
        </tr>

        <?php
        }
      ?>
    </table>
    <span class="badge badge-info">SQL : Group by</span>
  </div>

  <div class="content">
    <h2>Utilisteur ayant déjà commenté</h2>
    <hr>
    <div class="clearfix">
    </div>
    <br>
    <table class="table">
      <thead>
        <td><b>#</b></td>
        <td><b>Nom de l'utilisteur</b></td>
        <td><b>Nombre de commentaires</b></td>
      </thead>
      <?php
      while ($ac = $article_comment->fetch()) {
        ?>

        <tr>
          <td><?= $ac['id'] ?></td>
          <td><?= $ac['username'] ?></td>
          <td><?= $ac['nb_comment'] ?></td>
        </tr>

        <?php
        }
      ?>
    </table>
    <span class="badge badge-info">SQL : Having</span>
  </div>
</div>
