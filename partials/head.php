<!DOCTYPE html>
<html lang="fi">
<head>
    <title>PHP</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
</head>
<body>
<script>
    function confirmDelete(id) {
        const answer = confirm("Poistetaanko tapahtuma?");
        if(!answer){
            document.getElementById('deleteTapahtuma' + id).href = '/';
        }
        return answer;
    }
</script>
    <header>
        <h1>Rasmuksen Tapahtumapalvelu</h1>
        
    </header>
<nav>
    <ul class="navbar">
        <a href="/"><li class="navbutton">Tapahtumat</li></a>
        <?php if(!isLoggedIn()): ?>
           <a href="/login"><li class="navbutton">Kirjaudu sisään</li></a> 
           <a href="register"><li class="navbutton">Rekisteröidy</li></a>
        <?php else: ?>
            <a href="/add_tapahtuma"><li class="navbutton">Uusi tapahtuma</li></a>
            <a href="/profiili"><li class="navbutton">Omat tiedot</li></a>
            <a href="/logout"><li class="navbutton">Kirjaudu ulos</li></a>
        <?php endif ?>

    </ul>
</nav>