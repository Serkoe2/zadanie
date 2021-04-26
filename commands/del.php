<?php 
$mysqli = new mysqli("localhost", "root", "root", "Tinkoff");

$sql = sprintf("DELETE FROM `shop` WHERE `id` = '%s'", intval($_POST['id']));
$result = $mysqli->query($sql);


echo $result;

?>