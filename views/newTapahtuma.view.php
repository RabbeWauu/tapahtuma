<?php require "partials/head.php"; ?>

<h2 class="centered">Syötä tapahtuma</h2>

<div class="inputarea">
<form  action="/add_tapahtuma" method="post">
    <label for="nimi">Tapahtuman nimi:</label>
    <input type="text" name="nimi" id="nimi" maxlength=100 required>
    <label for="kuvaus">Kuvaus:</label>
    <textarea name="kuvaus" id="kuvaus" cols="30" rows="5" required></textarea>
    <label for="tyyppi">Tapahtuman tyyppi:</label><br>
    <select name="tyyppi" id="tyyppi" required>
        <option value="Lapset">Lapset</option>
        <option value="Liikunta">Liikunta</option>
        <option value="Kulttuuri">Kulttuuri</option>
        <option value="Muu">Muu</option>
    </select><br>
    <label for="lähiosoite">Lähiosoite:</label>
    <input type="text" name="lähiosoite" id="lähiosoite" maxlength=100>
    <label for="postiosoite">Postiosoite:</label>
    <input type="text" name="postiosoite" id="postiosoite" maxlength=5>
    <label for="postitoimipaikka">Postitoimipaikka:</label>
    <input type="text" name="postitoimipaikka" id="postitoimipaikka" maxlength=100>
    <label for="päiväys">Tapahtuman ajankohta:</label>
    <input type="date" name="päiväys" id="päiväys" required>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>