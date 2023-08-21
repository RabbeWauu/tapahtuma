<?php

function getUserInfo($userId) {
    $pdo = connectDB();
    $userQuery = "SELECT * FROM käyttäjä WHERE käyttäjäID = :userId";
    $userStmt = $pdo->prepare($userQuery);
    $userStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $userStmt->execute();
    return $userStmt->fetch(PDO::FETCH_ASSOC);
}

function getUserEvents($userId) {
    $pdo = connectDB();
    $eventsQuery = "SELECT tapahtuma.*, ilmoittautuminen.nimi AS ilmoittautunutNimi, ilmoittautuminen.sähköposti AS ilmoittautunutSähköposti FROM tapahtuma LEFT JOIN ilmoittautuminen ON tapahtuma.tapahtumaID = ilmoittautuminen.tapahtumaID WHERE tapahtuma.yhteyshenkilöID = :userId";
    $eventsStmt = $pdo->prepare($eventsQuery);
    $eventsStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $eventsStmt->execute();
    return $eventsStmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
