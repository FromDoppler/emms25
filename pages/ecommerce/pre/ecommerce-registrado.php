<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/cacheSettings.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/ecommerce/head.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/head.php'); ?>
    <script type="module">
        import {
            hiddenOrShowUserUI
        } from '/src/<?= VERSION ?>/js/user.js';
        import {
            toggleVipEcommerceElements
        } from '/src/<?= VERSION ?>/js/toggleVipElements.js';
        import {
            eventsType
        } from '/src/<?= VERSION ?>/js/enums/eventsType.enum.js';
        hiddenOrShowUserUI(eventsType.ECOMMERCE);
        toggleVipEcommerceElements()
    </script>
</head>

<body class="ecommerce ecommerce-logueado">
    <?php if (PRODUCTION) include $_SERVER['DOCUMENT_ROOT'] . '/components/gtm.php'; ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/navbar-reg.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/share.php') ?>
    <main>
        <div class="show--vip">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/ecommerce/hello-vip-module.php') ?>
        </div>
        <!-- No vip -->
        <div class="hidden--vip centralvideo--tickets">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/ecommerce/hello-module.php') ?>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/ecommerce/video-ticketing.php') ?>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/ecommerce/vip-features.php') ?>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/ecommerce/entry-plans.php') ?>
        </div>
        <!-- No vip -->


        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/schedule/schedule.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/benefit-icons.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/premium-content.php') ?>
        <div class="centralvideo--tickets">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/sponsorsList.php') ?>
        </div>
        <!-- Academy Banner === show--vip, This class is not used to prevent interfering with flickity -->
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/doppler-academy-banner.php'); ?>
    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'); ?>
</body>

</html>
