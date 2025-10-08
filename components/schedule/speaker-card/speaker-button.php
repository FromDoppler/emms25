<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-card/helpers/index.php');
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);



$button = $isRegistered
  ? getExposeButtonDataRegistered($speaker)
  : getExposeButtonData($speaker);

$buttonClasses = 'speaker-card__button';


// Parche para ocultar el boton en la landing de checkout si no es VIP
if (shouldHideButton($speaker, $currentPath)) {
  $button = null;
}
?>
<?php if ($button): ?>
  <?php if ($isRegistered && $speaker['exposes'] === 'workshop'): ?>
    <!-- TODO: Ajustar este boton que cambia en during y post -->
    <div class="speaker-card__cta hidden--vip">
      <a class="speaker-card__button " href="#entradas">
        HAZTE VIP
      </a>
    </div>
  <?php else: ?>
    <div class="speaker-card__cta">
      <a class="<?= $buttonClasses ?>" href="<?= $button['href'] ?>">
        <?= $button['text'] ?> + <?= $currentPath ?>
      </a>
    </div>
  <?php endif; ?>
<?php endif; ?>
