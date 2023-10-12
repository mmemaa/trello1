<?php

require_once "../php/baza.php";

$name = $_POST["ime"];
$surname = $_POST["priimek"];
$username = $_POST["up_ime"];
$password = $_POST["geslo"];
$hash_password = password_hash($password, PASSWORD_DEFAULT);
$email = $_POST["email"];

$sql = "SELECT * FROM uporabniki WHERE up_ime = '$username'";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0){
    echo "Uporabnisko ime ze obstaja";
    header("refresh:2;url=register.html");
}
else {

    $sql = "INSERT INTO uporabniki (ime, priimek, up_ime, geslo, email) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $name, $surname, $username, $hash_password, $email);
    if(mysqli_stmt_execute($stmt)) {
        echo "Uspesno ste se registrirali";
        header("refresh:2;url=login.html");
    }
    header("Location: login.html");
}