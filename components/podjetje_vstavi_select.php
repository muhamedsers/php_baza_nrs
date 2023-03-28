<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>


<div class="formCont">
    <a href="">V Tabelo Podjtje</a>
    <a href="">V tabelo Delavec</a>
    <a href="">V Tabelo projekt</a>
    <a href="">V tabelo sodeluje</a>
</div>

<?php
include "common_var.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST["imePodjetja"] !== "" || $_POST["krajPodjetja"] !== ""){
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $imePodjetja = $_POST["imePodjetja"];
        $krajPodjetja = $_POST["krajPodjetja"];

        $sql = "INSERT INTO podjetje (naziv, mesto) VALUES ('$imePodjetja', '$krajPodjetja')";
        if (mysqli_query($conn, $sql)) {
            echo "Uspelo";
        } else {
            echo "Napaka: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }   else {
        echo "Prazna forma preveri se enkrat";
    }


}
?>
</body>
</html>
