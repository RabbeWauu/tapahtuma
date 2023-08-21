<?php require "partials/head.php"; ?>

<div class='profile-container'>
    <h1>Tervetuloa, <?= $user['nimi']; ?></h1>
    <h3>Sähköpostiosoite: <?= $user['sähköposti']; ?></h3>

    <h2>Tapahtumasi</h2>
    <?php foreach ($events as $event): ?>
        <div class="event">
            <h3><?= $event['nimi']; ?> (<?= date("d.m.Y", strtotime($event['päiväys']))?>)</h3>
            <h4>Ilmoittautuneet:</h4>
            <?php if ($event['ilmoittautunutNimi']): ?>
                <ul>
                    <li><?= $event['ilmoittautunutNimi']; ?> (<?= $event['ilmoittautunutSähköposti']; ?>)</li>
                </ul>
            <?php else: ?>
                <p>Ei ilmoittautuneita</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php require "partials/footer.php"; ?>
