<?php require('header.php');

switch ($lang) {
  case 'fr':
    $title = 'title';
    $content = 'content';
    break;

  case 'en':
    $title = 'title_en';
    $content = 'content_en';
    break;
}

?>

<div class="header-nouveautes">

  <div class="title-nouveautes">
    <h1 class="title"><?= trad($bdd, 'series', $lang); ?></h1>
  </div>

  <?php require('searchbar.php'); ?>

</div>

<div class="content">

  <div class="block-list">
    <h2 class="title"><?= trad($bdd, 'series_ratings', $lang); ?></h2>
  </div>
  <div class="row">
    <?php
      $req = $bdd -> prepare("SELECT * FROM series WHERE category = 'serie' LIMIT 5");
      $req -> execute(array());
      while ($result = $req->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="poster">
          <img src="<?= $result['url_portrait'] ?>" alt="">
          <div class="summary">
            <p><?= $result[$content] ?></p>
            <a href="episode.php">voir</a>
          </div>
        </div>
      <?php }
     ?>
  </div>

  <div class="block-list">
    <h2 class="title"><?= trad($bdd, 'series_fame', $lang); ?></h2>
  </div>
  <div class="row">
    <?php
      $req = $bdd -> prepare("SELECT * FROM series WHERE category = 'serie' AND id > 5 LIMIT 5");
      $req -> execute(array());
      while ($result = $req->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="poster">
          <img src="<?= $result['url_portrait'] ?>" alt="">
          <div class="summary">
            <p><?= $result[$content] ?></p>
            <a href="episode.php">voir</a>
          </div>
        </div>
      <?php }
     ?>
  </div>

</div>

<?php require('footer.php'); ?>
