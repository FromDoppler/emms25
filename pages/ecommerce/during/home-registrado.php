<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/cacheSettings.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/home/head.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/head.php'); ?>
</head>

<body class="emms__home">
    <?php if (PRODUCTION) include $_SERVER['DOCUMENT_ROOT'] . '/components/gtm.php'; ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/hellobar.php');   ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/hello-bar.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/navbar-reg.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/share.php') ?>
    <main>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/home/hello-module.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/event-numbers.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/speakers-carousel.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/premium-content.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/doppler-academy-banner.php'); ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/faqs.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/sponsorsList.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/faq-banner.php') ?>
    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'); ?>
</body>

</html>
