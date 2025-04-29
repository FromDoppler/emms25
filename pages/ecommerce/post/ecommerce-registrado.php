<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/cacheSettings.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/ecommerce/seo-reg.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/head.php'); ?>
    <script type="module">
        import {
            hiddenOrShowUserUI
        } from '/src/<?= VERSION ?>/js/user.js';
        hiddenOrShowUserUI('digital-trends24');
    </script>
    <script type="module">
        import {
            toggleVipDigitalTrendsElements
        } from '/src/<?= VERSION ?>/js/toggleVipElements.js';

        toggleVipDigitalTrendsElements();
    </script>
</head>

<body class="emms__ecommerce emms__ecommerce-logueado">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/gtm.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/hello-bar.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/navbar-reg.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/share.php') ?>
    <main>
        <div class="hidden--vip ">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/ecommerce/hello-module.php') ?>
        </div>
        <div class="show--vip">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/ecommerce/hello-vip-module.php') ?>
        </div>
        <div class="emms__bg-dark-gradient">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/schedule.php') ?>
        </div>
        <div class="hidden--vip">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/ecommerce/vip-features.php') ?>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/ecommerce/video-ticketing.php') ?>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/ecommerce/entry-plans.php') ?>
        </div>

        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/benefit-icons.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/premium-content.php') ?>
        <!-- Academy Banner === show--vip, This class is not used to prevent interfering with flickity -->
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/sponsorsList.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/doppler-academy-banner.php'); ?>
    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'); ?>
    <script src="src/<?= VERSION ?>/js/newDate.js" type="module"></script>

</body>

</html>
