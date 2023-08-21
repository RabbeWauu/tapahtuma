<?php require "partials/head.php"; ?>

<h2 class="centered">Katso tapahtumia</h2>
<form method="get" id="filter-form" class='centered'>
    <label for="event_type">Valitse tapahtumatyyppi:</label>
    <select name="event_type" id="event_type">
        <option value="" selected>Valitse tapahtumatyyppi</option>
        <option value="">Kaikki</option>
        <option value="Lapset">Lapset</option>
        <option value="Liikunta">Liikunta</option>
        <option value="Kulttuuri">Kulttuuri</option>
        <option value="Muu">Muu</option>
    </select>
</form>

<script>
    document.getElementById('event_type').addEventListener('change', function() {
        document.getElementById('filter-form').submit();
    });
</script>

<div class="events">
    <?php
    $selected_event_type = $_GET['event_type'] ?? '';
    
    foreach ($allevents as $eventitem):
        $id = $eventitem['tapahtumaID'];
        $event_type = $eventitem['tyyppi'];

        if (empty($selected_event_type) || $selected_event_type === $event_type):
    ?>
    <div class='eventitem'>
        <h3><?= $eventitem["nimi"] ?></h3>
        <p><?= $eventitem["kuvaus"] ?></p>
        <p>Tapahtumatyyppi: <?= $event_type ?></p>
        <p>Osoitetiedot: <?= $eventitem["lähiosoite"] . " " . $eventitem["postiosoite"] . " " . $eventitem["postitoimipaikka"] ?></p>
        <p>Luonut <?= $eventitem["yhteyshenkilöNimi"] ?>, <?= date("d.m.Y", strtotime($eventitem['päiväys'])) ?></p>
        <h2><a href='/ilmoittaudu?id=<?= $id ?>'>Ilmoittaudu</a></h2>
        <?php if (isLoggedIn() && ($eventitem["yhteyshenkilöID"] == $_SESSION["userid"])): ?>
            <?php $tapahtumaid = 'deleteEvents' . $id; ?>
            <a id=<?= $tapahtumaid ?> onClick='confirmDelete(<?= $id ?>)' href='/delete_tapahtuma?id=<?= $id ?>'>Poista</a> |
            <a href='/update_tapahtuma?id=<?= $id ?>'>Päivitä</a>
        <?php endif; ?>
    </div>
    <?php
        endif;
    endforeach;
    ?>
</div>

<?php require "partials/footer.php"; ?>
