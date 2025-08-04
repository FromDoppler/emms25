<?php

# EVENT ROUTES CONFIGURATION

// Todas las páginas base compartidas por todos los eventos
$sharedPages = [
    'home' => [
        'unregistered' => ['url' => '/', 'page' => 'home.php'],
        'registered'   => ['url' => 'registrado', 'page' => 'home-registrado.php'],
    ],
    'sponsors' => [
        'unregistered' => ['url' => 'sponsors', 'page' => 'library-resources.php'],
        'registered'   => ['url' => 'sponsors-registrado', 'page' => 'library-resources.php'],
        'folder'       => 'sponsors',
    ],
    'checkout' => [
        'main' => [
            'url'  => 'checkout',
            'page' => 'checkout.php',
        ],
        'success' => [
            'url'  => 'checkout-success',
            'page' => 'checkout-success.php',
        ],
        'folder' => 'checkout',
    ],
    'speaker' => [
        'internal' => ['page' => 'speaker-interna.php'],
    ],
];

// Configuración específica por evento
$events = [
    'ECOMMERCE' => [
        'freeId' => 'ecommerce25',
        'vipId'  => 'ecommerce25-vip',
        'name'   => 'E-commerce',
        'folder' => 'ecommerce',
        'pages'  => [
            'unregistered' => ['url' => 'ecommerce', 'page' => 'ecommerce.php'],
            'registered'   => ['url' => 'ecommerce-registrado', 'page' => 'ecommerce-registrado.php'],
        ],
    ],
    'DIGITALTRENDS' => [
        'freeId' => 'digital-trends25',
        'vipId'  => 'digital-trends25-vip',
        'name'   => 'Digital Trends',
        'folder' => 'digital-trends',
        'pages'  => [
            'unregistered' => ['url' => 'digital-trends', 'page' => 'digital-trends.php'],
            'registered'   => ['url' => 'digital-trends-registrado', 'page' => 'digital-trends-registrado.php'],
        ],
    ],
];

// Helper para generar redirects basado en la nueva estructura
function getRedirectsForEvent($event, $sharedPages) {
    return [
        'registered' => [
            '' => 'registrado', // Home redirect for registered users
            'digital-trends' => $event['pages']['registered']['url'],
            'sponsors' => $sharedPages['sponsors']['registered']['url'],
        ],
        'unregistered' => [
            'registrado' => '', // Home redirect for unregistered users (root)
            'digital-trends-registrado' => $event['pages']['unregistered']['url'],
            'sponsors-registrado' => $sharedPages['sponsors']['unregistered']['url'],
            'checkout' => $event['pages']['unregistered']['url'],
            'checkout-success' => $event['pages']['unregistered']['url'],
            'speaker-interna' => $event['pages']['unregistered']['url'],
            'sponsors-interna' => $sharedPages['sponsors']['unregistered']['url'],
        ],
    ];
}

return [
    'sharedPages' => $sharedPages,
    'events' => $events,
    'getRedirectsForEvent' => 'getRedirectsForEvent'
];
