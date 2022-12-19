<?php

$conn = mysqli_connect("localhost", "root", "", "login");

if (!$conn) {
    echo "Connection Failed";
}
try{
    $pdo = new PDO('mysql:host=' . 'localhost' . ';dbname=' . 'login',"root", "");
}
catch(PDOException $e){
    echo('Connection failed');
}