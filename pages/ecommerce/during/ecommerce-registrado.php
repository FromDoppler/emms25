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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/hellobar-vip.php');   ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/navbar-reg.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/share.php') ?>
    <main>
        <section class="emms__hero-conference emms__hero-conference--live emms__hero-conference--chat">
            <div class="emms__container--lg">
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/ecommerce/event-live.php') ?>
                <?php if (($settings_phase['event'] === ECOMMERCE) && ($settings_phase['during'] === 1) && ($settings_phase['transition'] !== "live-off")) : ?>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/ecommerce/certificate/certificate.php') ?>
                <?php endif ?>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/marquee.php') ?>
            </div>
        </section>
        <div class="emms__bg-dark-gradient">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/schedule.php') ?>
        </div>
        <div class="hidden--vip centralvideo--tickets">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/ecommerce/video-ticketing.php') ?>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/ecommerce/vip-features.php') ?>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/ecommerce/entry-plans.php') ?>
        </div>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/benefit-icons.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/premium-content.php') ?>
        <!-- Academy Banner === show--vip, This class is not used to prevent interfering with flickity -->
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/doppler-academy-banner.php'); ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/sponsorsList.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/faq-banner.php') ?>
    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'); ?>
    <script src="src/<?= VERSION ?>/js/newDate.js" type="module"></script>

</body>

</html>
