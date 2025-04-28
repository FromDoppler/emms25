<?php

$contents = [
    '/' => [
        'heading' => '¿Te lo perdiste? Aquí se congregaron los mayores
especialistas en Marketing Digital',
        'body' => 'Descubre por qué miles de profesionales y referentes en la industria eligieron el EMMS Digital Trends para capacitarse.
',
        'button' => 'REVÍVELO GRATIS',
        'link' => 'ecommerce#registro',
        'youtubeCode' => 'ZGS-lmiXHFE',
    ],
    '/ecommerce' => [
        'heading' => '¿Te lo perdiste? Aquí se congregaron los mayores
especialistas en Marketing Digital',
        'body' => 'Inspírate y capacítate con los mayores <br>
        especialistas en Marketing Digital. ¡Ya empezó!',
        'button' => 'REVÍVELO GRATIS',
        'link' => '#registro',
        'youtubeCode' => 'ZGS-lmiXHFE',
    ],
    '/registrado' => [
        'heading' => 'El EMMS, el clásico de cada año para inspirarte y enterarte de las últimas tendencias en Marketing Digital',
        'body' => 'Descubre por qué miles de profesionales y los mayores referentes de la industria esperan este evento para compartir y aprender de los más destacados speakers.',
        'youtubeCode' => 'isDPHOi2mAs',
    ],
    '/*' => [
        'heading' => '¿Te lo perdiste? Aquí se congregaron los mayores
especialistas en Marketing Digital',
        'body' => 'Descubre por qué miles de profesionales y referentes en la industria eligieron el EMMS Digital Trends para capacitarse.
',
        'button' => 'REVÍVELO GRATIS',
        'link' => 'ecommerce#registro',
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
