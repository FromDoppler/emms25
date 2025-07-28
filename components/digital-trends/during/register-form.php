<section class="emms__hero-registration digital--trends">
    <div class="emms__hero-registration__columns">

        <div class="emms__hero-registration__text emms__fade-in">
            <h1><em> <?php if ($digitalTrendsStates['isLive']) : ?>
                        <small>EN VIVO</small>
                    <?php elseif ($digitalTrendsStates['isTransition']) : ?>
                        <small>PREPÁRATE PARA OTRA JORNADA</small>
                    <?php endif ?>
                    - EVENTO ONLINE Y GRATUITO</em>¡Ya empezó el<span class="top">EMMS</span>Digital Trends<span class="bottom">2024</span></h1>
            <p>Inspírate y descubre todas las tendencias del Marketing Digital.</p>
            <ul class="emms__hero-registration__text__checklist dk">
                <li>SPEAKERS INTERNACIONALES</li>
                <li>HERRAMIENTAS Y RECURSOS</li>
                <li>WORKSHOPS Y NETWORKING</li>
            </ul>
        </div>
        <div class="emms__hero-registration__form emms__fade-in" id="registro">
            <!-- Form -->
            <div class="emms_switch__container">
                <span class="emms_switch__container__switch">
                    <input type="checkbox" name="swith" id="swith" checked>
                    <label for="switch"></label>
                </span>
            </div>
            <form class="emms__form emms__fade-in" novalidate autocomplete="off" id="digitalForm">
                <ul class="emms__form__field-group">
                    <li class="emms__form__field-item">
                        <div class="holder">
                            <label class="required-label" for="email">Email Empresarial *</label>
                            <input type="email" name="email" id="email" placeholder="&iexcl;No olvides usar @!" class="email required" autocomplete="off">
                        </div>
                    </li>
                    <li class="emms__form__field-item">
                        <div class="holder">
                            <label class="required-label" for="name">Nombre *</label>
                            <input type="text" name="name" id="name" placeholder="Tu nombre" class="required error-name nameLength" autocomplete="off">
                        </div>
                    </li>
                    <li class="emms__form__field-item">
                        <div class="holder">
                            <label class="required-label" for="telefono">WhatsApp *</label>
                            <input type="tel" name="phone" id="phone" class="phone phone-number required" autocomplete="off">
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
                    <button class="emms__cta emms__cta--during" id="register-button" type="button"><span class="button__text">ACCEDE AL VIVO</span></button>
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
            <form class="emms__form  emms__fade-in dp--none alreadyAccountForm" novalidate autocomplete="off" id="alreadyAccountForm">
                <h2>Ingresa tu email</h2>
                <ul class="emms__form__field-group">
                    <li class="emms__form__field-item">
                        <div class="holder">
                            <label class="required-label" for="email">Email Empresarial*</label>
                            <input type="email" name="email" id="email" placeholder="&iexcl;No olvides usar @!" class="email required" autocomplete="off">
                        </div>
                    </li>
                </ul>
                <div class="emms__form__btn">
                    <button class="emms__cta" id="register-button" type="submit"><span class="button__text">INGRESAR</span></button>
                </div>
            </form>
            <!-- End form -->
        </div>
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
<script src="/src/<?= VERSION ?>/js/homeDigital.js" type="module"></script>
<script src="/src/<?= VERSION ?>/js/vendors/intlTelInput.min.js"></script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/src/components/intellInput.php'); ?>
<script src="/src/<?= VERSION ?>/js/autoCompleteUserForm.js" type="module"></script>
