<?php
define('REGISTERFORM_URL', '#registro');
define('CHECKOUT_URL', '/checkout');

function getExposeButtonData($speaker)
{
    $exposes = $speaker['exposes'];
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


function getExposeButtonDataRegistered($speaker)
{
    $exposes = $speaker['exposes'];


    if (empty($speaker['youtube']) && $exposes !== 'workshop') {
        return [
            'text' => 'VIDEO PRONTO DISPONIBLE',
            'href' => '#',
        ];
    }

    $buttons = [
        'conference' => [
            'text' => 'ACCEDE AHORA',
            'href' => 'speaker-interna?slug=' . $speaker['slug']
        ],
        'workshop' => [
            'text' => 'REGISTRATE Y HAZTE VIP',
            'href' => $speaker['youtube']
        ],
        'successStory' => [
            'text' => 'ACCEDE AHORA',
            'href' => 'speaker-interna?slug=' . $speaker['slug']
        ]
    ];

    return $buttons[$exposes] ?? null;
}
