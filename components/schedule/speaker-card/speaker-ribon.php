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
    <div class="speaker-card__ribbon">EXCLUSIVO ASISTENTE VIP</div>
<?php endif; ?>

