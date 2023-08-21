<?php require "partials/head.php"; ?>

<h2 class="centered">Login</h2>
<p class="centered">rasmus@rasmus.com</p>
<p class="centered">testisalis</p>

<div class="inputarea">
<form  action="/login" method="post">
    <label for="email">Sähköpostiosoite:</label>
    <input type="text" name="email" id="email" maxlength=100 required>
    <label for="pword">Salasana:</label>
    <input id="pword" type="password" name="password" maxlength=100 required>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>