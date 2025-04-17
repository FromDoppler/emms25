<?php


function render_speaker_card($speaker, $isRegistered, $isMobile)
{
    include __DIR__ . '/speaker-card.php';
}

// Button
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
// End Button

// Info
function translateExposes($exposes)
{
    $mapa = [
        'conference'    => 'Conferencia',
        'workshop'      => 'workshop',
        'networking'    => 'NETWORKING',
        'successStory'  => 'CASO DE EXITO'
    ];

    return $mapa[$exposes] ?? $exposes;
}
// End Info


//Ribbon
function isSpeakerWithRibbon($speaker)
{
    $speakersTypeWithRibbon = ['workshop', 'networking'];
    return in_array($speaker['exposes'], $speakersTypeWithRibbon);
}
// End Ribbon
