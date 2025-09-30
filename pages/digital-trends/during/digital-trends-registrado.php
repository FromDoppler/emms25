<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/cacheSettings.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/head.php'); ?>
  <script type="module">
    import {
      hiddenOrShowUserUI
    } from '/src/<?= VERSION ?>/js/user.js';
    hiddenOrShowUserUI(window.APP.EVENTS.CURRENT.freeId);
  </script>
  <script type="module">
    import {
      toggleVipDigitalTrendsElements
    } from '/src/<?= VERSION ?>/js/toggleVipElements.js';
    toggleVipDigitalTrendsElements();
  </script>
</head>

<body>
  <?php if (PRODUCTION) include $_SERVER['DOCUMENT_ROOT'] . '/components/gtm.php'; ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/digital-trends/during/hellobar-vip.php');   ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/navbar-reg.php') ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/share.php') ?>
  <main>
    <section class="emms__hero-conference emms__hero-conference--live emms__hero-conference--chat">
      <div class="emms__container--lg">
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/digital-trends/during/digital-trends/event-live.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/digital-trends/during/digital-trends/certificate/certificate.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/marquee.php') ?>
      </div>
    </section>
    <div class="show--vip">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/referral.php') ?>
    </div>
    <div class="emms__bg-dark-gradient">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/schedule.php') ?>
    </div>
    <div class="hidden--vip centralvideo--tickets">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/digital-trends/during/digital-trends/entry-plans.php') ?>
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/digital-trends/during/digital-trends/video-ticketing.php') ?>
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/digital-trends/during/digital-trends/vip-features.php') ?>
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/referral.php') ?>
    </div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/digital-trends/during/premium-content.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/sponsorsList.php') ?>
  </main>
  <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'); ?>
  <script src="src/<?= VERSION ?>/js/newDate.js" type="module"></script>

</body>

</html>
