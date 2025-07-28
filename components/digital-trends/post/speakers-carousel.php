<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
$normalizedUrl = getNormalizeUrl();
function getBlock($url)
{
    $blocks = [
        '/' => [
            'block' => 'home',
        ],
        '/registrado' => [
            'block' => 'registerHome',
        ],
        '/digital-trends' => [
            'block' => 'digitalTrends',
        ],
        '/*' => [
            'block' => 'home',
        ],
    ];

    return $blocks[$url] ?? $blocks['/*'];
}
$block = getBlock($normalizedUrl);

?>
<section class="emms__speakers emms__bg-section-3">
    <div class="emms__container--lg">
        <h2 class="emms__fade-in">Algunos de los conferencistas que nos han acompañado en las últimas ediciones:</h2>
        <div class="emms__speakerslist emms__fade-in">
            <ul class="main-carousel" data-flickity='{ "initialIndex": ".is-initial-select", "wrapAround": "true" }'>
                <li class="emms__speakerslist__item">
                    <div class="emms__speakerslist__item__content">
                        <img src="/src/img/people--gradient/neil.png" alt="Neil Patel" class="emms__speakerslist__item__photo">
                        <p>Neil Patel <span>Co-Founder Neil Patel Digital</span></p>
                        <img src="/src/img/logos--white/logo-neil.png" alt="NP digital" class="emms__speakerslist__item__logo">
                    </div>
                </li>
                <li class="emms__speakerslist__item">
                    <div class="emms__speakerslist__item__content">
                        <img src="/src/img/people--gradient/tim-ash.png" alt="Tim Ash" class="emms__speakerslist__item__photo">
                        <p>Tim Ash <span>Founder</span></p>
                        <img src="/src/img/logos--white/logo-tim-ash.png" alt="Tim Ash" class="emms__speakerslist__item__logo">
                    </div>
                </li>
                <li class="emms__speakerslist__item is-initial-select">
                    <div class="emms__speakerslist__item__content">
                        <img src="/src/img/people--gradient/vedant-misra.png" alt="Vedant Misra " class="emms__speakerslist__item__photo">
                        <p>Vedant Misra  <span>Investigador de IA</span></p>
                        <img src="/src/img/logos--white/logo-vedant.png" alt="Vedant Misra " class="emms__speakerslist__item__logo">
                    </div>
                </li>
                <li class="emms__speakerslist__item">
                    <div class="emms__speakerslist__item__content">
                        <img src="/src/img/people--gradient/guillermo.png" alt="Guillermo Pujadas" class="emms__speakerslist__item__photo">
                        <p>Guillermo Pujadas <span>Client Manager en Meta</span></p>
                        <img src="/src/img/logos--white/logo-meta.png" alt="Meta" class="emms__speakerslist__item__logo">
                    </div>
                </li>
                <li class="emms__speakerslist__item">
                    <div class="emms__speakerslist__item__content">
                        <img src="/src/img/people--gradient/vilma.png" alt="Vilma Nuñez" class="emms__speakerslist__item__photo">
                        <p>Vilma Nuñez <span>Founder</span></p>
                        <img src="/src/img/logos--white/logo-vilma.png" alt="Vilma Nuñez" class="emms__speakerslist__item__logo">
                    </div>
                </li>
                <li class="emms__speakerslist__item">
                    <div class="emms__speakerslist__item__content">
                        <img src="/src/img/people--gradient/marcos.png" alt="Marcos Pueryrredón" class="emms__speakerslist__item__photo">
                        <p>Marcos Pueryrredón <span>Co-Founder & Global Executive SVP at VTEX</span></p>
                        <img src="/src/img/logos--white/logo-vtex.png" alt="Vtex" class="emms__speakerslist__item__logo">
                    </div>
                </li>
                <li class="emms__speakerslist__item">
                    <div class="emms__speakerslist__item__content">
                        <img src="/src/img/people--gradient/diana.png" alt="Diana Ramirez" class="emms__speakerslist__item__photo">
                        <p>Diana Ramirez<span>Head of Latam Spotify Advertising</span></p>
                        <img src="/src/img/logos--white/logo-spotify.png" alt="Spotify" class="emms__speakerslist__item__logo">
                    </div>
                </li>
            </ul>
        </div>
        <?php if ($block['block'] === 'home') : ?>
            <p class="emms__fade-in">Pronto conocerás a los Speakers del EMMS E-commerce 2025</p>
            <small class="emms__fade-in">
                Las marcas con más trayectoria en la industria y los especialistas más reconocidos están preparándose para ser parte
                del evento en que aprenderás las últimas tendencias y estrategias sobre el comercio electrónico. <br>
                Mantente pendiente a tu correo electrónico para descubrir quiénes nos acompañarán en la próxima
                edición y, mientras tanto, recuerda las mejores charlas de ediciones pasadas.
            </small>
            <a href="/ediciones-anteriores#ediciones-anteriores" class="emms__cta emms__fade-in">REVIVE EDICIONES ANTERIORES</a>
        <?php elseif ($block['block'] === 'registerHome') : ?>
            <p class="emms__fade-in">Pronto conocerás a los Speakers del EMMS E-commerce 2025</p>
            <small class="emms__fade-in">
                Las marcas que son tendencia en la industria y los especialistas más reconocidos están preparándose para ser parte del mayor evento hispano de Marketing Digital. <br>
                Mantente pendiente a tu correo electrónico para descubrir quiénes nos acompañarán en esta edición
            </small>
        <?php endif; ?>
    </div>
</section>
