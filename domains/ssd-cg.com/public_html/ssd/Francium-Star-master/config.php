<?php
require_once __DIR__ . "/Fr.star.php";

$star = new \Fr\Star(array(
  "db" => array(
    "host" => "localhost",
    "port" => 3306,
    "username" => "root",
    "password" => "",
    "name" => "ussdc531_ssd",
    "table" => "fx_star"
  )
));
