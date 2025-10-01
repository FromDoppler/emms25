 <div class="emms__hero-conference__video emms__hero-conference__video--transition emms__fade-in  show--vip emms__vip">
   <div class="speaker-card__ribbon dk">EXCLUSIVO ASISTENTE VIP </div>
   <div class="speaker-card__ribbon mb">VIP </div>
   <div class="broadcast-vip__container emms__container--md">
     <div class="broadcast-vip__content">
       <h3 class="broadcast-vip__title">Accede a los links para ingresar a los Workshops 🤩</h3>
       <p class="broadcast-vip__subtitle">30 DE OCTUBRE</p>
       <?php
        $workshops = [
          '&nbsp;' => [
            [
              'title' => 'Cómo diseñar la scrolling experience: narrativa visual en Email Marketing',
              'url' => '#',
              'hour' => '(ARG) 11:00 am',
              'hourLink' => 'https://www.timeanddate.com/worldclock/fixedtime.html?msg=Workshop+Ana+Cirujano+-+EMMS+Digital+Trends+2025&iso=20251030T11&p1=51&am=40'
            ],
            [
              'title' => 'Consigue clientes B2B en LinkedIn sin invertir en publicidad',
              'url' => '#',
              'hour' => '(ARG) 11:40 am',
              'hourLink' => 'https://www.timeanddate.com/worldclock/fixedtime.html?msg=Workshop+Pablo+Rodr%C3%ADguez+-+EMMS+Digital+Trends+2025&iso=20251030T11&p1=51&am=40'
            ],
            [
              'title' => 'Descubriendo las nuevas campañas Power Pack de Google Ads',
              'url' => '#',
              'hour' => '(ARG) 12:20 pm',
              'hourLink' => 'https://www.timeanddate.com/worldclock/fixedtime.html?msg=Workshop+%C3%81lvaro+L%C3%B3pez+Herrera+-+EMMS+Digital+Trends+2025&iso=20251030T1220&p1=51&am=40'
            ],
          ],
          '&nbsp;&nbsp;' => [
            [
              'title' => 'Cómo crear un Sitio Web en minutos con WordPress e IA',
              'url' => '#',
              'hour' => '(ARG) 13:00 pm',
              'hourLink' => 'https://www.timeanddate.com/worldclock/fixedtime.html?msg=Workshop+Fernando+Tellado+-+EMMS+Digital+Trends+2025&iso=20251030T13&p1=51&am=40'
            ],
            [
              'title' => 'SEO para la IA: mitos, verdades y el futuro de la búsqueda',
              'url' => '#',
              'hour' => '(ARG) 13:40 pm',
              'hourLink' => 'https://www.timeanddate.com/worldclock/fixedtime.html?msg=Workshop+Natzir+Turrado+-+EMMS+Digital+Trends+2025&iso=20251030T1340&p1=51&am=40'
            ],
            [
              'title' => 'Meta Ads 2025: Nuevas reglas, nuevas oportunidades',
              'url' => '#',
              'hour' => '(ARG) 14:20 pm',
              'hourLink' => 'https://www.timeanddate.com/worldclock/fixedtime.html?msg=Workshop+Mariano+Khatcherian+-+EMMS+Digital+Trends+2025&iso=20251030T1420&p1=51&am=40'
            ],
          ],

          '&nbsp;&nbsp;&nbsp;' => [
            [
              'title' => 'Doce formas de encontrar influencers que generen resultados',
              'url' => '#',
              'hour' => '(ARG) 15:00 pm',
              'hourLink' => 'https://www.timeanddate.com/worldclock/fixedtime.html?msg=Workshop+Maria+Marques+-+EMMS+Digital+Trends+2025&iso=20251030T15&p1=51&am=40'
            ],
            [
              'title' => 'Crea una marca memorable con un dominio estratégico',
              'url' => '#',
              'hour' => '(ARG) 15:40 pm',
              'hourLink' => 'https://www.timeanddate.com/worldclock/fixedtime.html?msg=Workshop+Xisco+L%C3%B3pez+-+EMMS+Digital+Trends+2025&iso=20251030T1540&p1=51&am=40'
            ]
          ]
        ];
        ?>


       <div class="workshops-links__columns">
         <?php foreach ($workshops as $day => $sessions): ?>
           <div class="workshops-links__day">
             <!-- <h4><?= $day ?></h4>
             <hr> -->
             <ul>
               <?php foreach ($sessions as $session): ?>
                 <li>
                   <a href="<?= $session['url'] ?>" target="_blank"><?= $session['title'] ?></a>
                   <?php if (isset($session['alert']) && !empty($session['alert'])): ?>
                     <br>
                     <span class="alert"><?= $session['alert'] ?></span>
                   <?php endif; ?>
                   <br>
                   <span><?= $session['hour'] ?></span>
                   <?php if (isset($session['hourLink']) && !empty($session['hourLink'])): ?>
                     <br>
                     <a class="hour" href="<?= $session['hourLink'] ?>">Mira el horario en tu país</a>
                   <?php endif; ?>

                 </li>
               <?php endforeach; ?>
             </ul>
           </div>
         <?php endforeach; ?>
       </div>
     </div>
     <img src="src/img/placas/tuercas.png" alt="Icono de tuercas" class="broadcast-free__image broadcast-vip__image--tool" />

   </div>

 </div>
