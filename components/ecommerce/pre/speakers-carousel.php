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
        '/ecommerce' => [
            'block' => 'ecommerce',
        ],
        '/*' => [
            'block' => 'home',
        ],
    ];

    return $blocks[$url] ?? $blocks['/*'];
}
$block = getBlock($normalizedUrl);

?>
<section class="speakers emms__bg-section-3">
    <div class="emms__container--lg">
        <?php if ($block['block'] === 'home') : ?>
            <h2 class="emms__fade-in">Algunos de los conferencistas que nos han acompañado en las últimas ediciones:</h2>
        <?php elseif ($block['block'] === 'registerHome') : ?>
            <h2 class="emms__fade-in">Algunos de los conferencistas que nos han acompañado en las últimas ediciones:</h2>
        <?php elseif ($block['block'] === 'ecommerce') : ?>
            <h2 class="emms__fade-in speakers__title">Speakers destacados en ediciones anteriores</h2>
            <P class="emms__fade-in speakers__sub-title">Aprende de referentes globales que han marcado la diferencia en empresas líderes como Google, Meta, Unilever y más.</P>
        <?php endif; ?>

        <div class="speakerslist emms__fade-in">
            <ul class="main-carousel" data-flickity='{ "initialIndex": ".is-initial-select", "wrapAround": "true" }'>
                <li class="speakerslist__item">
                    <div class="speakerslist__item__content">
                        <img src="/src/img/people--gradient/neil.png" alt="Neil Patel" class="speakerslist__item__photo">
                        <p>Neil Patel <span>Co-Founder Neil Patel Digital</span></p>
                        <img src="/src/img/logos--white/logo-neil.png" alt="NP digital" class="speakerslist__item__logo">
                    </div>
                </li>
                <li class="speakerslist__item">
                    <div class="speakerslist__item__content">
                        <img src="/src/img/people--gradient/tim-ash.png" alt="Tim Ash" class="speakerslist__item__photo">
                        <p>Tim Ash <span>Founder</span></p>
                        <img src="/src/img/logos--white/logo-tim-ash.png" alt="Tim Ash" class="speakerslist__item__logo">
                    </div>
                </li>
                <li class="speakerslist__item is-initial-select">
                    <div class="speakerslist__item__content">
                        <img src="/src/img/people--gradient/vedant-misra.png" alt="Vedant Misra " class="speakerslist__item__photo">
                        <p>Vedant Misra  <span>Investigador de IA</span></p>
                        <img src="/src/img/logos--white/logo-vedant.png" alt="Vedant Misra " class="speakerslist__item__logo">
                    </div>
                </li>
                <li class="speakerslist__item">
                    <div class="speakerslist__item__content">
                        <img src="/src/img/people--gradient/guillermo.png" alt="Guillermo Pujadas" class="speakerslist__item__photo">
                        <p>Guillermo Pujadas <span>Client Manager en Meta</span></p>
                        <img src="/src/img/logos--white/logo-meta.png" alt="Meta" class="speakerslist__item__logo">
                    </div>
                </li>
                <li class="speakerslist__item">
                    <div class="speakerslist__item__content">
                        <img src="/src/img/people--gradient/vilma.png" alt="Vilma Nuñez" class="speakerslist__item__photo">
                        <p>Vilma Nuñez <span>Founder</span></p>
                        <img src="/src/img/logos--white/logo-vilma.png" alt="Vilma Nuñez" class="speakerslist__item__logo">
                    </div>
                </li>
                <li class="speakerslist__item">
                    <div class="speakerslist__item__content">
                        <img src="/src/img/people--gradient/marcos.png" alt="Marcos Pueryrredón" class="speakerslist__item__photo">
                        <p>Marcos Pueryrredón <span>Co-Founder & Global Executive SVP at VTEX</span></p>
                        <img src="/src/img/logos--white/logo-vtex.png" alt="Vtex" class="speakerslist__item__logo">
                    </div>
                </li>
                <li class="speakerslist__item">
                    <div class="speakerslist__item__content">
                        <img src="/src/img/people--gradient/diana.png" alt="Diana Ramirez" class="speakerslist__item__photo">
                        <p>Diana Ramirez<span>Head of Latam Spotify Advertising</span></p>
                        <img src="/src/img/logos--white/logo-spotify.png" alt="Spotify" class="speakerslist__item__logo">
                    </div>
                </li>
            </ul>
        </div>
        <?php if ($block['block'] === 'home') : ?>
            <small class="emms__fade-in">Pronto conocerás a los Speakers del EMMS DIGITAL TRENDS 2024
                <br> Regístrate al evento para descubrir quiénes nos acompañarán en esta edición.
                <br> Mientras tanto, puedes revivir las mejores conferencias de años anteriores.
            </small>
            <a href="/ediciones-anteriores#ediciones-anteriores" class="emms__cta emms__fade-in">REVIVE EDICIONES ANTERIORES</a>
        <?php elseif ($block['block'] === 'registerHome') : ?>
            <p> <strong> ¡No te duermas! Pronto llega el EMMS Digital Trends 2024</strong></p>
            <p>Descubre muy pronto la agenda de Speakers, Workshops y todas las novedades de la nueva edición.</p>
        <?php elseif ($block['block'] === 'ecommerce') : ?>
            <small class="emms__fade-in">✨ ¡Pronto revelaremos los speakers 2025! Regístrate gratis y descúbrelos antes que nadie.
            </small>
            <a href="#registro" class="emms__cta emms__fade-in">REGÍSTRATE GRATIS</a>
        <?php endif; ?>

    </div>
</section>
