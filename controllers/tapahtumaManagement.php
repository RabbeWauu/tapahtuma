<?php
require_once "database/models/tapahtuma.php";
require_once 'libraries/cleaners.php';

function viewTapahtumatController(){
    $allevents = getAllTapahtumat();
    require "views/tapahtumat.view.php";  
}

function addTapahtumaController(){
    if (isset($_POST['nimi'], $_POST['kuvaus'], $_POST['tyyppi'], $_POST['lähiosoite'], $_POST['postiosoite'], $_POST['postitoimipaikka'], $_POST['päiväys'])) {
        $nimi = $_POST['nimi'];
        $kuvaus = $_POST['kuvaus'];
        $tyyppi = $_POST['tyyppi'];
        $lähiosoite = $_POST['lähiosoite'];
        $postiosoite = $_POST['postiosoite'];
        $postitoimipaikka = $_POST['postitoimipaikka'];
        $päiväys = $_POST['päiväys'];
        $userid = $_SESSION["userid"];
        addTapahtuma($userid, $nimi, $kuvaus, $tyyppi, $lähiosoite, $postiosoite, $postitoimipaikka, $päiväys); 
        header("Location: /");    
    } else {
        require "views/newTapahtuma.view.php";
    }
}

function ilmoittautuminenController() {
    if(isset($_POST['nimi'], $_POST['puhelinnumero'], $_POST['sähköposti'], $_POST['lisätiedot'], $_POST['päiväys'], $_POST['id'])) {
        $nimi = cleanUpInput($_POST['nimi']);
        $numero = cleanUpInput($_POST['puhelinnumero']);
        $email = cleanUpInput($_POST['sähköposti']);
        $lisätiedot = cleanUpInput($_POST['lisätiedot']);
        $päiväys = cleanUpInput($_POST['päiväys']);
        $id = $_POST['id'];
        ilmoittauduTapahtumaan($id, $nimi, $numero, $email, $lisätiedot, $päiväys);
        header("Location: /");
    } else {
        require "views/ilmoittautuminen.view.php";
    }
}

function editTapahtumaController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            $events = getTapahtumaById($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe tapahtumaa haettaessa: " . $e->getMessage();
    }
    
    if($events){
        $id = $events['tapahtumaID'];
        $nimi = $events['nimi'];
        $kuvaus = $events['kuvaus'];
        $tyyppi = $events['tyyppi'];
        $lähiosoite = $events['lähiosoite'];
        $postiosoite = $events['postiosoite'];
        $postitoimipaikka = $events['postitoimipaikka'];
        $päiväys = $events['päiväys'];
    
        require "views/updateTapahtuma.view.php";
    } else {
        header("Location: /");
        exit;
    }
}

function updateTapahtumaController(){
    if(isset($_POST['nimi'], $_POST['kuvaus'], $_POST['tyyppi'], $_POST['lähiosoite'], $_POST['postiosoite'], $_POST["postitoimipaikka"], $_POST['päiväys'], $_POST['id'])){
        $nimi = cleanUpInput($_POST['nimi']);
        $kuvaus = cleanUpInput($_POST['kuvaus']);
        $tyyppi = cleanUpInput($_POST['tyyppi']);
        $lähiosoite = cleanUpInput($_POST['lähiosoite']);
        $postiosoite = cleanUpInput($_POST["postiosoite"]);
        $postitoimipaikka = cleanUpInput($_POST['postitoimipaikka']);
        $päiväys = cleanUpInput($_POST['päiväys']);
        $id = cleanUpInput($_POST['id']);

        try{
            updateTapahtuma($nimi, $kuvaus, $tyyppi, $lähiosoite, $postiosoite, $postitoimipaikka, $päiväys, $id);
            header("Location: /");    
        } catch (PDOException $e){
                echo "Virhe tapahtumaa päivitettäessä: " . $e->getMessage();
        }
    } else {
        header("Location: /");
        exit;
    }
}

function deleteTapahtumaController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            deleteTapahtuma($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe tapahtumaa poistettaessa: " . $e->getMessage();
    }

    $allevents = getAllTapahtumat();

    header("Location: /");
    exit;
}

function deleteIlmoittautuminenController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            deleteIlmoittautuminen($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe ilmoittautumista poistettaessa: " . $e->getMessage();
    }

    $allsignups = getAllIlmoittautumiset();

    header("Location: /");
    exit;
}





