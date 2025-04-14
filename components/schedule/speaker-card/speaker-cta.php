<?php
if (!function_exists('getExposeButtonData')) {
    function getExposeButtonData($exposes)
    {
        $buttons = [
            'conference' => [
                'text' => 'REGISTRATE GRATIS',
                'href' => '#registro'
            ],
            'workshop' => [
                'text' => 'REGISTRATE Y HAZTE VIP',
                'href' => '#registro'
            ],
            'networking' => [
                'text' => 'REGISTRATE Y HAZTE VIP',
                'href' => '#registro'
            ],
            'successStory' => [
                'text' => 'REGISTRATE GRATIS',
                'href' => '#registro'
            ]
        ];

        return $buttons[$exposes] ?? [
            'text' => 'REGISTRATE GRATIS',
            'href' => '#registro'
        ];
    }
}

if (!function_exists('getExposeButtonDataRegistered')) {
    function getExposeButtonDataRegistered($exposes)
    {
        $noButton = ['successStory', 'conference'];

        if (in_array($exposes, $noButton)) {
            return null;
        }

        $buttons = [
            'workshop' => [
                'text' => 'HAZTE VIP',
                'href' => '#workshop'
            ],
            'networking' => [
                'text' => 'HAZTE VIP',
                'href' => '#networking'
            ]
        ];

        return $buttons[$exposes] ?? null;

    }

}
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
