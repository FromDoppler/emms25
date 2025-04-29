<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-card/helpers/index.php');



$button = $isRegistered
    ? getExposeButtonDataRegistered($speaker)
    : getExposeButtonData($speaker);

$buttonClasses = 'speaker-card__button';
if (empty($speaker['youtube']) && $isRegistered) {
    $buttonClasses .= ' speaker-card__button--inactive';
    $text = 'VIDEO PRONTO DISPONIBLE';
} else {
    $text = ' ACCEDE AHORA';
}
?>
<?php if ($button): ?>
    <?php if ($isRegistered && $speaker['exposes'] === 'workshop'): ?>
        <div class="speaker-card__cta show--vip">
            <a class="speaker-card__button <?= $buttonClasses ?>" href="<?= $speaker['youtube'] ?>" target="_blank">
                <?= $text ?>
            </a>
        </div>
        <div class="speaker-card__cta hidden--vip">
            <a class="speaker-card__button " href="/checkout">
                HAZTE VIP
            </a>
        </div>
    <?php else: ?>
        <div class="speaker-card__cta">
            <a class="<?= $buttonClasses ?>" href="<?= $button['href'] ?>">
                <?= $button['text'] ?>
            </a>
        </div>
    <?php endif; ?>
<?php endif; ?>
