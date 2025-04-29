<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-grid-helper.php');

$normalizedUrl = getNormalizeUrl();
function getScheduleBlock2($url)
{
    $blocks = [
        '/ecommerce' => [
            'block' => 'dt',
        ],
        '/ecommerce-registrado' => [
            'block' => 'dt-registrado',
        ],
        '/*' => [
            'block' => 'digital-trend',
        ],
    ];

    return $blocks[$url] ?? $blocks['/*'];
}
$block = getScheduleBlock2($normalizedUrl);
?>

<section class="emms__calendar" id="agenda">
    <div class="emms__container--lg">
        <div class="emms__calendar__title emms__fade-in">
            <h2>AGENDA EMMS E-COMMERCE 2025</h2>
            <p>
                Speakers internacionales y las marcas con más trayectoria de Latam y España compartieron las últimas tendencias en Comercio Electrónico. ¡Descúbrelos aquí!
            </p>
        </div>

        <?php
        //TODO: Abstraer ecommerceStates a un getter que pase el state del currentEvent para volver agnostica la genda de eventos
        render_speaker_grid($ecommerceStates, $isRegistered); ?>
        <?php if ($block['block'] === 'dt') : ?>
            <div class="emms__calendar__bottom emms__fade-in  eventHiddenElements">
                <a href="#registro" class="emms__cta">REGÍSTRATE AHORA</a>
            </div>
            <div class="emms__calendar__bottom  eventShowElements">
                <a href="#registro" class="emms__cta alreadyRegisterForm"><span class="button__text">REGÍSTRATE GRATIS</span></a>
            </div>
        <?php elseif ($block['block'] === 'dt-registrado') : ?>
            <div class="emms__calendar__bottom emms__fade-in hidden--vip">
                <a href="./checkout" class="emms__cta">COMPRA TU ENTRADA VIP</a>
            </div>
        <?php endif; ?>
    </div>
</section>
