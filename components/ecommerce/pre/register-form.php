<section class="emms__hero-registration digital--trends">
    <div class="emms__hero-registration__columns">

        <div class="emms__hero-registration__text emms__fade-in">
            <h1><em> REVIVE EL EVENTO GRATUITO</em><span class="top">EMMS</span>Ecommerce<span class="bottom">2025</span></h1>
            <p>Vuelve a vivir el evento más importante de Latam y España. ¡Inspírate y capacítate gratis con las últimas tendencias de Marketing Digital junto a los líderes de la industria!</p>
            <ul class="emms__hero-registration__text__checklist dk">
                <li>SPEAKERS INTERNACIONALES</li>
                <li>HERRAMIENTAS Y RECURSOS</li>
                <li>WORKSHOPS Y NETWORKING</li>
            </ul>
        </div>
        <!-- Form -->
        <?
        $formTitle = '';
        $formSubTitle = '';
        $eventType = ECOMMERCE;
        ?>
        <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/components/register-form-component.php'); ?>
        <!-- End form -->

        <div class="emms__hero-registration__text emms__fade-in mb">
            <ul class="emms__hero-registration__text__checklist">
                <li>SPEAKERS INTERNACIONALES</li>
                <li>HERRAMIENTAS Y RECURSOS</li>
                <li>WORKSHOPS Y NETWORKING</li>
            </ul>
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/marquee.php') ?>
</section>
