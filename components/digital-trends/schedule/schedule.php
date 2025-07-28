<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
$normalizedUrl = getNormalizeUrl();
function getBlock($url)
{
    $blocks = [
        '/digital-trends' => [
            'block' => 'dt',
        ],
        '/digital-trends-registrado' => [
            'block' => 'dt-registrado',
        ],
        '/*' => [
            'block' => 'digital-trend',
        ],
    ];

    return $blocks[$url] ?? $blocks['/*'];
}
$block = getBlock($normalizedUrl);
?>

<section class="emms__calendar" id="agenda">
    <div class="emms__container--lg">
        <div class="emms__calendar__title emms__fade-in">

            <?php if ($digitalTrendsStates['isPre']) : ?>
                <h2>Agenda EMMS Digital Trends 2024</h2>
                <p class="hidden--vip">Del 26 al 28 de noviembre podrás disfrutar de Conferencias y Workshops, como así también
                    de un espacio de Networking diseñado especialmente para que puedas conectar y proyectar colaboraciones con especialistas de Marketing Digital.</p>
                <p class="show--vip">Descubre aquí los Speakers internacionales y las actividades exclusivas que te esperarán en esta edición. <br> Conferencias, Workshops, Casos de Éxito, Networking ¡y muchos más!</p>
            <?php elseif ($digitalTrendsStates['isDuring']) : ?>
                <h2>Agenda EMMS Digital Trends 2024</h2>
                <p>Del 26 al 28 de noviembre podrás disfrutar de Conferencias, Workshops y Networking</p>
                <p><strong>Importante:</strong> todos los Workshops quedarán grabados. Elige cada día el espacio de trabajo que más te guste para presenciar en vivo ¡y podrás revivir luego los otros!</p>
            <?php elseif ($digitalTrendsStates['isPost']) : ?>
                <h2>Descubre la agenda del evento</h2>
                <p>Speakers internacionales de las marcas más reconocidas y las principales entidades de la industria
                    del Marketing Digital en Latinoamérica compartieron sus casos de éxito, proyecciones
                    para el mercado, experiencias y las mejores estrategias prácticas. ¡Descúbrelos aquí!</p>
            <?php endif ?>
        </div>
        <?php include('speakers.php') ?>

        <?php if ($block['block'] === 'dt') : ?>
            <div class="emms__calendar__bottom emms__fade-in  eventHiddenElements hidden--vip">
                <a href="#registro" class="emms__cta">REGÍSTRATE GRATIS</a>
            </div>
        <?php elseif ($block['block'] === 'dt-registrado') : ?>
            <div class="emms__calendar__bottom emms__fade-in hidden--vip">
                <a href="./checkout" class="emms__cta">COMPRA TU ENTRADA VIP</a>
            </div>
        <?php endif; ?>
    </div>
</section>
