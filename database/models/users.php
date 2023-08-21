<?php
require_once "database/connection.php";

function addUser($nimi, $yritys, $email, $password){
    $pdo = connectDB();
    $hashedpassword = hashPassword($password);
    $data = [$nimi, $yritys, $email, $hashedpassword];
    $sql = "INSERT INTO käyttäjä (nimi, yritys, sähköposti, salasana) VALUES(?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function login($email, $password){
    $pdo = connectDB();
    $sql = "SELECT * FROM käyttäjä WHERE sähköposti=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$email]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);
    $hashedpassword = $user["salasana"];

    if($hashedpassword && password_verify($password, $hashedpassword))
        return $user;
    else 
        return false;
}