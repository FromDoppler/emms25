<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-card/helpers/index.php');

$button = $isRegistered
    ? getExposeButtonDataRegistered($speaker['exposes'])
    : getExposeButtonData($speaker['exposes']);
?>

<?php if ($button): ?>
    <div class="speaker-card__cta">
        <a class="speaker-card__button" href="<?= $button['href'] ?>">
            <?= $button['text'] ?>
        </a>
    </div>
<?php endif; ?>
