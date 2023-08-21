<?php
require_once "database/models/users.php";
require_once 'libraries/cleaners.php';
require_once 'database/connection.php';

function registerController(){
    if(isset($_POST['name'], $_POST['yritys'], $_POST['email'], $_POST['password'], $_POST['password2']) && $_POST['password'] == $_POST['password2']){
        $nimi = cleanUpInput($_POST['name']);
        $yritys = cleanUpInput($_POST['yritys']);
        $email = cleanUpInput($_POST['email']);
        $password = cleanUpInput($_POST['password']);

        try {
            addUser($nimi, $yritys, $email, $password);
            header("Location: /login"); 
        } catch (PDOException $e){
            echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
        }
    } elseif (isset($_POST['password'], $_POST['password2']) && $_POST['password'] !== $_POST['password2']){
        require "views/register.view.php";
        echo "<h2 class='centered'>Salasanat ei täsmää</h2>";
    } else {
        require "views/register.view.php";
    }
}

function loginController(){
    if(isset($_POST['email'], $_POST['password'])){
        $email = cleanUpInput($_POST['email']);
        $password = cleanUpInput($_POST['password']);
  
        $result = login($email, $password);
        if($result){
            $_SESSION['email'] = $result['sähköposti'];
            $_SESSION['userid'] = $result['käyttäjäID'];
            $_SESSION['session_id'] = session_id();
            header("Location: /"); 
        } else {
            require "views/login.view.php";
        }
    } else {
        require "views/login.view.php";
    }
}

function logoutController(){
    session_unset(); //poistaa kaikki muuttujat
    session_destroy();
    setcookie(session_name(),'',0,'/'); //poistaa evästeen selaimesta
    session_regenerate_id(true);
    header("Location: /login"); // forward eli uudelleenohjaus
    die();
}