<?php

$contents = [
    '/' => [
        'heading' => 'EMMS DIGITAL TRENDS 2024',
        'DTCardButton' => 'REGÍSTRATE GRATIS',
    ],
    '/registrado' => [
        'heading' => 'EMMS Digital Trends 2024, ¡está llegando!',
        'DTCardButton' => 'INGRESA AHORA',
    ],
    '/*' => [
        'heading' => 'EMMS DIGITAL TRENDS 2024',
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
        <p>Revoluciona tu forma de hacer negocios y potencia tus resultados con el mayor evento de Latam y España. Disfruta de 2 ediciones exclusivas para capacitarte e inspirarte con los líderes de tu industria.
        </p>
    </div>
    <div id="eventos"></div>
    <!-- Event cards -->
    <div class="emms__eventCards">
        <div class="emms__container--lg">
            <ul class="emms__eventCards__list emms__eventCards__list--dk emms__fade-in">
                <li class="emms__eventCards__list__item">
                    <div class="emms__eventCards__list__item__picture">
                        <img src="/src/img/card-image-digitaltrends-pre.png" alt="Image Digital Trends">
                        <?php if ($digitalTrendsStates['isPost']) : ?>
                            <p class="top hide">EVENTO FINALIZADO</p>
                        <?php endif ?>
                    </div>
                    <div class="emms__eventCards__list__item__text">
                        <?php if ($digitalTrendsStates['isLive']) : ?>
                            <h3>EMMS Digital Trends <span>EN VIVO</span></h3>
                        <?php else : ?>
                            <h3>EMMS Digital Trends </h3>
                        <?php endif ?>
                        <p>Descubre las últimas innovaciones en Marketing Digital aplicadas por las empresas que marcan tendencia en la industria. Conferencias, Entrevistas, Casos de éxito, Workshops, Networking ¡y mucho más! Reserva tu lugar ahora.</p>
                        <span>ONLINE Y GRATUITO</span>
                        <div class="emms__eventCards__list__item__text--bottom">
                            <?php if ($digitalTrendsStates['isPre']) : ?>
                                <a class="emms__cta" href="/digital-trends"><?php echo ($content['DTCardButton']); ?></a>
                            <?php elseif ($digitalTrendsStates['isLive']) : ?>
                                <a href="/digital-trends" class="emms__cta">ACCEDE AL VIVO</a>
                            <?php elseif ($digitalTrendsStates['isDuring']) : ?>
                                <a href="/digital-trends" class="emms__cta">SÚMATE AHORA</a>
                            <?php elseif ($digitalTrendsStates['isPost']) : ?>
                                <a href="/digital-trends" class="emms__cta">REVIVE EL EVENTO</a>
                            <?php endif ?>
                        </div>
                    </div>
                </li>
                <li class="emms__eventCards__list__item">
                    <div class="emms__eventCards__list__item__picture">
                        <div class="ribbon__end">
                            EVENTO FINALIZADO
                        </div>
                        <img src="/src/img/card-image-ecommerce-new.png" alt="Ecommerce image">
                    </div>
                    <div class="emms__eventCards__list__item__text">
                        <h3>EMMS E-commerce </h3>
                        <p>Referentes internacionales de la industria te contarán qué tendencias y estrategias emplean en sus Tiendas Online para captar nuevos clientes y aumentar sus ingresos. Mientras esperas por el próximo EMMS, revive la última edición.</p>
                        <span>ONLINE Y GRATUITO</span>
                        <div class="emms__eventCards__list__item__text--bottom">
                            <a href="ecommerce" class="emms__cta emms_cta--secondary">REVÍVELO AHORA</a>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="emms__eventCards__list emms__eventCards__list--mb emms__fade-in main-carousel" data-flickity>
                <li class="emms__eventCards__list__item">
                    <div class="emms__eventCards__list__item__picture">
                        <img src="/src/img/card-image-digitaltrends-pre.png" alt="Image Digital Trends">
                        <?php if ($digitalTrendsStates['isPost']) : ?>
                            <p class="top hide">EVENTO FINALIZADO</p>
                        <?php endif ?>
                    </div>
                    <div class="emms__eventCards__list__item__text">
                        <?php if ($digitalTrendsStates['isLive']) : ?>
                            <h3>EMMS Digital Trends <span>EN VIVO</span></h3>
                        <?php else : ?>
                            <h3>EMMS Digital Trends </h3>
                        <?php endif ?>
                        <p>Descubre las últimas innovaciones en Marketing Digital aplicadas por las empresas que marcan tendencia en la industria. Conferencias, Entrevistas, Casos de éxito, Workshops, Networking ¡y mucho más! Reserva tu lugar ahora.</p>
                        <span>ONLINE Y GRATUITO</span>
                        <div class="emms__eventCards__list__item__text--bottom">
                            <?php if ($digitalTrendsStates['isPre']) : ?>
                                <a class="emms__cta" href="/digital-trends"><?php echo ($content['DTCardButton']); ?></a>
                            <?php elseif ($digitalTrendsStates['isLive']) : ?>
                                <a href="/digital-trends" class="emms__cta">ACCEDE AL VIVO</a>
                            <?php elseif ($digitalTrendsStates['isDuring']) : ?>
                                <a href="/digital-trends" class="emms__cta">SÚMATE AHORA</a>
                            <?php elseif ($digitalTrendsStates['isPost']) : ?>
                                <a href="/digital-trends" class="emms__cta">REVIVE EL EVENTO</a>
                            <?php endif ?>
                        </div>
                    </div>
                </li>
                <li class="emms__eventCards__list__item">
                    <div class="emms__eventCards__list__item__picture">
                        <div class="ribbon__end">
                            EVENTO FINALIZADO
                        </div>
                        <img src="/src/img/card-image-ecommerce-new.png" alt="Ecommerce image">
                    </div>
                    <div class="emms__eventCards__list__item__text">
                        <h3>EMMS E-commerce </h3>
                        <p>Referentes internacionales de la industria te contarán qué tendencias y estrategias emplean en sus Tiendas Online para captar nuevos clientes y aumentar sus ingresos. Mientras esperas por la siguiente edición, nútrete de nuevas ideas para implementar en tu negocio reviviendo la edición 2024.</p>
                        <span>ONLINE Y GRATUITO</span>
                        <div class="emms__eventCards__list__item__text--bottom">
                            <a href="ecommerce" class="emms__cta emms_cta--secondary">REVÍVELO AHORA</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    </div>
</section>
