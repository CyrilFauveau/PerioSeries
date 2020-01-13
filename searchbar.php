<div class="search">
  <form action="recherche.php" method="post">
    <input type="text" name="search" placeholder="<?= trad($bdd, 'searchbar_placeholder', $lang); ?>" value="<?php if (isset($_POST['search'])) { echo $_POST['search']; } ?>">
    <input type="submit" value="<?= trad($bdd, 'searchbar_value', $lang); ?>">
  </form>
</div>
