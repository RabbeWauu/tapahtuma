<?php

require_once 'database/models/profiili.php';
require_once 'database/connection.php';
require_once 'libraries/cleaners.php';

function showProfile($userId) {
    $user = getUserInfo($userId);
    $events = getUserEvents($userId);
    require 'views/profiili.view.php';
}
?>
