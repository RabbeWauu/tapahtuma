<?php require "partials/head.php"; ?>

<h2 class="centered">Rekisteröidy</h2>

<div class="inputarea">
<form  action="/register" method="post">
    <label for="name">Nimi:</label>
    <input type="text" name="name" id="name" maxlength=100 required>
    <label for="yritys">Yritys:</label>
    <input type="text" name="yritys" id="yritys" maxlength=100 required>
    <label for="email">Sähköpostiosoite:</label>
    <input type="text" name="email" id="email" maxlength=100 required>
    <label for="pword">Salasana:</label>
    <input type="password" name="password" id="pword" maxlength=100 required>
    <label for="pword2">Salasana uudelleen:</label>
    <input type="password" name="password2" id="pword2" maxlength=100 required onpaste="return false;">
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>