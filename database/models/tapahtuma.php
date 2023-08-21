<?php
require_once "database/connection.php";

function getAllTapahtumat(){
    $pdo =connectDB();
    $sql = "SELECT tapahtuma.*, käyttäjä.nimi AS yhteyshenkilöNimi FROM tapahtuma INNER JOIN käyttäjä ON tapahtuma.yhteyshenkilöID = käyttäjä.käyttäjäID ORDER BY tapahtuma.päiväys ASC";
    $stm = $pdo->query($sql);   
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addTapahtuma($userid, $nimi, $kuvaus, $tyyppi, $lähiosoite, $postiosoite, $postitoimipaikka, $päiväys){
    $pdo =connectDB();
    $data = [$userid, $nimi, $kuvaus, $tyyppi, $lähiosoite, $postiosoite, $postitoimipaikka, $päiväys];
    $sql = "INSERT INTO tapahtuma (yhteyshenkilöID, nimi, kuvaus, tyyppi, lähiosoite, postiosoite, postitoimipaikka, päiväys) VALUES(?,?,?,?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function ilmoittauduTapahtumaan($tapahtumaid, $nimi, $numero, $email, $lisätiedot, $päiväys) {
    $pdo = connectDB();
    $data = [$tapahtumaid, $nimi, $numero, $email, $lisätiedot, $päiväys];
    $sql = "INSERT INTO ilmoittautuminen (tapahtumaid, nimi, puhelinnumero, sähköposti, lisätiedot, päiväys) VALUES (?,?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function getAllIlmoittautumiset() {
    $pdo = connectDB();
    $sql = "SELECT * FROM ilmoittautuminen";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function getEventSignups($eventId) {
    $pdo = connectDB();
    $query = "SELECT * FROM ilmoittautuminen WHERE eventID = :eventId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTapahtumaById($id){
    $pdo = connectDB();
    $sql = "SELECT * FROM tapahtuma WHERE tapahtumaid=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$id]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function deleteTapahtuma($id){
    $pdo = connectDB();
    $sql = "DELETE tapahtuma, ilmoittautuminen FROM tapahtuma LEFT JOIN ilmoittautuminen ON tapahtuma.tapahtumaID = ilmoittautuminen.tapahtumaID WHERE tapahtuma.tapahtumaID=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$id]);
}

function deleteIlmoittautuminen($id){
    $pdo = connectDB();
    $sql = "DELETE FROM ilmoittautuminen WHERE ilmoittautuminenID=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$id]);
}

function updateTapahtuma($nimi, $kuvaus, $tyyppi, $lähiosoite, $postiosoite, $postitoimipaikka, $päiväys, $tapahtumaid){
    $pdo = connectDB();
    $data = [$nimi, $kuvaus, $tyyppi, $lähiosoite, $postiosoite, $postitoimipaikka, $päiväys, $tapahtumaid];
    $sql = "UPDATE tapahtuma SET nimi = ?, kuvaus = ?, tyyppi = ?, lähiosoite = ?, postiosoite = ?, postitoimipaikka = ?, päiväys = ? WHERE tapahtumaID = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}