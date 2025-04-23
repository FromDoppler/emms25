<section class="hero-registration">
    <div class="hero-registration__columns">

        <div class="hero-registration__text emms__fade-in">
            <h1><em>EN VIVO | ¡COMENZÓ LA TRANSMISIÓN!</em><span >¡SÚMATE AL</span>
            <span class="top">EMMS</span>
            E-COMMERCE<span class="bottom">2025!</span></h1>
            <p>Domina el Marketing de tu Tienda Online. Capacítate con los mayores referentes del mundo. <a href="#registro">¡Estamos en vivo!</a>  Disfruta ahora
de una nueva edición con Conferencias, Workshops, sorteos y ¡mucho más!. </p>
        </div>
        <!-- Form -->
        <?php
        $formTitle = '';
        $formSubTitle = '';
        $eventType = ECOMMERCE;
        ?>
        <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/components/register-form-component.php'); ?>
        <!-- End form -->

        <div class="hero-registration__text emms__fade-in mb">
            <ul class="hero-registration__text__checklist">
                <li>SPEAKERS INTERNACIONALES</li>
                <li>WORKSHOPS Y NETWORKING</li>
                <li>REGALOS Y PREMIOS</li>
            </ul>
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/marquee.php') ?>
</section>
