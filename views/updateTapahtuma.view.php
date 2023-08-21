<?php require "partials/head.php"; ?>

<h2 class="centered">Lisää uusi tapahtuma</h2>

<div class="inputarea">
<form  action="/update_tapahtuma" method="post" >
    <label for="nimi">Nimi:</label>
    <input id="nimi" type="text" name="nimi" maxlength=100 value="<?=$nimi?>">
    <label for="kuvaus">Kuvaus:</label>
    <textarea id="kuvaus" name="kuvaus" rows="5" cols="30"><?=$kuvaus?></textarea>
    <label for="tyyppi">Tyyppi:</label>
    <input type="text" name="tyyppi" id="tyyppi" maxlength=100 value="<?=$tyyppi?>">
    <label for="lähiosoite">Lähiosoite:</label>
    <input type="text" name="lähiosoite" id="lähiosoite" maxlength=100 value="<?=$lähiosoite?>">
    <label for="postiosoite">Postiosoite:</label>
    <input type="text" name="postiosoite" id="postiosoite" maxlength=5 value="<?=$postiosoite?>">
    <label for="postitoimipaikka">Postitoimipaikka:</label>
    <input type="text" name="postitoimipaikka" id="postitoimipaikka" maxlength=100 value="<?=$postitoimipaikka?>">
    <label for="päiväys">Päiväys:</label>
    <input type="date" name="päiväys" id="päiväys" value="<?=$päiväys?>">
    <input type="hidden" id="tapahtumaid" name="id" value=<?=$id?>>
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>