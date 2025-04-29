<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-card/helpers/index.php');

$button = $isRegistered
    ? getExposeButtonDataRegistered($speaker)
    : getExposeButtonData($speaker);


$buttonClasses = 'speaker-card__button';
if (empty($speaker['yotube'])) {
    $buttonClasses .= ' speaker-card__button--inactive';
}
?>

<?php if ($button): ?>
    <div class="speaker-card__cta">
        <a class="<?= $buttonClasses ?>" href="<?= $button['href'] ?>">
            <?= $button['text'] ?>
        </a>
    </div>
<?php endif; ?>
