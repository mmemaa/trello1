<?php
session_start();

require_once "../php/baza.php";

if (isset($_POST["search"]) && isset($_SESSION["id"])) {
    $search = "%" . $_POST["search"] . "%";
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM dashboardi as d INNER JOIN dashboard_uporabnik as du ON d.id = du.dashboard_id WHERE du.uporabnik_id = ? AND LOWER(d.ime) LIKE LOWER(?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "is", $id, $search);
    mysqli_stmt_execute($stmt);
    $boardi = mysqli_stmt_get_result($stmt);
}else if(isset($_SESSION["id"])){
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM dashboardi as d INNER JOIN dashboard_uporabnik as du ON d.id = du.dashboard_id WHERE du.uporabnik_id = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $boardi = mysqli_stmt_get_result($stmt);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Trello</title>
    <link rel = "stylesheet" type = "text/css" href = "homepage_style.css" />
    <meta charset="UTF-8">
</head>

<body>
<div class="homepage">

    <div class="bar">
        <a href = "index.php"> <img class="logo" src="../slike/952_trello_logo.jpg" alt="Tukaj mora biti IMDB logo"> </a>
        <form method="post">
        <input class="iskanje" type="text" name="search" placeholder="Iskanje..." value="<?php if(isset($_POST["search"])){echo $_POST["search"];} ?>">
        <button id="iskanje_gumb"> Iskanje s Trello </button>
        </form>

        <div class="gumbi">
            <?php
        if (isset($_SESSION["username"])) {
            echo "<p class=\"uporabnik\"> Zdravo, " . $_SESSION["username"] . "!</p>";
            echo "<a href = \"../uporabnik/odjava.php\" class=\"logout\"> <button class=\"odjava\"> Odjava </button> </a>";
        }else{
            echo "<a href = \"../uporabnik/login.html\" class=\"login\"> <button class=\"prijava\"> Prijavi se </button> </a>";
            echo "<a href = \"../uporabnik/register.html\" class=\"register\"> <button class=\"registracija\"> Registriraj se </button> </a>";
        }
        ?>
        </div>
    </div>
    <?php
    if (isset($_SESSION["username"])) {
    ?>
    <div class="main">
        <div class="create">
            <a href="../boards/create_board.php"> <button class="create"> Ustvari nov board </button> </a>
        </div>

        <div class="boardi">
            <?php

            while ($board = mysqli_fetch_array($boardi)) {
                echo "<div class=\"board\">";
                echo "<a href=\"../boards/board.php?id=" . $board["id"] . "\">" . $board["ime"] . "</a>";
                echo "</div>";
            }
            ?>
        </div>

    </div>
    <?php
    }
    ?>
</div>