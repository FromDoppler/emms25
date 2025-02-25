<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');
?>
<script src='/src/<?= VERSION ?>/js/vendors/socket.io.min.js?version=<?= VERSION ?>'></script>
<script>
  const socket = io("wss://<?= URL_REFRESH ?>", {
    path: "/<?= PATH_REFRESH ?>/socket.io"
  });
  socket.on("state", (args) => {
    location.reload();
  });
</script>
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
    if (userRegisteredInEvent(eventsType.ECOMMERCE)) {
        window.location.href = getUrlWithParams('/registrado');
    }
</script>
<?php
$response = processPhaseToShow(ECOMMERCE);
$isRegistred=0;
require_once($_SERVER['DOCUMENT_ROOT'] . "/pages/ecommerce/$response[phaseToShow]/home.php");
?>
