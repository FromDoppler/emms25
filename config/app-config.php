<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/getCurrentEvent.php');

function detectRegistrationStatus(array $redirects): bool {
    $currentPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $pathKey = $currentPath === '' ? '' : $currentPath;
    return array_key_exists($pathKey, $redirects['unregistered']) ? true : false;
}

function getCurrentPhaseForEvent(string $freeEventId): string {
    $response = processPhaseToShow($freeEventId);
    return $response['phaseToShow'] ?? 'pre';
}

$currentEvent = getCurrentEvent();
$currentPhase = getCurrentPhaseForEvent($currentEvent['freeId']);
$isRegistered = detectRegistrationStatus($currentEvent['redirects']);
?>

<script>
  window.APP = {
    EVENTS: {
      CURRENT: <?= json_encode($currentEvent) ?>,
      EVENTCODES: {
        ECOMMERCE: "<?= ECOMMERCE ?>",
        ECOMMERCEVIP: "<?= ECOMMERCEVIP ?>",
        DIGITALTRENDS: "<?= DIGITALTRENDS ?>",
        DIGITALTRENDSVIP: "<?= DIGITALTRENDSVIP ?>"
      }
    },
    VERSION: "<?= VERSION ?>",
    LOCALE: "<?= $locale ?? 'es' ?>",
    URLS: {
      REFRESH: "<?= URL_REFRESH ?>",
      PATH_REFRESH: "<?= PATH_REFRESH ?>"
    }
  };


</script>

<script type="module">
  (async () => {
    try {
      // Carga socket.io dinámicamente
      const socketScript = document.createElement('script');
      socketScript.src = `/src/${window.APP.VERSION}/js/vendors/socket.io.min.js`;
      document.head.appendChild(socketScript);
      socketScript.onload = () => {
        const socket = io(`wss://${window.APP.URLS.REFRESH}`, {
          path: `/${window.APP.URLS.PATH_REFRESH}/socket.io`
        });
        socket.on("state", () => location.reload());
      };

      const { getUrlWithParams } = await import(`/src/${window.APP.VERSION}/js/common/index.js`);
      const { userRegisteredInEvent, checkEncodeUrl } = await import(`/src/${window.APP.VERSION}/js/user.js`);

      checkEncodeUrl();

      const currentEvent = window.APP.EVENTS.CURRENT;
      const isRegistered = userRegisteredInEvent(currentEvent.freeId);
      currentEvent.isUserRegistered = isRegistered;

      const currentPath = window.location.pathname.replace(/\/$/, ''); // Remove trailing slash
      const pathKey = currentPath.replace(/^\//, ''); // Remove leading slash for key lookup

      // Use redirects generated from PHP
      const redirectMap = isRegistered
        ? currentEvent.redirects.registered
        : currentEvent.redirects.unregistered;

      const target = redirectMap[pathKey];

      if (target !== undefined) {
        // Handle empty target (root redirect)
        const redirectUrl = target === '' ? '/' : '/' + target;
        window.location.href = getUrlWithParams(redirectUrl);
      }
    } catch (err) {
      console.error('Redirection error:', err);
    }
  })();
</script>
