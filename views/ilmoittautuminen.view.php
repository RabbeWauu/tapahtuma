<?php require "partials/head.php"; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<h2 class="centered">Ilmoittaudu tapahtumaan</h2>

<div class="inputarea">
<form  action="/ilmoittaudu" method="post" >
    <label for="nimi">Ilmoittautujan nimi:</label>
    <input type="text" name="nimi" id="nimi">
    <label for="puhelinnumero">Puhelinnumero:</label>
    <input type="number" name="puhelinnumero" id="puhelinnumero" maxlength=10>
    <label for="sähköposti">Sähköposti:</label>
    <input type="email" name="sähköposti" id="sähköposti">
    <label for="lisätiedot">Lisätiedot:</label>
    <textarea name="lisätiedot" id="lisätiedot" cols="30" rows="5"></textarea>
    <input type="hidden" name="päiväys" id="päiväys" value=<?=date("Y/m/d")?>>
    <input type="hidden" name="id" id="tapahtumaid" value=<?=$id?>>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>