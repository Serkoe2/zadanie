<?php
    $mysqli = new mysqli("localhost", "root", "root", "Tinkoff");
    $uploads = "uploads/";

    $sql = 'SELECT * FROM Shop';
    $result = mysqli_query($mysqli, $sql);
    if ($result == false) {
        echo "Произошла ошибка при выполнении запроса";
    }
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

    for ($i = 0; $i < count($result); $i++){
        $result[$i]["url"] = $uploads . $result[$i]["url"];
    }
    echo json_encode($result);
   
?>
