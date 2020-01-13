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

// ---------- Séries récentes (ordre chronologique) ----------

if (isset($_POST['serie-recente'])) {
  $serieRecent = $_POST['serie-recente'];
}
else {
  $req = $bdd -> prepare("SELECT * FROM series WHERE category = 'serie' ORDER BY date DESC LIMIT 1");
  $req -> execute(array());
  while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
    $serieRecent = $result[$title];
  }
}

function recentMenu($bdd, $lang, $title) { ?>
  <div class="block-list">
    <h2 class="title"><?= trad($bdd, 'news_recent_series', $lang); ?></h2>
    <nav class="nav-series">
      <form action="" method="post">
        <?php
          $req = $bdd -> prepare("SELECT * FROM series WHERE category = 'serie' ORDER BY date DESC LIMIT 5");
          $req -> execute(array());
          while ($result = $req->fetch(PDO::FETCH_ASSOC)) { ?>
            <input type="submit" name="serie-recente" value="<?= $result[$title]; ?>">
          <?php }
        ?>
      </form>
    </nav>
  <?php
}
function recentSerie($bdd, $serieRecent, $column, $title) {
  $req = $bdd -> prepare("SELECT * FROM series WHERE title = ?");
  $req -> execute(array($serieRecent));
  while ($result = $req->fetch(PDO::FETCH_ASSOC)) {

    if ($column == 'title' || $column == 'title_en') { ?>
      <a href="episode.php"><div class="serie">
        <div class="description">
          <h3><?= $result[$column]; ?></h3>
    <?php }

    else if ($column == 'content' || $column == 'content_en') { ?>
        <p><?= $result[$column]; ?></p>
      </div>
    <?php }

    else if ($column == 'url') { ?>
          <div class="image">
            <img src="images/<?= $result[$column]; ?>">
          </div>
        </div></a>
      </div>
    <?php }
  }
}



// ---------- Coups de coeur (ordre alphabétique animes) ----------

if (isset($_POST['serie-cdc'])) {
  $serieCDC = $_POST['serie-cdc'];
}
else {
  $req = $bdd -> prepare("SELECT * FROM series WHERE category = 'anime' ORDER BY ? ASC LIMIT 1");
  $req -> execute(array($title));
  while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
    $serieCDC = $result[$title];
  }
}

function cdcMenu($bdd, $lang, $title) { ?>
  <div class="block-list">
    <h2 class="title"><?= trad($bdd, 'news_CDC', $lang); ?></h2>
    <nav class="nav-series">
      <form action="" method="post">
        <?php
          $req = $bdd -> prepare("SELECT * FROM series WHERE category = 'anime' ORDER BY ? ASC LIMIT 5");
          $req -> execute(array($title));
          while ($result = $req->fetch(PDO::FETCH_ASSOC)) { ?>
            <input type="submit" name="serie-cdc" value="<?= $result[$title]; ?>">
          <?php }
        ?>
      </form>
    </nav>
  <?php
}
function cdcSerie($bdd, $serieCDC, $column, $title) {
  $req = $bdd -> prepare("SELECT * FROM series WHERE $title = ?");
  $req -> execute(array($serieCDC));
  while ($result = $req->fetch(PDO::FETCH_ASSOC)) {

    if ($column == 'title' || $column == 'title_en') { ?>
      <a href="episode.php"><div class="serie">
        <div class="description">
          <h3><?= $result[$column]; ?></h3>
    <?php }

    else if ($column == 'content' || $column == 'content_en') { ?>
        <p><?= $result[$column]; ?></p>
      </div>
    <?php }

    else if ($column == 'url') { ?>
          <div class="image">
            <img src="images/<?= $result[$column]; ?>">
          </div>
        </div></a>
      </div>
    <?php }
  }
}



// ---------- Populaire (ordre alphabétique desc) ----------

if (isset($_POST['serie-populaire'])) {
  $seriePopulaire = $_POST['serie-populaire'];
}
else {
  $req = $bdd -> prepare("SELECT * FROM series WHERE category = 'serie' ORDER BY ? DESC LIMIT 1");
  $req -> execute(array($title));
  while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
    $seriePopulaire = $result[$title];
  }
}

function populaireMenu($bdd, $lang, $title) { ?>
  <div class="block-list">
    <h2 class="title"><?= trad($bdd, 'news_popular', $lang); ?></h2>
    <nav class="nav-series">
      <form action="" method="post">
        <?php
          $req = $bdd -> prepare("SELECT * FROM series WHERE category = 'serie' ORDER BY ? DESC LIMIT 5");
          $req -> execute(array($title));
          while ($result = $req->fetch(PDO::FETCH_ASSOC)) { ?>
            <input type="submit" name="serie-populaire" value="<?= $result[$title]; ?>">
          <?php }
        ?>
      </form>
    </nav>
  <?php
}
function populaireSerie($bdd, $seriePopulaire, $column, $title) {
  $req = $bdd -> prepare("SELECT * FROM series WHERE $title = ?");
  $req -> execute(array($seriePopulaire));
  while ($result = $req->fetch(PDO::FETCH_ASSOC)) {

    if ($column == 'title' || $column == 'title_en') { ?>
      <a href="episode.php"><div class="serie">
        <div class="description">
          <h3><?= $result[$column]; ?></h3>
    <?php }

    else if ($column == 'content' || $column == 'content_en') { ?>
        <p><?= $result[$column]; ?></p>
      </div>
    <?php }

    else if ($column == 'url') { ?>
          <div class="image">
            <img src="images/<?= $result[$column]; ?>">
          </div>
        </div></a>
      </div>
    <?php }
  }
}

?>

<div class="header-nouveautes">

  <div class="title-nouveautes">
    <h1 class="title"><?= trad($bdd, 'header_news', $lang); ?></h1>
  </div>

  <?php require('searchbar.php'); ?>

</div>

<div class="content">

  <?php
    recentMenu($bdd, $lang, $title);
    recentSerie($bdd, $serieRecent, $title, $title);
    recentSerie($bdd, $serieRecent, $content, $title);
    recentSerie($bdd, $serieRecent, 'url', $title);

    cdcMenu($bdd, $lang, $title);
    cdcSerie($bdd, $serieCDC, $title, $title);
    cdcSerie($bdd, $serieCDC, $content, $title);
    cdcSerie($bdd, $serieCDC, 'url', $title);

    populaireMenu($bdd, $lang, $title);
    populaireSerie($bdd, $seriePopulaire, $title, $title);
    populaireSerie($bdd, $seriePopulaire, $content, $title);
    populaireSerie($bdd, $seriePopulaire, 'url', $title);
  ?>

</div>

<?php require('footer.php'); ?>
