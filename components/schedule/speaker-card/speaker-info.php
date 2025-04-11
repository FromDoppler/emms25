<?php
if (!function_exists('translateExposes')) {
    function translateExposes($exposes)
    {
        $mapa = [
            'conference'    => 'Conferencia',
            'workshop'      => 'workshop',
            'networking'    => 'NETWORKING',
            'successStory'  => 'CASO DE EXITO'
        ];

        return $mapa[$exposes] ?? $exposes;
    }
}

?>

<div class="speaker-card__info">
    <p class="speaker-card__type"><?= translateExposes($speaker['exposes']) ?></p>
    <p class="speaker-card__title"><?= $speaker['title'] ?></p>
    <p class="speaker-card__more-info">VER MAS INFO</p>
    <!-- CTA -->
    <?php include('speaker-cta.php'); ?>
</div>
