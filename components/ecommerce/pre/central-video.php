<?php

$contents = [
    '/' => [
        'heading' => 'Súmate al EMMS Digital Trends 2024 y entérate las últimas innovaciones en Marketing Digital',
        'body' => 'Descubre en este video por qué miles de profesionales y referentes en la industria eligen este evento para capacitarse.',
        'button' => 'RESERVA TU CUPO GRATIS',
        'link' => 'digital-trends#registro',
        'youtubeCode' => 'ZGS-lmiXHFE',
    ],
    '/digital-trends' => [
        'heading' => 'Inspírate con el mayor evento hispano de Marketing Digital',
        'body' => 'Conoce en este video qué hace al EMMS Digital Trends el lugar ideal para capacitarte
y aprender cómo hacer crecer tu negocio junto a los líderes del sector.',
        'button' => 'REGÍSTRATE AHORA',
        'link' => '#registro',
        'youtubeCode' => 'ZGS-lmiXHFE',
    ],
    '/digital-trends-registrado' => [
        'heading' => '¡Gracias por sumarte al EMMS Digital Trends 2024!',
        'body' => 'Comenzó la cuenta regresiva para que descubras las últimas innovaciones en Marketing Digital',
        'youtubeCode' => 'isDPHOi2mAs',
    ],
    '/*' => [
        'heading' => 'Súmate al EMMS Digital Trends 2024 y entérate las últimas innovaciones en Marketing Digital',
        'body' => 'Descubre en este video por qué miles de profesionales y referentes en la industria eligen este evento para capacitarse.',
        'button' => 'RESERVA TU CUPO GRATIS',
        'link' => 'digital-trends#registro',
        'youtubeCode' => 'ZGS-lmiXHFE',
    ],
];

include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
$normalizedUrl = getNormalizeUrl();
$content = $contents[$normalizedUrl] ?? $contents['/*'];

$youtubeBaseUrl = "https://www.youtube.com/embed/";
$youtubeParams = "?controls=0&modestbranding=1&rel=0&fs=0&disablekb=1&autoplay=1&loop=1";
$videoUrl = $youtubeBaseUrl . $content['youtubeCode'] . $youtubeParams;

?>

<section class="emms__centralvideo">
    <div class="emms__container--lg emms__container--lg--column">
        <?php if (!empty($content['heading']) || !empty($content['body'])): ?>
            <div class="emms__centralvideo__title emms__fade-in">
                <?php if (!empty($content['heading'])): ?>
                    <h2><?php echo $content['heading']; ?></h2>
                <?php endif; ?>
                <?php if (!empty($content['body'])): ?>
                    <p><?php echo $content['body']; ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="emms__centralvideo__video emms__fade-in">
            <iframe width="560" height="315" src="<?php echo $videoUrl ?>" frameborder="0" allowfullscreen></iframe>
        </div>

        <?php if (!empty($content['link']) || !empty($content['button'])): ?>
            <a href="<?php echo $content['link']; ?>" class="emms__cta">
                <?php echo !empty($content['button']) ? $content['button'] : ''; ?>
            </a>
        <?php endif; ?>
    </div>
</section>
