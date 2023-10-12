<?php
session_start();

require_once "../php/baza.php";

if (isset($_POST["ime"])) {
    $ime = $_POST["ime"];
    $barva = $_POST["barva"];
    $slika = $_POST["slika"];
    $id = $_SESSION["id"];

    $sql = "INSERT INTO dashboardi (ime, barva) VALUES (?,?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $ime, $barva);
    if(mysqli_stmt_execute($stmt)) {
        header("Location: ./board.php?id=" . mysqli_insert_id($link));
        $sql = "INSERT INTO dashboard_uporabnik (uporabnik_id, dashboard_id) VALUES (?, ?)";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $id, mysqli_insert_id($link));
        mysqli_stmt_execute($stmt);
    }
    else {
        echo "Napaka pri ustvarjanju table";
        header("refresh:2;url=create_board.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trello</title>
</head>
<body>
<div class="vnos">
    <form action="create_board.php" method="post">
        <label>Ime tabele: </label>
        <input type="text" name="ime" required>
        <input type="submit" value="Ustvari tabelo">
        <br>
        <label>Izberi barvo ozadja: </label>
        <input type="color" name="barva" value="#ff0000">
        <p>Ali izberite poljubno ozadje: </p>
        <input type="file" name="slika" accept="image/png, image/jpeg">
        <br>
        <input type="submit" value="Ustvari tabelo">
    </form>
</div>
</body>
</html>