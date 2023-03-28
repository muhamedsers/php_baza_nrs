<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="../../fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../../fontawesome/css/brands.css" rel="stylesheet">
    <link href="../../fontawesome/css/solid.css" rel="stylesheet">

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
        div {
            width: 30vw;
            background-color: #29343b;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        div > h3 {
            text-align: center;
            color: aliceblue;
        }
        .formContainer{
            display: grid;
            gap: 1rem;
        }
        .forms{
            border-radius: 0.5rem;
        }
        .fa-solid{
            color: white;
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
    $newColName = $_POST["newColName"];
    $oldColName = $_POST["oldColName"];
    $edit = "ALTER TABLE podjetje RENAME COLUMN " . $oldColName . "TO" . $newColName;
    if (mysqli_query($conn, $newColName)) {
        echo "Uspelo";
    } else {
        echo "Napaka: " . $sql . "<br>" . mysqli_error($conn);
    }


}


mysqli_close($conn);

?>


<div class="formContainer">
    <div class="forms">
        <form action="podjetje_brisi.php" method="post">
            <div>
                <h3>Data type:</h3>
                <select name="row" id="">
                    <option value="idPodjetja">Id Podjetja</option>
                    <option value="mestoPodjetja">Mesto</option>
                </select>
                <select name="dataType" id="dataTypeSelect">
                    <option value="varchar">NVARCHAR</option>
                    <option value="int">INT</option>
                    <option value="char">CHAR</option>
                    <option value="datetime">DATETIME</option>
                    <option value="text">TEXT</option>
                    <option value="boolean">BOOL</option>
                </select>
                <input type="submit" value="Poslji">
            </div>
        </form>
    </div>
    <div class="forms">
        <form action="podjetje_brisi.php" method="post">
            <div>
                <h3>Ime stolpca: </h3>
                <select name="oldColName" id="">
                    <option value="idPodjetja">Id Podjetja</option>
                    <option value="mestoPodjetja">Mesto</option>
                </select>
                <i class="fa-solid fa-arrow-right-long"></i>
                <input type="text" name="newColName" id="">
                <input type="submit" value="Poslji">
            </div>
        </form>
    </div>
</div>


</body>
</html>
