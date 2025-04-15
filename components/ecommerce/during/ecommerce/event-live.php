<?php if (($settings_phase_DT['event'] === ECOMMERCE) && ($settings_phase_DT['during'] === 1) && ($settings_phase_DT['transition'] === "live-on") && ($settings_phase_DT['transmission'] === "youtube")) : ?>
    <p class="live-advice">EN VIVO </p>
    <h1 class="emms__fade-in">Estamos en vivo en el #EMMSBYDOPPLER</h1>
    <div class="emms__hero-conference__video emms__fade-in">
        <div class="emms__cropper-cont-16-9">
            <div class="emms__cropper-cont ">
                <div class="emms__cropper-cont-interno">
                    <iframe src="https://www.youtube.com/embed/<?= $duringDaysArray[$dayDuring]['youtube'] ?>?rel=0&autoplay=1&mute=1&enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="emms__hero-conference__aside emms__fade-in emms__hero-conference__video--chat">
        <iframe src="https://www.youtube.com/live_chat?v=<?= $duringDaysArray[$dayDuring]['youtube'] ?>&embed_domain=<?= $_SERVER['HTTP_HOST'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
<?php elseif (($settings_phase_DT['event'] === ECOMMERCE) && ($settings_phase_DT['during'] === 1) && ($settings_phase_DT['transition'] === "live-on") && ($settings_phase_DT['transmission'] === "twitch")) : ?>
    <h1 class="emms__fade-in">Estamos en vivo en el #EMMSBYDOPPLER</h1>
    <div class="emms__hero-conference__video emms__fade-in">
        <div class="emms__cropper-cont-16-9">
            <div class="emms__cropper-cont ">
                <div class="emms__cropper-cont-interno">
                    <iframe src="https://player.twitch.tv/?channel=<?= $duringDaysArray[$dayDuring]['twitch'] ?>&parent=<?= $_SERVER['HTTP_HOST'] ?>"></iframe>
                </div>
            </div>
        </div>
    </div>
<?php elseif (($settings_phase_DT['event'] === ECOMMERCE) && ($settings_phase_DT['during'] === 1) && ($settings_phase_DT['transition'] === "live-on") && ($settings_phase_DT['transmission'] === "twitch-migrate")) : ?>
    <img src="src/img/placas/migrate-twitch.png" alt="Se migró a Twitch" class="banner">
<?php elseif (($settings_phase_DT['event'] === ECOMMERCE) && ($settings_phase_DT['during'] === 1) && ($settings_phase_DT['transition'] === "live-on") && ($settings_phase_DT['transmission'] === "technical-problems")) : ?>
    <img src="src/img/placas/technical-error.png" alt="Errores técnicos" class="banner">
<?php elseif (($settings_phase_DT['event'] === ECOMMERCE) && ($settings_phase_DT['during'] === 1) && ($settings_phase_DT['transition'] === "live-off")) : ?>
    <h2>PREPÁRATE PARA EL DÍA <?= $dayDuring + 1 ?></h2>
    <h1 class="emms__fade-in">¡Pronto seguimos con más EMMS Digital Trends!</h1>
    <div class="emms__hero-conference__video emms__hero-conference__video--transition emms__fade-in">
        <img src="src/img/placas/transition-<?= $dayDuring ?>.png" alt="Preparate para el día <?= $dayDuring + 1 ?>!">
    </div>
    <div class="emms__hero-conference__aside emms__hero-conference__aside--transition emms__fade-in hidden--vip">
        <p>Recuerda que puedes adquirir <a href="#entradas">por
                sólo 9<small class="small-number">99</small> USD tu Entrada VIP</a> para acceder a todos los Workshops y a
            sus grabaciones, una vez finalizado
            el evento.
        </p>
        <a class="emms__cta" href="#entradas">HAZTE VIP</a>
    </div>
    <div class="emms__hero-conference__aside emms__hero-conference__aside--transition emms__fade-in show--vip">
        <p>Si ya tienes tu Entrada VIP, aquí tienes los enlaces para acceder a los Workshops de hoy, a partir de las 15hs Arg. <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=Workshops+EMMS+Digital+Trends+2024&iso=20241127T15&p1=51&ah=1&am=30" target="_blank">Mira la hora en tu país</a></p>
        <ul>
            <li>
                Cómo aprovechar herramientas de IA en tu Estrategia de Contenido.<a href="https://us06web.zoom.us/j/88244335008?pwd=4jr0iVgX7L3SL0Hs9RbtTzs2b7w9z3.1#success" target="_blank"> Accede aquí.</a>
            </li>
            <li>
                El método definitivo para escalar anuncios después de 1,3 millones invertidos. <a href="https://us06web.zoom.us/j/88989681901#success" target="_blank"> Accede aquí.</a>
            </li>
        </ul>
    </div>
<?php endif; ?>
