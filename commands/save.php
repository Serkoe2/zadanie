<?php
    $mysqli = new mysqli("localhost", "root", "root", "Tinkoff");
    $uploads = "uploads/";

    if ( !$_FILES || 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        return;
    }
    else {
        $file_name = "../" . $uploads . uniqid() . ".jpg";
        move_uploaded_file($_FILES['file']['tmp_name'], $file_name);
    }

    if ( is_numeric($_POST["price"]) )  {
        $price = intval($_POST["price"]);
    }
    else { echo "error type"; return ;}

    $sql = sprintf("INSERT INTO Shop (name,price,description,url) VALUES ('%s', '%d', '%s', '%s')", $mysqli->real_escape_string($_POST["name"]), $price, $_POST["description"],  $file_name );
    $result = $mysqli->query($sql);

    $sql = 'SELECT id FROM Shop ORDER BY id DESC';
    $result = mysqli_query($mysqli, $sql);
    if ($result == false) {
        echo "Произошла ошибка при выполнении запроса";
    }
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $response = [$result[0]["id"] , $file_name];

    echo json_encode($response);
?>