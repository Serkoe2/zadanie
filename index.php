<?php
$static = "static/";


$mysqli = new mysqli("localhost", "root", "root", "Tinkoff");
if ($mysqli->connect_errno) {
  echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
require_once('templates/main.php');
?>
