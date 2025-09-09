<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-grid-helper.php');

$normalizedUrl = getNormalizeUrl();
function getScheduleBlock2($url)
{
  $blocks = [
    '/digital-trends' => [
      'block' => 'digital-trends',
    ],
    '/digital-trends-registrado' => [
      'block' => 'digital-trends-registrado',
    ],
    '/*' => [
      'block' => 'digital-trend',
    ],
  ];

  return $blocks[$url] ?? $blocks['/*'];
}
$block = getScheduleBlock2($normalizedUrl);
?>

<section class="emms__calendar" id="agenda">
  <div class="emms__container--lg">
    <div class="emms__calendar__title emms__fade-in">
      <h2>AGENDA EMMS DIGITAL TRENDS 2025</h2>

      <?php if ($block['block'] === 'digital-trends') : ?>
        <p>
          Conoce a las figuras internacionales que ya confirmaron su presencia en el evento de Marketing Digital más esperado del año. ¡Y prepárate! Porque muy pronto anunciaremos el resto de la agenda.
        </p>
      <?php elseif ($block['block'] === 'digital-trends-registrado') : ?>
        <p class="hidden--vip">
          Conoce a las figuras internacionales que ya confirmaron su presencia en el evento de Marketing Digital más esperado del año. ¡Y prepárate! Porque muy pronto anunciaremos el resto de la agenda.
        </p>
        <p class="show--vip">
          Conoce a las figuras internacionales que ya confirmaron su presencia en el evento de Marketing Digital más esperado del año. ¡Y prepárate! Porque muy pronto anunciaremos el resto de la agenda.
        </p>
      <?php endif; ?>
    </div>

    <?php
    //TODO: Abstraer ecommerceStates a un getter que pase el state del currentEvent para volver agnostica la genda de eventos
    render_speaker_grid($digitalTrendsStates, $isRegistered); ?>
    <?php if ($block['block'] === 'digital-trends') : ?>
      <div class="emms__calendar__bottom emms__fade-in  eventHiddenElements">
        <a href="#registro" class="emms__cta">SÚMATE AHORA</a>
      </div>
      <div class="emms__calendar__bottom  eventShowElements">
        <a href="#registro" class="emms__cta alreadyRegisterForm"><span class="button__text">SÚMATE GRATIS</span></a>
      </div>
    <?php endif; ?>
  </div>
</section>
