<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/cacheSettings.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/home/seo-unreg.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/head.php'); ?>
</head>

<body class="emms__home">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/gtm.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/hello-bar.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/navbar-unreg.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/share.php');
    ?>

    <main>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/home/hello-module.php');   ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/event-numbers.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/speakers-carousel.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/users-comments.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/faqs.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/companies-list.php') ?>

    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'); ?>

</body>

</html>
