<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
$normalizedUrl = getNormalizeUrl();

function getGridBlock($url)
{
    $blocks = [
        '/ecommerce' => [
            'block' => 'CtaBlock',
        ],
        '/ecommerce-registrado' => [
            'block' => 'TextBlock',
        ],
        '/*' => [
            'block' => 'CtaBlock',
        ],
    ];

    return $blocks[$url] ??  $blocks['/*'];
}

$block = getGridBlock($normalizedUrl);
?>
<section class="emms__grid emms__grid--3">
    <div class="emms__container--md">
        <div class="emms__grid__title emms__fade-in">
            <h2>Vive la experiencia completa en EMMS Digital Trends</h2>
        </div>
        <ul class="emms__grid__content emms__fade-in">
            <li class="emms__grid__item">
                <div class="emms__grid__item__image">
                    <img src="/src/img/conferencias.png" alt="Image">
                </div>
                <div class="emms__grid__item__text">
                    <h3>Conferencias</h3>
                    <p>Encuentra a tus máximos referentes internacionales compartiendo ideas y experiencias en un mismo lugar para descubrir las últimas tendencias en Marketing Digital.</p>
                </div>
            </li>
            <li class="emms__grid__item">
                <div class="emms__grid__item__image">
                    <img src="/src/img/entrevistas.png" alt="Image">
                </div>
                <div class="emms__grid__item__text">
                    <h3>Entrevistas</h3>
                    <p>Asiste a conversaciones con directivos y profesionales que marcan tendencia con sus negocios para escuchar sus mejores consejos, experiencias y proyecciones del mercado. </p>
                </div>
            </li>
            <li class="emms__grid__item">
                <div class="emms__grid__item__image">
                    <img src="/src/img/casos-de-exito.png" alt="Image">
                </div>
                <div class="emms__grid__item__text">
                    <h3>Casos de Éxito</h3>
                    <p>Descubre las estrategia que impulsaron el éxito de las compañías líderes del mundo, de la voz de sus representantes más destacados.</p>
                </div>
            </li>
            <li class="emms__grid__item">
                <div class="emms__grid__item__image">
                    <img src="/src/img/networking.png" alt="Image">
                </div>
                <div class="emms__grid__item__text">
                    <h3>Networking</h3>
                    <p>Únete a valiosas conversaciones con los exponentes del sector, conoce nuevos colegas y expande las redes de tu negocio para impulsar su crecimiento.</p>
                </div>
            </li>
            <li class="emms__grid__item">
                <div class="emms__grid__item__image">
                    <img src="/src/img/workshop.png" alt="Image">
                </div>
                <div class="emms__grid__item__text">
                    <h3>Workshops</h3>
                    <p>Capacítate en talleres prácticos de asistencia reducida con especialistas destacados en la industria. Interactúa y pon en práctica tus conocimientos.</p>
                </div>
            </li>
            <li class="emms__grid__item">
                <div class="emms__grid__item__image">
                    <img src="/src/img/recursos.png" alt="Image">
                </div>
                <div class="emms__grid__item__text">
                    <h3>Biblioteca de Recursos</h3>
                    <p>Encuentra E-books, infografías, cápsulas audiovisuales, guías, plantillas y muchos más contenidos descargables y gratuitos en la sección Biblioteca de Recursos.</p>
                </div>
            </li>
        </ul>
        <div class="grid__footer">
            <?php if ($block['block'] === 'CtaBlock') : ?>
                <a href="#registro" class="emms__cta emms__fade-in-animation eventHiddenElements">REGÍSTRATE GRATIS</a>
                <button class="emms__cta emms__fade-in-animation eventShowElements alreadyRegisterForm"><span class="button__text">Regístrate gratis</span></button>
            <?php elseif ($block['block'] === 'TextBlock') : ?>
                <p> <strong>Pronto podrás comprar tus entradas VIP para acceder a los Workshops y el Networking. ¡Mantente pendiente de tu casilla de Email!</strong></p>
            <?php endif; ?>
        </div>
        <div class="emms__separator emms__separator--white">
        </div>
    </div>
</section>
