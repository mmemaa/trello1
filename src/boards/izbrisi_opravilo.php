<?php
session_start();

require_once "../php/baza.php";

if(!isset($_GET["id"])){
    header("Location: index.php");
    exit();
}

$id = $_GET["id"];
$dashboard_id = $_GET["dashboard_id"];

$query = "DELETE FROM opravila WHERE id = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: ./board.php?id=$dashboard_id");
exit();
?>
