<?php

$contents = [
    '/' => [
        'heading' => 'Capacítate e inspírate <br> con el EMMS Digital Trends',
        'subHeading' => 'Revoluciona tu forma de hacer negocios y potencia tus resultados con el mayor evento de Marketing Digital de Latam y España. Mientras esperas por la edición de E-commerce, revive el EMMS Digital Trends.',
        'DTCardButton' => 'REGÍSTRATE GRATIS',
    ],
    '/registrado' => [
        'heading' => 'Capacítate e inspírate <br> con el EMMS Digital Trends',
        'subHeading' => 'Revoluciona tu forma de hacer negocios y potencia tus resultados con el mayor evento de Marketing Digital de Latam y España. Mientras esperas por la edición de E-commerce, revive el EMMS Digital Trends.',
        'DTCardButton' => 'ÚNETE AL VIVO',
    ],
    '/*' => [
        'heading' => 'Capacítate e inspírate <br> con el EMMS Digital Trends',
        'subHeading' => 'Revoluciona tu forma de hacer negocios y potencia tus resultados con el mayor evento de Marketing Digital de Latam y España. Mientras esperas por la edición de E-commerce, revive el EMMS Digital Trends.',
        'DTCardButton' => 'REGÍSTRATE GRATIS',
    ],
];


include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
$normalizedUrl = getNormalizeUrl();
$content = $contents[$normalizedUrl] ?? $contents['/*'];
?>

<!-- Hero -->
<section class="emms__home__hero">
    <div class="emms__home__hero__title emms__fade-top">
        <h1><em>TODAS LAS TENDENCIAS EN MARKETING DIGITAL, EN UN SOLO LUGAR</em> <?php echo ($content['heading']); ?>
        </h1>
        <h2>ONLINE Y GRATUITO</h2>
        <p>
            <?php echo ($content['subHeading']); ?>
        </p>
    </div>
    <div id="eventos"></div>
    <!-- Event cards -->
    <div class="emms__eventCards">
        <div class="emms__container--lg">
            <ul class="emms__eventCards__list emms__eventCards__list--dk emms__fade-in">
                <li class="emms__eventCards__list__item">
                    <div class="emms__eventCards__list__item__picture">
                        <img src="/src/img/card-image-digitaltrends-post.png" alt="Image Digital Trends">
                    </div>
                    <div class="emms__eventCards__list__item__text">
                        <h3>EMMS Digital Trends </h3>
                        <p>Speakers internacionales líderes en Marketing Digital compartieron tendencias, estrategias y herramientas, que aplican las empresas más destacadas en la industria. ¡Descúbrelas! Revive gratis todas las conferencias de <a href="/digital-trends" class="emms__purple-common-anchor">la edición anterior.</a></p>
                        <div class="emms__eventCards__list__item__text--bottom">
                            <a href="/digital-trends" class="emms__cta">REVIVE EL EVENTO</a>
                        </div>
                    </div>
                </li>
                <li class="emms__eventCards__list__item">
                    <div class="emms__eventCards__list__item__picture">
                        <div class="ribbon__end ribbon--short">
                            MUY PRONTO
                        </div>
                        <img src="/src/img/card-image-ecommerce-new.png" alt="Ecommerce image">
                    </div>
                    <div class="emms__eventCards__list__item__text">
                        <h3>EMMS E-commerce </h3>
                        <p>Referentes internacionales de la industria te contarán cuáles son las <strong>tendencias y estrategias que emplean en sus Tiendas Online</strong> para captar nuevos clientes y aumentar sus ingresos.</p>
                        <div class="emms__eventCards__list__item__text--bottom">
                            <a href="ecommerce" class="emms__cta inactive">PRÓXIMAMENTE</a>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="emms__eventCards__list emms__eventCards__list--mb emms__fade-in main-carousel" data-flickity>
                <li class="emms__eventCards__list__item">
                    <div class="emms__eventCards__list__item__picture">
                        <img src="/src/img/card-image-digitaltrends-post.png" alt="Image Digital Trends">
                    </div>
                    <div class="emms__eventCards__list__item__text">
                        <h3>EMMS Digital Trends </h3>
                        <p>Speakers internacionales líderes en Marketing Digital compartieron tendencias, estrategias y herramientas, que aplican las empresas más destacadas en la industria. ¡Descúbrelas! Revive gratis todas las conferencias de <a href="/digital-trends" class="emms__purple-common-anchor">la edición anterior.</a></p>
                        <div class="emms__eventCards__list__item__text--bottom">
                            <a href="/digital-trends" class="emms__cta">REVIVE EL EVENTO</a>
                        </div>
                    </div>
                </li>
                <li class="emms__eventCards__list__item">
                    <div class="emms__eventCards__list__item__picture">
                        <div class="ribbon__end ribbon--short">
                            MUY PRONTO
                        </div>
                        <img src="/src/img/card-image-ecommerce-new.png" alt="Ecommerce image">
                    </div>
                    <div class="emms__eventCards__list__item__text">
                        <h3>EMMS E-commerce </h3>
                        <p>Referentes internacionales de la industria te contarán cuáles son las <strong>tendencias y estrategias que emplean en sus Tiendas Online</strong> para captar nuevos clientes y aumentar sus ingresos.</p>
                        <div class="emms__eventCards__list__item__text--bottom">
                            <a href="ecommerce" class="emms__cta inactive">PRÓXIMAMENTE</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    </div>
</section>
