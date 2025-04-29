<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');
?>

<script type="module">
    import {
        getUrlWithParams
    } from '/src/<?= VERSION ?>/js/common/index.js';
    import {
        eventsType
    } from '/src/<?= VERSION ?>/js/enums/eventsType.enum.js';
    import {
        userRegisteredInEvent,
        checkEncodeUrl
    } from '/src/<?= VERSION ?>/js/user.js';
    checkEncodeUrl();
    if (!userRegisteredInEvent(eventsType.ECOMMERCE)) {
        window.location.href = getUrlWithParams('/ecommerce');
    }
</script>
<?php
$response = processPhaseToShow(ECOMMERCE);
require_once($_SERVER['DOCUMENT_ROOT'] . "/pages/ecommerce/$response[phaseToShow]/speaker-interna.php");
?>
