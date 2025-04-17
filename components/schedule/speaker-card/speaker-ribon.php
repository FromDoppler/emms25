<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-card/speaker-card-helper.php');
?>

<?php if (isSpeakerWithRibbon($speaker)): ?>
    <?php $text = ($isMobile ? 'VIP' : 'EXCLUSIVO ASISTENTE VIP');
    ?>
    <div class="speaker-card__ribbon"><?= $text ?> </div>
<?php endif; ?>
