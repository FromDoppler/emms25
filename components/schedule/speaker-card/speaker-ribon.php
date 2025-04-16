<?php
if (!function_exists('isSpeakerWithRibbon')) {
    function isSpeakerWithRibbon($speaker)
    {
        $speakersTypeWithRibbon = ['workshop', 'networking'];
        return in_array($speaker['exposes'], $speakersTypeWithRibbon);
    }
}

?>

<?php if (isSpeakerWithRibbon($speaker)): ?>
    <?php $text = ($isMobile ? 'VIP' : 'EXCLUSIVO ASISTENTE VIP');
    ?>
    <div class="speaker-card__ribbon"><?= $text ?> </div>
<?php endif; ?>
