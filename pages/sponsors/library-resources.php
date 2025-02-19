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
            isUserLogged,
            getUrlWithParams
        } from '/src/<?= VERSION ?>/js/common/index.js';

        if (isUserLogged()) {
            window.location.href = getUrlWithParams('/sponsors-registrado');
        }
    </script>
</head>

<body class="emms__ecommerce">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/gtm.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/date-counter.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/navbar-unreg.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/share.php') ?>
    <main>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/sponsors/libraryResources/hero.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/sponsors/libraryResources/sponsorsList.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/sponsors/libraryResources/conferences.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/sponsors/libraryResources/registerModal.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/academyBanner.php') ?>
    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/sponsorsList.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'); ?>
</body>

</html>
