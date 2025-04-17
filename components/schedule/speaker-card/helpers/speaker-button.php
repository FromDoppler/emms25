<?php
define('REGISTERFORM_URL', '#registro');
define('CHECKOUT_URL', '/checkout');

function getExposeButtonData($exposes)
{
    $buttons = [
        'conference' => [
            'text' => 'REGISTRATE GRATIS',
            'href' => REGISTERFORM_URL
        ],
        'workshop' => [
            'text' => 'REGISTRATE Y HAZTE VIP',
            'href' => REGISTERFORM_URL
        ],
        'networking' => [
            'text' => 'REGISTRATE Y HAZTE VIP',
            'href' => REGISTERFORM_URL
        ],
        'successStory' => [
            'text' => 'REGISTRATE GRATIS',
            'href' => REGISTERFORM_URL
        ]
    ];

    return $buttons[$exposes] ?? [
        'text' => 'REGISTRATE GRATIS',
        'href' => REGISTERFORM_URL
    ];
}


function getExposeButtonDataRegistered($exposes)
{
    $noButton = ['successStory', 'conference'];

    if (in_array($exposes, $noButton)) {
        return null;
    }

    $buttons = [
        'workshop' => [
            'text' => 'HAZTE VIP',
            'href' => CHECKOUT_URL
        ],
        'networking' => [
            'text' => 'HAZTE VIP',
            'href' => CHECKOUT_URL
        ]
    ];

    return $buttons[$exposes] ?? null;
}
