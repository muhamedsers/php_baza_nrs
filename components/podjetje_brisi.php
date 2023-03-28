<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Izpis</title>
    <style>
        table, td{
            border: 1px solid #313349;
        }
        td{
            background-color: #29343b;
            color: aliceblue;
            width: 10rem;
        }
        table{
            background-color: #65d78d;
            padding: 1rem;
        }
    </style>
</head>
<body>
<div class="header">

</div>


<?php

include "common_var.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM podjetje";

$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    echo "Uspelo";
} else {
    echo "Napaka: " . $sql . "<br>" . mysqli_error($conn);
}


echo "<table>";
echo "<tr><th>Id Podjetja</th><th>Naziv Podjetja</th><th>Mesto</th></tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo  "<tr>". "<td>" .  $row["id_podjetje"] . "</td>" . "<td>" . $row["naziv"] . "</td>" . "<td>" . $row["mesto"]. "</td>" . "</tr>";
}
echo "</table>";


if ($_SERVER['REQUEST_METHOD'] === "POST")  {
    $idPodjetja = $_POST["idPodjetja"];

    $deleteFromDB = "DELETE FROM podjetje WHERE id_podjetje = $idPodjetja";
    if (mysqli_query($conn, $deleteFromDB)) {
        echo "Uspelo";
    } else {
        echo "Napaka: " . $sql . "<br>" . mysqli_error($conn);
    }


}


mysqli_close($conn);

?>


<div>
    <form action="podjetje_brisi.php" method="post">
        <label for="">Id Podjetja:<input type="text" name="idPodjetja" id="idPodjetja"></label>
        <input type="submit" value="Poslji">
    </form>
</div>


</body>
</html>

