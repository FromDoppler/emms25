<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-card/helpers/index.php');
?>

<div class="speaker-card__info">
    <p class="speaker-card__type"><?= translateExposes($speaker['exposes']) ?></p>
    <p class="speaker-card__title"><?= $speaker['title'] ?></p>


</div>
