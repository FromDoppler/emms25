<section class="hero-registration">
  <div class="hero-registration__columns">

    <div class="hero-registration__text emms__fade-in">
      <h1><em><small>EN VIVO</small> | ¡COMENZÓ LA TRANSMISIÓN!</em><span class="top">¡Súmate al </span> <span class="main">EMMS </span> <span class="bottom">Digital Trends!</span></h1>
      <p>Inspírate y aprende en un solo lugar todas las tendencias del Marketing Digital. <br>
      </p>
      <p>
        <strong class="text--highlighted">¡Estamos en vivo!</strong> Disfruta ahora de una nueva edición con Conferencias, Workshops, Entrevistas, sorteos, ¡y mucho más!
      </p>
      <ul class="hero-registration__text__checklist dk">
        <li>SPEAKERS INTERNACIONALES</li>
        <li>WORKSHOPS Y NETWORKING</li>
        <li>SORTEOS Y BENEFICIOS</li>
      </ul>
    </div>
    <!-- Form -->
    <?php
    $formTitle = '';
    $formSubTitle = '';
    $eventType = DIGITALTRENDS;
    ?>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/components/register-form-component.php'); ?>
    <!-- End form -->

    <div class="hero-registration__text emms__fade-in mb">
      <ul class="hero-registration__text__checklist">
        <li>SPEAKERS INTERNACIONALES</li>
        <li>WORKSHOPS PRÁCTICOS</li>
        <li>SORTEOS Y BENEFICIOS</li>
      </ul>
    </div>
  </div>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/marquee.php') ?>
</section>
