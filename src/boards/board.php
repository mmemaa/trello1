<?php
session_start();

require_once "../php/baza.php";

if(!isset($_GET["id"])){
    header("Location: ../homepage/index.php");
    exit();
}

$id = $_GET["id"];
$query = mysqli_prepare($link, "SELECT * FROM dashboardi WHERE id = ?");
mysqli_stmt_bind_param($query, "i", $id);
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);
$board = mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Board</title>
    <link rel = "stylesheet" type = "text/css" href = "board_style.css" />
</head>
<body style="background-color: <?php echo $board["barva"] ?>">

<div class="bar">
    <a href = "../homepage/index.php"> <img class="logo" src="../slike/952_trello_logo.jpg" alt="Tukaj mora biti IMDB logo"> </a>
    <form action="isci.php" method="post">
        <input class="iskanje" type="text" name="search" placeholder="Iskanje...">
        <button id="iskanje_gumb"> Iskanje s Trello </button>
    </form>
</div>

<div class="board">

    <div class="dodaj_opravilo">
        <form action="dodaj_opravilo.php" method="post" enctype="multipart/form-data">
            <input type="text" name="ime" placeholder="Ime opravila" required>
            <textarea name="vsebina" placeholder="Vsebina opravila" required></textarea>
            <input type="text" name="nujnost" placeholder="Nujnost" required>
            <input type="file" name="fileToUpload" placeholder="Slika" id="fileToUpload">
            <input type="hidden" name="dashboard_id" value="<?php echo $_GET["id"]; ?>">
            <input type="submit" value="Dodaj opravilo">
        </form>
    </div>

    <div class="opravila">
        <?php
        $id = $_GET["id"];
        $opravila = mysqli_prepare($link, "SELECT * FROM opravila WHERE dashboard_id = ?");
        mysqli_stmt_bind_param($opravila, "i", $id);
        mysqli_stmt_execute($opravila);
        $opravila = mysqli_stmt_get_result($opravila);
        while ($opravilo = mysqli_fetch_array($opravila)) {
            $slika_id = $opravilo["slika_id"];
            $query = mysqli_prepare($link, "SELECT * FROM slike WHERE id = ?");
            mysqli_stmt_bind_param($query, "i", $slika_id);
            mysqli_stmt_execute($query);
            $result = mysqli_stmt_get_result($query);
            $slika = mysqli_fetch_array($result);
            echo "<div class=\"opravilo\">";
            echo "<img src=\"../slike/" . $slika["ime"] . "\" alt=\"Slika ni na voljo\">";
            echo "<h3>" . htmlspecialchars($opravilo["ime"]) . "</h3>";
            echo "<p>" . htmlspecialchars($opravilo["tip"]) . "</p>";
            echo "<p>" . htmlspecialchars($opravilo["nujnost"]) . "</p>";
            echo "<a href=\"./uredi_opravilo.php?id=" . $opravilo["id"] . "\">Uredi</a>";
            echo "<a href=\"./izbrisi_opravilo.php?id=" . $opravilo["id"] . "&dashboard_id=" . $id . "\">Izbriši</a>";
            echo "</div>";
        }
        ?>
    </div>

</div>

</body>
</html>