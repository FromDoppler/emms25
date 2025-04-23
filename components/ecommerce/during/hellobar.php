<?php

$contents = [
    '/' => [
        'content' => '🚨EMMS E-commerce: ¡ya estamos en vivo! 🚨 Conferencias gratuitas, Workshops, Networking y, ¡mucho más!',
        'buttonText' => 'SÚMATE GRATIS',
        'buttonLink' => '/ecommerce#registro',
    ],
    '/registrado' => [
        'content' => '🎆 ¡Llegó el EMMS E-commerce! 🎆 Súmate al vivo ahora',
        'buttonText' => ' MIRA LA TRANSMISIÓN',
        'buttonLink' => '/ecommerce-registrado',
    ],
    '/ecommerce' => [
        'content' => '📢 ¡Ya estamos en vivo! 📢 ¿Todavía no te has registrado? Súmate gratis.',
        'buttonText' => 'ÚNETE AHORA',
        'buttonLink' => '#registro',
    ],
    '/ecommerce-registrado' => [
        'content' => '#preguntas-frecuentes',
        'buttonText' => '#preguntas-frecuentes',
        'buttonLink' => '#preguntas-frecuentes',
    ],
    '/*' => [
        'content' => '#preguntas-frecuentes',
        'buttonText' => '#preguntas-frecuentes',
        'buttonLink' => '#preguntas-frecuentes',
    ],
];

include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
$normalizedUrl = getNormalizeUrl();
$content = $contents[$normalizedUrl] ?? $contents['/*'];
?>


<div class="emms__hellobar emms__hellobar--counter">
    <div class="emms__hellobar__container emms__fade-in">
        <p><strong><?= $content['content'] ?></strong><a href="<?= $content['buttonLink'] ?>"><?= $content['buttonText'] ?></a></p>
    </div>
</div>
