<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-grid-helper.php');

$normalizedUrl = getNormalizeUrl();
function getScheduleBlock2($url)
{
    $blocks = [
        '/ecommerce' => [
            'block' => 'ecommerce',
        ],
        '/ecommerce-registrado' => [
            'block' => 'ecommerce-registrado',
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

            <?php if ($block['block'] === 'ecommerce') : ?>
                <p>
                    Speakers internacionales y las marcas con más trayectoria de Latam y España compartieron las últimas tendencias en Comercio Electrónico. ¡Descúbrelos aquí!
                </p>
            <?php elseif ($block['block'] === 'ecommerce-registrado') : ?>
                <p class="hidden--vip">
                    Inspírate y aprende a través de Conferencias, Casos de Éxito y Entrevistas. ¡Descúbrelos aquí!
                </p>
                <p class="show--vip">
                    Los mayores referentes de la industria compartieron las últimas tendencias en Comercio Electrónico.
                    Inspírate y aprende a través de Conferencias y Workshops. ¡Descúbrelos aquí!
                </p>
            <?php endif; ?>
        </div>

        <?php
        //TODO: Abstraer ecommerceStates a un getter que pase el state del currentEvent para volver agnostica la genda de eventos
        render_speaker_grid($ecommerceStates, $isRegistered); ?>
        <?php if ($block['block'] === 'ecommerce') : ?>
            <div class="emms__calendar__bottom emms__fade-in  eventHiddenElements">
                <a href="#registro" class="emms__cta">REGÍSTRATE AHORA</a>
            </div>
            <div class="emms__calendar__bottom  eventShowElements">
                <a href="#registro" class="emms__cta alreadyRegisterForm"><span class="button__text">REGÍSTRATE GRATIS</span></a>
            </div>
        <?php endif; ?>
    </div>
</section>
