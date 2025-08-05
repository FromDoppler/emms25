<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
$normalizedUrl = getNormalizeUrl();

function getGridBlock2($url)
{
  $blocks = [
    '/digital-trends' => ['block' => 'CtaBlock'],
    '/digital-trends-registrado' => ['block' => 'TextBlock'],
    '/*' => ['block' => 'CtaBlock'],
  ];

  return $blocks[$url] ?? $blocks['/*'];
}

$block = getGridBlock2($normalizedUrl);

$gridItems = [
  [
    'image' => '/src/img/grid-event-types/ia.png',
    'title' => 'Inteligencia Artificial',
    'description' => 'Descubre herramientas de Inteligencia Artificial para optimizar tus Campañas y tomar decisiones con más impacto.'
  ],
  [
    'image' => '/src/img/grid-event-types/casosdeexito.png',
    'title' => 'Casos de Éxito',
    'description' => 'Conoce a las empresas que están cambiando las reglas del juego y aprende sus tácticas para replicar en tu negocio.'
  ],
  [
    'image' => '/src/img/grid-event-types/regalos.png',
    'title' => 'Sorpresas y regalos',
    'description' => 'Aprovecha descuentos en cursos y herramientas que potenciarán tus Estrategias de Marketing Digital.'
  ]
];
?>

<section class="emms__grid emms__grid--3">
  <div class="emms__container--md">
    <div class="emms__grid__title emms__fade-in">
      <h2>EMMS Digital Trends 2025: <br> anticípate al futuro del Marketing, hoy</h2>
    </div>

    <ul class="emms__grid__content emms__fade-in">
      <?php foreach ($gridItems as $item): ?>
        <li class="emms__grid__item">
          <div class="emms__grid__item__image">
            <img src="<?= $item['image'] ?>" alt="<?= htmlspecialchars($item['title']) ?>">
          </div>
          <div class="emms__grid__item__text">
            <h3><?= $item['title'] ?></h3>
            <p><?= $item['description'] ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>

    <div class="grid__footer">
      <?php if ($block['block'] === 'CtaBlock'): ?>
        <a href="#registro" class="emms__cta emms__cta--md emms__fade-in-animation eventHiddenElements">RESERVA TU LUGAR</a>
        <button class="emms__cta emms__cta--md emms__fade-in-animation eventShowElements alreadyRegisterForm">
          <span class="button__text">RESERVA TU LUGAR</span>
        </button>
      <?php endif; ?>
    </div>
  </div>
</section>
