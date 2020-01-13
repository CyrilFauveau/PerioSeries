<?php

try {
  $bdd = new PDO('mysql:host=localhost;dbname=perioseries;charset=utf8', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
  ));
}
catch (Exception $e) {
  die("Erreur" . $e->getMessage());
}
