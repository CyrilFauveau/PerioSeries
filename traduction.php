<?php

function trad($bdd, $name_column, $lang) {
  $req = $bdd -> prepare("SELECT $lang FROM traduction WHERE name = ?");
  $req -> execute(array($name_column));
  while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
    return $result[$lang];
  }
}
