<?php

require_once "../php/baza.php";
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../homepage/index.php");
    exit();
}



if (isset($_POST["ime"])) {
    $ime = $_POST["ime"];
    $vsebina = $_POST["vsebina"];
    $nujnost = $_POST["nujnost"];
    $id = $_POST["id"];
    $dashboard_id = $_POST["dashboard_id"];

    $query = "UPDATE opravila SET ime = ?, tip = ?, nujnost = ? WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $ime, $vsebina, $nujnost, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ./board.php?id=$dashboard_id");
    exit();
}

$id = $_GET["id"];

$query = "SELECT * FROM opravila WHERE id = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$opravilo = mysqli_fetch_array($result);

mysqli_stmt_close($stmt);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uredi opravilo</title>

    <link rel = "stylesheet" type = "text/css" href = "board_style.css" />
</head>
<body>

<div class="bar">
    <a href = "../homepage/index.php"> <img class="logo" src="../slike/952_trello_logo.jpg" alt="Tukaj mora biti IMDB logo"> </a>
    <form action="isci.php" method="post">
        <input class="iskanje" type="text" name="search" placeholder="Iskanje...">
        <button id="iskanje_gumb"> Iskanje s Trello </button>
    </form>
</div>

<div class="board">

    <div class="dodaj_opravilo">
        <form action="uredi_opravilo.php" method="post" enctype="multipart/form-data">
            <input type="text" name="ime" placeholder="Ime opravila" value="<?php echo htmlspecialchars($opravilo["ime"]); ?>" required>
            <textarea name="vsebina" placeholder="Vsebina opravila" required><?php echo htmlspecialchars($opravilo["tip"]); ?></textarea>
            <input type="text" name="nujnost" placeholder="Nujnost" value="<?php echo htmlspecialchars($opravilo["nujnost"]); ?>" required>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="dashboard_id" value="<?php echo $opravilo["dashboard_id"]; ?>">
            <input type="submit" value="Uredi opravilo">
        </form>
    </div>

</div>

</body>

</html>

