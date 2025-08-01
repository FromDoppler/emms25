<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/cacheSettings.php');

if (!isset($_GET['slug']) or (trim($_GET['slug']) === '')) {
    header('Location: ' . 'index');
    exit;
}

$db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$speakers = $db->getSpeakerBySlug($_GET['slug']);
$db->close();
if (empty($speakers)) {
    header("Location: /index.php");
    exit;
}
$speaker = $speakers[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/ecommerce/seo-reg.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/head.php'); ?>
</head>

<body class="emms__ecommerce emms__ecommerce-logueado emms__ecommerce-logueado--during">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/gtm.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/hello-bar.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/navbar-reg.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/share.php') ?>
    <main>
        <!-- Hero -->
        <section class="emms__hero-conference emms__hero-conference--bio">
            <div class="emms__container--lg">
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/speaker-interna/event-recorded.php') ?>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/during/ecommerce/certificate/certificate.php') ?>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/marquee.php') ?>
            </div>
        </section>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/post/speaker-interna/promo-vip.php') ?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/ecommerce/pre/premium-content.php') ?>
        <!-- Doppler Banner -->
        <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/components/academyBanner.php'); ?>

    </main>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'); ?>
</body>

</html>
