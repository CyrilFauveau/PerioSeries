<?php

session_start();
require('connectionPDO.php');
require('traduction.php');

if (isset($_POST['lang'])) {
  $_SESSION['lang'] = $_POST['lang'];
  $lang = $_SESSION['lang'];
}
else if (isset($_SESSION['lang'])) {
  $lang = $_SESSION['lang'];
}
else {
  $_SESSION['lang'] = 'fr';
  $lang = $_SESSION['lang'];
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PerioSeries</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>

    <header class="block-header">

      <div class="menu-logo">
        <div class="logo">
          <a href="index.php"><img src="images/logo.png" alt="logo"></a>
        </div>
      </div>

      <div class="lang-wrapper">
        <form class="lang" action="" method="post">
          <span class="trad-title">Traduction</span>
          <div class="group">
            <input type="radio" name="lang" value="fr" <?php if ($lang == 'fr') { echo "checked"; } ?>>
            <label>Français</label>
          </div>
          <div class="group">
            <input type="radio" name="lang" value="en" <?php if ($lang == 'en') { echo "checked"; } ?>>
            <label>English</label>
          </div>
          <input type="submit" class="choisir" name="" value="Choisir">
        </form>
        <div class="flags">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Flag_of_France_%281794%E2%80%931815%2C_1830%E2%80%931958%29.svg/250px-Flag_of_France_%281794%E2%80%931815%2C_1830%E2%80%931958%29.svg.png" alt="">
          <img src="https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Flag_of_the_United_Kingdom.svg/1280px-Flag_of_the_United_Kingdom.svg.png" alt="">
        </div>
      </div>

      <nav class="menu-nav">
        <div class="nouveautes">
            <figure>
              <a href="nouveautes.php">
                <img src="images/nouveautes.png" alt="nouveautés">
                <span class="text-menu"><?= trad($bdd, 'header_news', $lang); ?></span>
              </a>
            </figure>
        </div>

        <div class="series-us">
            <figure>
              <a href="series.php">
                <img src="images/seriesUS.png" alt="series us">
                <span class="text-menu"><?= trad($bdd, 'header_series', $lang); ?></span>
              </a>
            </figure>
        </div>

        <div class="anime">
            <figure>
              <a href="anime.php">
                <img src="images/anime.png" alt="anime">
                <span class="text-menu"><?= trad($bdd, 'header_animes', $lang); ?></span>
              </a>
            </figure>
        </div>
      </nav>

    </header>
