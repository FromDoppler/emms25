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
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/doppler-academy-banner.php'); ?>
        <div class="hidden--vip">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/ecommerce/entry-plans.php') ?>
        </div>

        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/premium-content.php') ?>
        <!-- Academy Banner === show--vip, This class is not used to prevent interfering with flickity -->
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/sponsorsList.php') ?>
    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'); ?>
    <script src="src/<?= VERSION ?>/js/newDate.js" type="module"></script>

</body>

</html>
