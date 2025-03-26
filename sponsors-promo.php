<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/cacheSettings.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/ecommerce/head.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/head.php'); ?>
</head>

<body class="emms__sponsor-promo">
    <?php if (PRODUCTION) include $_SERVER['DOCUMENT_ROOT'] . '/components/gtm.php'; ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/navbar-unreg.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/share.php') ?>
    <main>


        <!-- Hero -->
        <section class="emms__sponsor-promo__hero emms__bg-section-2">
            <div class="emms__container--lg emms__fade-top">
                <div class="emms__sponsor-promo__hero__content">
                    <span>CONVIÉRTETE EN SPONSOR</span>
                    <h1>Haz que tu marca sea protagonista del EMMS</h1>
                    <p>¿Te gustaría que tu negocio sea parte de los máximos eventos hispanohablantes de Marketing Digital e E-commerce? Ponte en contacto con nosotros y te contamos sobre cómo sumarte al EMMS.</p>
                    <button class="emms__cta" data-target="modalRegister" data-toggle="emms__register-modal" data-type="sponsor">CONTACTANOS AHORA</button>
                </div>
            </div>
        </section>
        <!-- Register modal -->
        <div id="modalRegister" class="emms__register-modal">
            <div class="emms__register-modal__window emms__register-modal--sponsor-promo">
                <!-- Form -->
                <form class="emms__form" id="sponsorsPromoForm" novalidate autocomplete="off">
                    <h3>Déjanos tus datos de contacto para ser parte del EMMS 2025 :)</h3>
                    <h4>En breve nuestro equipo te escribirá para conversar sobre la mejor forma de sumarte como <span id="sponsorType"></span> al EMMS</h4>
                    <ul class="emms__form__field-group">
                        <li class="emms__form__field-item">
                            <div class="holder">
                                <label class="required-label" for="name">Nombre *</label>
                                <input type="text" name="name" id="name" placeholder="Tu nombre" class="required error-name nameLength" autocomplete="off">
                            </div>
                        </li>
                        <li class="emms__form__field-item">
                            <div class="holder">
                                <label class="required-label" for="email">Email Empresarial*</label>
                                <input type="email" name="email" id="email" placeholder="ejemplo@miempresa.com" class="email required" autocomplete="off">
                            </div>
                        </li>
                        <li class="emms__form__field-item">
                            <div class="holder">
                                <label class="required-label" for="telefono">Teléfono</label>
                                <input type="tel" name="phone" id="phone" class="phone phone-number" autocomplete="off">
                            </div>
                        </li>
                        <li class="emms__form__field-item">
                            <div class="holder">
                                <label class="required-label" for="company">Empresa *</label>
                                <input type="text" name="company" id="company" placeholder="Nombre de tu empresa o negocio" class="email required" autocomplete="off">
                            </div>
                        </li>
                        <li class="emms__form__field-item">
                            <div class="holder">
                                <label class="required-label" for="jobPosition">Cargo *</label>
                                <select class="required" name="jobPosition" id="jobPosition" autocomplete="off">
                                    <option disabled selected value>Elige un cargo</option>
                                    <option value="CEO / Director General">CEO / Director General</option>
                                    <option value="CMO / Marketing Manager">CMO / Marketing Manager</option>
                                    <option value="Gerente de Ventas">Gerente de Ventas</option>
                                    <option value="E-commerce Manager">E-commerce Manager</option>
                                    <option value="Project Manager / Líder de equipo">Project Manager / Líder de equipo</option>
                                    <option value="Especialista / Consultor en Marketing">Especialista / Consultor en Marketing Digital</option>
                                    <option value="Asistente de Marketing / Comunicación / Ventas">Asistente de Marketing / Comunicación / Ventas</option>
                                    <option value="Ejecutivo/a de Cuentas">Ejecutivo/a de Cuentas</option>
                                    <option value="Redactor/a de contenidos / Copywriter">Redactor/a de contenidos / Copywriter</option>
                                    <option value="Diseñador/a">Diseñador/a</option>
                                    <option value="Pasante / interno / trainee">Pasante / interno / trainee</option>
                                    <option value="Estudiante">Estudiante</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                    <ul class="emms__form__field-group">
                        <li class="emms__form__field-item emms__form__field-item__checkbox">
                            <div class="holder">
                                <input name="privacy" type="checkbox" id="acepto-politicas" value="true" class="required check acept-politic"><span class="checkmark"></span><label for="acepto-politicas">
                                    Acepto la Pol&iacute;tica de Privacidad de Doppler *
                                </label>
                            </div>
                        </li>
                        <li class="emms__form__field-item emms__form__field-item__checkbox">
                            <div class="holder">
                                <input name="promotions" type="checkbox" id="acepto-promociones" value="true"><span class="checkmark"></span><label for="acepto-promociones">
                                    Acepto recibir promociones de Doppler</label>
                            </div>
                        </li>
                    </ul>
                    <div class="emms__form__btn">
                        <button class="emms__cta" id="register-button" type="submit"><span class="button__text"> HABLEMOS</span></button>
                    </div>
                    <div class="emms__form__legal close">
                        <a class="emms__form__legal__btn" id="legalBtn">Información básica sobre privacidad </a>
                        <p>Doppler te informa que los datos de car&aacute;cter personal que nos proporciones al rellenar el presente formulario ser&aacute;n tratados por Doppler LLC como responsable de esta Web.<br>
                            <strong>Finalidad: </strong>Gestionar el alta de registro a la capacitación, enviarte material vinculado a la misma e información sobre Doppler así como nuestros futuros eventos o capacitaciones.<br>
                            <strong>Legitimaci&oacute;n: </strong>Consentimiento del interesado. <br>
                            <strong>Destinatarios: </strong>Tus datos ser&aacute;n guardados por Doppler y los co-organizadores del evento, Unbounce como empresa de creaci&oacute;n de Landing Pages, DigitalOcean como empresa de hosting y Zapier como herramienta de integraci&oacute;n de apps.<br>
                            <strong>Informaci&oacute;n adicional: </strong>En la <a href="https://www.fromdoppler.com/es/legal/privacidad/" target="_blank" rel="noopener">Pol&iacute;tica de Privacidad</a> de Doppler encontrar&aacute;s informaci&oacute;n adicional
                            sobre la recopilaci&oacute;n y el uso de su informaci&oacute;n personal por parte de Doppler, incluida
                            informaci&oacute;n sobre acceso, conservaci&oacute;n, rectificaci&oacute;n, eliminaci&oacute;n, seguridad,
                            transferencias
                            transfronterizas y otros temas. <br>
                        </p>
                    </div>
                </form>
                <!-- End form -->
                <button class="emms__register-modal__window__close" data-dismiss="emms__register-modal"></button>
            </div>
            <div class="emms__register-modal__window emms__register-modal__window--success-message">
                <h5>¡Gracias por tu interés en ser parte del EMMS!</h5>
                <p>Pronto te estaremos contactando vía Email para enviarte
                    más información.</p>
                <button class="emms__register-modal__window__close" data-dismiss="emms__register-modal"></button>
            </div>
        </div>
        <!-- Resource -->
        <?php
        $benefits = [
            "Destaca tu marca en el evento líder de Marketing en LATAM y España",
            "Brinda una conferencia main stage en el evento",
            "Ten tu propia Landing Page en el sitio del evento y capta leads de calidad",
            "Llega con un envío exclusivo a toda la base de registrados al EMMS",
            "Únete a las marcas más influyentes de la industria y potencia tu networking"
        ];
        ?>

        <section class="emms__sponsor-promo__resource">
            <div class="emms__container--md emms__fade-in">
                <div class="emms__sponsor-promo__resource__picture">
                    <img src="/src/img/sponsor-promo.png" alt="Promoción para sponsors del evento">
                </div>
                <div class="emms__sponsor-promo__resource__text">
                    <h2>¿Por qué ser Sponsor?</h2>
                    <p>Súmate como Sponsor al EMMS y amplifica el impacto de tu marca en el mercado del Marketing Digital y E-commerce.</p>
                    <ul>
                        <?php foreach ($benefits as $benefit): ?>
                            <li>
                                <img src="/src/img/asset-estrella.png" alt="Ícono de beneficio">
                                <span><?= htmlspecialchars($benefit) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Sponsors list -->
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/companies-list.php') ?>

        <!-- Description -->

        <section class="emms__sponsor-promo__media-partner emms__bg-section-5 " id="conviertete-en-media-partner">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/marquee.php') ?>
            <?php
            $media_partner_benefits = [
                "Conferencia on-demand de 15 minutos en el sitio",
                "Logo de tu marca en el sitio web y menciones de tu negocio durante el EMMS",
                "Participación en un Email que se envía a todos los registrados",
                "Posibilidad de ofrecer beneficios a miles de potenciales clientes"
            ];
            ?>

            <div class="emms__container--md emms__fade-in">
                <div class="emms__sponsor-promo__media-partner__text">
                    <h2>¿Sin inversión este año?<br>¡Conviértete en Media Partner!</h2>
                    <p>Obtén visibilidad sin coste alguno, a cambio de compartir nuestro evento con tu audiencia. ¡Otra alternativa para multiplicar el impacto de tu marca!</p>
                    <p>¿Qué obtendrás como Media Partner?</p>
                    <ul>
                        <?php foreach ($media_partner_benefits as $benefit): ?>
                            <li>
                                <img src="/src/img/tick-success.png" alt="Beneficio asegurado">
                                <span><?= $benefit ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <button class="emms__cta" data-target="modalRegister" data-toggle="emms__register-modal" data-type="mediaPartner">
                        CONVIÉRTETE EN MEDIA PARTNER
                    </button>
                </div>
                <div class="emms__sponsor-promo__media-partner__picture">
                    <img src="/src/img/rompecabez-asset.png" alt="Ilustración de un rompecabezas">
                </div>
            </div>

        </section>



    </main>

    <!-- Footer -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'); ?>
    <script src="/src/<?= VERSION ?>/js/sponsorsPromo.js" type="module"></script>
    <script src="/src/<?= VERSION ?>/js/vendors/intlTelInput.min.js"></script>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/src/components/intellInput.php'); ?>

</body>

</html>
