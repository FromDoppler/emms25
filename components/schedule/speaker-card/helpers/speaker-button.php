<?php
define('REGISTERFORM_URL', '#registro');
define('CHECKOUT_URL', '/checkout');

function getExposeButtonData($speaker)
{
  $exposes = $speaker['exposes'];
  $buttons = [
    'conference' => [
      'text' => 'REGÍSTRATE GRATIS',
      'href' => REGISTERFORM_URL
    ],
    'workshop' => [
      'text' => 'REGÍSTRATE Y HAZTE VIP',
      'href' => REGISTERFORM_URL
    ],
    'networking' => [
      'text' => 'REGÍSTRATE Y HAZTE VIP',
      'href' => REGISTERFORM_URL
    ],
    'successStory' => [
      'text' => 'REGÍSTRATE GRATIS',
      'href' => REGISTERFORM_URL
    ]
  ];

  return $buttons[$exposes] ?? [
    'text' => 'REGÍSTRATE GRATIS',
    'href' => REGISTERFORM_URL
  ];
}


function getExposeButtonDataRegistered($speaker, $eventFase = 'pre')
{
  // TODO: Ajustar contenidos de los botones según la fase del evento
  $exposes = $speaker['exposes'];

  // si es PRE y NO es workshop va sin boton
  if ($eventFase === 'pre' && $exposes !== 'workshop') {
    return null;
  }


  $buttons = [
    'conference' => [
      'pre' => [
        'text' => 'PRÓXIMAMENTE',
        'href' => '#'
      ],
      'live' => [
        'text' => 'ACCEDE AHORA',
        'href' => 'speaker-interna?slug=' . $speaker['slug']
      ],
      'post' => [
        'text' => empty($speaker['youtube'])
          ? 'VIDEO PRONTO DISPONIBLE'
          : 'VER GRABACIÓN',
        'href' => $speaker['youtube'] ?? '#'
      ]
    ],
    'workshop' => [
      'pre' => [
        'text' => 'REGÍSTRATE Y HAZTE VIP',
        'href' => $speaker['youtube'] ?? '#'
      ],
      'live' => [
        'text' => 'ACCEDE AL WORKSHOP',
        'href' => $speaker['youtube'] ?? '#'
      ],
      'post' => [
        'text' => 'VER',
        'href' => $speaker['youtube'] ?? '#'
      ]
    ],
    'successStory' => [
      'pre' => [
        'text' => 'PRÓXIMAMENTE',
        'href' => '#'
      ],
      'live' => [
        'text' => 'ACCEDE AHORA',
        'href' => 'speaker-interna?slug=' . $speaker['slug']
      ],
      'post' => [
        'text' => 'VER HISTORIA',
        'href' => $speaker['youtube'] ?? '#'
      ]
    ],
  ];

  return $buttons[$exposes][$eventFase] ?? null;
}
