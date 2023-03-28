<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_menu.css">
    <title>Document</title>
</head>

<body>


<div class="formCont">
    <form action="podjetje_vstavi.php" method="post">
        <div class="forminner">
            <input type="text" placeholder="Ime" name="imePodjetja" id="naziv">
            
            <input type="text" placeholder="Mesto" name="krajPodjetja" id="mesto">
            <input type="submit" value="Poslji"></div>
    </form>
</div>

<?php
include "common_var.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST["imePodjetja"] !== "" || $_POST["krajPodjetja"] !== ""){
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        mysqli_query($conn, "set names 'utf8'");
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
