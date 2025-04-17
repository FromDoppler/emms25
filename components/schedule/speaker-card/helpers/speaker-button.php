<?php

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


function getExposeButtonDataRegistered($exposes)
{
    $noButton = ['successStory', 'conference'];

    if (in_array($exposes, $noButton)) {
        return null;
    }

    $buttons = [
        'workshop' => [
            'text' => 'HAZTE VIP',
            'href' => '/checkout'
        ],
        'networking' => [
            'text' => 'HAZTE VIP',
            'href' => '/checkout'
        ]
    ];

    return $buttons[$exposes] ?? null;
}
