<?php

$contentsLive = [
    '/' => [
        'helloBarText' => '🚨EMMS Digital Trends: ¡ya estamos en vivo! 🚨 Conferencias gratuitas, Workshops, Networking y mucho más.',
        'helloBarCtaTxt' => 'SÚMATE GRATIS',
        'helloBarCtaLink' => '/digital-trends',
    ],
    '/registrado' => [
        'helloBarText' => '🎆¡Llegó el EMMS Digital Trends!🎆 Súmate al vivo ahora',
        'helloBarCtaTxt' => ' MIRA LA TRANSMISIÓN',
        'helloBarCtaLink' => '/digital-trends-registrado',
    ],
    '/digital-trends' => [
        'helloBarText' => '📢 ¡Ya estamos en vivo! 📢 ¿Todavía no te has registrado? Súmate gratis.',
        'helloBarCtaTxt' => 'ÚNETE AHORA',
        'helloBarCtaLink' => '#registro',
    ],
    '/digital-trends-registrado' => [
        'helloBarText' => '🎫 ¡Quedan pocas! Consigue tu entrada VIP para sumarte a las actividades exclusivas',
        'helloBarCtaTxt' => 'HAZTE VIP',
        'helloBarCtaLink' => '#entradas',
    ],
    '/*' => [
        'helloBarText' => '🚨EMMS Digital Trends: ¡ya estamos en vivo! 🚨 Conferencias gratuitas, Workshops, Networking y mucho más.',
        'helloBarCtaTxt' => 'SÚMATE GRATIS',
        'helloBarCtaLink' => '/digital-trends',
    ],
];
$contentsDuring = [
    '/' => [
        'helloBarText' => '¡Ya llegó el EMMS Digital Trends 2024! Únete a otra jornada con más Conferencias gratuitas, Workshops y Networking',
        'helloBarCtaTxt' => 'REGÍSTRATE GRATIS',
        'helloBarCtaLink' => '/digital-trends',
    ],
    '/registrado' => [
        'helloBarText' => 'EMMS Digital Trends: Únete a otra jornada con más Conferencias gratuitas, Workshops y Networking.',
        'helloBarCtaTxt' => ' MIRA LA TRANSMISIÓN',
        'helloBarCtaLink' => '/digital-trends-registrado',
    ],
    '/digital-trends' => [
        'helloBarText' => '¡Queda más EMMS Digital Trends! ¿Aún no te has registrado? Súmate gratis para unirte a una nueva jornada.',
        'helloBarCtaTxt' => 'ÚNETE AHORA',
        'helloBarCtaLink' => '#registro',
    ],
    '/digital-trends-registrado' => [
        'helloBarText' => '🎫 ¡Quedan pocas! Consigue tu entrada VIP para sumarte a las actividades exclusivas',
        'helloBarCtaTxt' => 'HAZTE VIP',
        'helloBarCtaLink' => '#entradas',
    ],
    '/sponsors' => [
        'helloBarText' => '¡Queda más EMMS Digital Trends! ¿Aún no te has registrado? Súmate gratis para unirte a una nueva jornada.',
        'helloBarCtaTxt' => 'ÚNETE AHORA',
        'helloBarCtaLink' => '#registro',
    ],
    '/*' => [
        'helloBarText' => '¡Ya llegó el EMMS Digital Trends 2024! Únete a otra jornada con más Conferencias gratuitas, Workshops y Networking',
        'helloBarCtaTxt' => 'REGÍSTRATE GRATIS',
        'helloBarCtaLink' => '/digital-trends',
    ],
];

include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
$normalizedUrl = getNormalizeUrl();
$contentLive = $contentsLive[$normalizedUrl] ?? $contentsLive['/*'];
$contentDuring = $contentsDuring[$normalizedUrl] ?? $contentsDuring['/*'];





?>
<?php if ($digitalTrendsStates['isLive']) : ?>
    <div class="hidden--vip">
        <div class="emms__hellobar emms__hellobar--counter emms__hellobar--live">
            <div class="emms__hellobar__container emms__hellobar__container--during emms__fade-in">
                <p><strong><?= $contentLive['helloBarText'] ?></strong><a href="<?= $contentLive['helloBarCtaLink'] ?>"><?= $contentLive['helloBarCtaTxt'] ?></a></p>
            </div>
        </div>
    </div>
    <div class="show--vip">
        <div class="emms__hellobar emms__hellobar--counter emms__hellobar--live">
            <div class="emms__hellobar__container emms__hellobar__container--during emms__fade-in">
                <p><strong>⭐ ¡No te pierdas las actividades VIP! Encuentra los links en la agenda para unirte a las salas.</strong><a href="#agenda">MIRA LA AGENDA</a></p>
            </div>
        </div>
    </div>
<?php elseif ($digitalTrendsStates['isDuring']) : ?>
    <div class="hidden--vip">
        <div class="emms__hellobar emms__hellobar--counter emms__hellobar--live">
            <div class="emms__hellobar__container emms__hellobar__container--during emms__fade-in">
                <p><strong><?= $contentDuring['helloBarText'] ?></strong><a href="<?= $contentDuring['helloBarCtaLink'] ?>"><?= $contentDuring['helloBarCtaTxt'] ?></a></p>
            </div>
        </div>
    </div>
    <div class="show--vip">
        <div class="emms__hellobar emms__hellobar--counter emms__hellobar--live">
            <div class="emms__hellobar__container emms__hellobar__container--during emms__fade-in">
                <p><strong>⭐ ¡No te pierdas las actividades VIP! Encuentra los links en la agenda para unirte a los Workshops del EMMS Digital Trends.</strong><a href="#agenda">MIRA LA AGENDA</a></p>
            </div>
        </div>
    </div>
<?php endif; ?>

