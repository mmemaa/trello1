<?php

require_once "../php/baza.php";

$username = $_POST["up_ime"];
$password = $_POST["geslo"];

$sql = "SELECT * FROM uporabniki WHERE up_ime = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 0){
    echo "Uporabnik ne obstaja";
    header("refresh:2;url=login.html");
}
else {
    $user = mysqli_fetch_array($result);
    if(password_verify($password, $user["geslo"])){
        session_start();
        $_SESSION["id"] = $user["id"];
        $_SESSION["ime"] = $user["ime"];
        $_SESSION["priimek"] = $user["priimek"];
        $_SESSION["username"] = $user["up_ime"];
        $_SESSION["email"] = $user["email"];
        header("Location: ../homepage/index.php");
    }
    else {
        echo "Napacno geslo";
        header("refresh:2;url=login.html");
    }
}

