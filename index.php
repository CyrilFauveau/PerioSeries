<?php require('header.php'); ?>

<div class="content">

  <?php require('searchbar.php'); ?>

  <div class="block-accueil">

    <div class="description">
      <h2 class="title">Lorem Ipsum</h2>
      <p class="text">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </p>
      <a href="episode.php"><div class="discover"><?= trad($bdd, 'discover', $lang); ?></div></a>
    </div>

    <div class="apercu">
      <figure class="image">
        <img src="images/image-accueil.png" alt="">
      </figure>
      <div class="slider">
        <div class="nav-slider"></div>
        <div class="nav-slider"></div>
        <div class="nav-slider"></div>
        <div class="nav-slider"></div>
      </div>
    </div>

  </div>

  <div class="block-categorie">
    <div class="categorie">
      <a href="series.php"><img src="images/image-series.png" alt="series US">
      <div class="inner">
        <span><?= trad($bdd, 'header_series', $lang); ?></span>
      </div></a>
    </div>
    <div class="categorie">
      <a href="anime.php"><img src="images/image-anime.png" alt="Anime">
      <div class="inner">
        <span><?= trad($bdd, 'header_animes', $lang); ?></span>
      </div></a>
    </div>
  </div>

</div>

<?php require('footer.php'); ?>
