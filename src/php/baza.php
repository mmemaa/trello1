<?php

$host = "mysql";
$user = "user";
$password = "password";
$link = mysqli_connect($host,$user,$password, "db") or die("Napaka pri povezavi z bazo");