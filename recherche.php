<?php

if (!isset($_POST['search']) || empty($_POST['search'])) {
  header("location:javascript://history.go(-1)");
}

if (isset($_POST['category'])) {
  $category = $_POST['category'];
}
else {
  $category = 'serie';
}

?>

<?php require('header.php'); ?>

<div class="content">

  <div class="search">
    <form action="recherche.php" method="post">
      <input type="text" name="search" placeholder="<?= trad($bdd, 'searchbar_placeholder', $lang); ?>" value="<?php if (isset($_POST['search'])) { echo $_POST['search']; } ?>">
      <input type="submit" value="<?= trad($bdd, 'searchbar_value', $lang); ?>">
      <div class="category">
        <label for="category"><?= trad($bdd, 'category', $lang); ?> :</label>
        <input id="category" type="radio" name="category" value="serie" <?php if ($category == 'serie') { echo "checked"; } ?>><label><?= trad($bdd, 'category_serie', $lang); ?></label>
        <input id="category" type="radio" name="category" value="anime" <?php if ($category == 'anime') { echo "checked"; } ?>><label><?= trad($bdd, 'category_anime', $lang); ?></label>
      </div>
    </form>
  </div>


  <div class="block-list">
    <h2 class="title"><?= trad($bdd, 'search_result', $lang); ?> <?= $_POST['search']; ?></h2>
    <?php
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
      $search = htmlspecialchars($_POST['search']);
      $req = $bdd -> prepare("SELECT * FROM series WHERE category = ? AND $title LIKE ?");
      $req -> execute(array($category, "%$search%"));
      while ($result = $req->fetch(PDO::FETCH_ASSOC)) { ?>
        <a href="episode.php"><div class="serie">
          <div class="description">
            <?php
              echo "<h3>".$result[$title]."</h3>";
              echo "<p>".$result[$content]."</p></div>";
              echo "<div class=\"image\">
              <img src=\"images/".$result['url']."\">"; ?>
          </div>
        </div></a>
      <?php
      }
    ?>
  </div>

</div>

<?php require('footer.php'); ?>
