<?php

require 'Database.php';

function randomLink ($length = 5) {
    $abc = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $link = '';
    for ($i = 0; $i <$length; $i++) {
        $link .= $abc[rand(0, strlen($abc))];
    }
    return $link;
}

if (isset($_POST['full']) && !empty($_POST['full'])) {
    $full = $_POST['full'];
    $short = randomLink();

    $db = [
        'dsn' => 'mysql:host=localhost;dbname=ck27434_mvc;charset=utf8',
        'user' => 'ck27434_mvc',
        'pass' => 'mvcmvc',
    ];
    try {
        $conn = Database::instance();
        $checkShort = "SELECT * FROM Links WHERE short = '$short'";
        $sqlRequest = $conn->query($checkShort);

        if(count($sqlRequest) < 1) {
            $sql = "INSERT INTO Links (short, full) VALUES ('$short', ?)";
            $param = [
                '%' . $_POST['full'] . '%'
            ];

            $conn->execute($sql, $param);
        }
    }
    catch(PDOException $e) {
        echo 'Ошибка при подключении к базе данных'."<br>";
    }

    test_function($short);
}


function test_function($short){
    $result = $short;

    echo json_encode($result)."<br>";
}

