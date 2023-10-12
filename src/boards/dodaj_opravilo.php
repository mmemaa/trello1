<?php

require_once "../php/baza.php";
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../homepage/index.php");
    exit();
}

//make me file upload and save the path to the database and the file to the folder on the server

$target_dir = "../slike/";
$file_name = time() . "_" . str_replace(" ", "_" , basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $file_name;
$uploadOk = 1;
$image_id = null;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$fileUploadedSuccessfully = false;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $fileUploadedSuccessfully = true;
        $sql = "INSERT INTO slike (url, ime) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($link);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $target_file, $file_name);
            mysqli_stmt_execute($stmt);
            $image_id = mysqli_insert_id($link);
        }
    }


if(isset($_POST["ime"])){
    $ime = $_POST["ime"];
    $vsebina = $_POST["vsebina"];
    $nujnost = $_POST["nujnost"];
    $dashboard_id = $_POST["dashboard_id"];
    $sql = "INSERT INTO opravila (ime, tip, nujnost, dashboard_id, slika_id,uporabnik_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($link);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssiii", $ime, $vsebina, $nujnost, $dashboard_id, $image_id, $_SESSION["id"]);
        mysqli_stmt_execute($stmt);
        header("Location: ../boards/board.php?id=$dashboard_id");
    }
    else {
        echo "Napaka pri ustvarjanju opravila";
        header("refresh:2;url=../boards/board.php?id=$dashboard_id");
    }
}
}
else {
}