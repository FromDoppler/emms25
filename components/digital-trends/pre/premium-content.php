<?php
function getContentForUrl($url)
{

  $contentMap = [
    'default' => [
      'heading' => 'Accede a la Biblioteca de Recursos… ¡Es gratis y súper completa!',
      'body' => 'Descubre contenidos descargables, herramientas y conferencias on-demand que te traen nuestros aliados para que puedas potenciar al máximo tu negocio.',
    ],
    'group1' => [
      'heading' => 'Accede a la Biblioteca de Recursos… ¡Es gratis y súper completa!',
      'body' => 'Descubre contenidos descargables, herramientas y conferencias on-demand que te traen nuestros aliados para que puedas potenciar al máximo tu negocio.',
    ],
    'group2' => [
      'heading' => 'Capacítate con la Biblioteca de Recursos ¡gratis!',
      'body' => 'Descubre contenidos descargables, herramientas y conferencias on-demand que te traen nuestros aliados para que puedas capacitarte de manera gratuita.',
    ],
  ];

  $urlToGroupMap = [
    '/' => 'group1',
    '/registrado' => 'group1',
    '/digital-trends' => 'group2',
    '/digital-trends-registrado' => 'group2',
  ];


  $group = $urlToGroupMap[$url] ?? 'default';

  return $contentMap[$group];
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/components/helpers/urlHelper.php');
$normalizedUrl = getNormalizeUrl();
$content = getContentForUrl($normalizedUrl);
?>
<section class="premium-content">
  <div class="emms__container--lg">
    <div class="premium-content__picture emms__fade-in">
      <img src="/src/img/biblioteca-recursos-2.png" alt="Biblioteca de recursos">
    </div>
    <div class="premium-content__text emms__fade-in">
      <h2><?php echo ($content['heading']); ?></h2>
      <ul class="premium-content__list emms__fade-in">
        <li>Contenidos descargables</li>
        <li>Conferencias on-demand</li>
        <li>Herramientas que potencian tu negocio</li>
      </ul>
      <!-- LISTA DE 3 BULLETS -->
      <a href="./sponsors" class="emms__cta sm emms__cta--secondary emms__fade-in">ACCEDE AHORA</a>
    </div>
  </div>
</section>
