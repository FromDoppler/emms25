     <!-- Companies list -->
     <?php
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($db->hasActiveSponsor()) {
        ?>
         <section class="emms__companies emms__companies--categories" id="aliados">
             <div class="emms__container--lg">
                 <h2 class="emms__fade-in">Nuestros aliados en el EMMS Digital Trends</h2>
                 <h3>SPONSORS</h3>
                 <ul class="emms__companies__list emms__companies__list--lg  emms__fade-in">
                     <?php
                        $sponsors = $db->getSponsorsByType('SPONSOR');
                        foreach ($sponsors as $sponsor) : ?>
                         <li class="emms__companies__list__item">
                             <?php if ($sponsor['link_site']) : ?>
                                 <a href="<?= $sponsor['link_site'] ?>" target="_blank">
                                 <?php endif ?>
                                 <img src="./adm25/server/modules/sponsors/uploads/<?= $sponsor['logo_company'] ?>" alt="<?= $sponsor['alt_logo_company'] ?>">
                                 <?php if ($sponsor['link_site']) : ?>
                                 </a>
                             <?php endif ?>
                         </li>

                     <?php endforeach; ?>
                 </ul>
                 <div class="emms__companies__divisor"></div>
                 <h3>MEDIA PARTNERS EXCLUSIVE</h3>
                 <ul class="emms__companies__list emms__companies__list  emms__fade-in">
                     <?php
                        $sponsors = $db->getSponsorsByType('PREMIUM');
                        foreach ($sponsors as $sponsor) : ?>
                         <li class="emms__companies__list__item">
                             <?php if ($sponsor['link_site']) : ?>
                                 <a href="<?= $sponsor['link_site'] ?>" target="_blank">
                                 <?php endif ?>
                                 <img src="./adm25/server/modules/sponsors/uploads/<?= $sponsor['logo_company'] ?>" alt="<?= $sponsor['alt_logo_company'] ?>">
                                 <?php if ($sponsor['link_site']) : ?>
                                 </a>
                             <?php endif ?>
                         </li>

                     <?php endforeach; ?>
                 </ul>
                 <div class="emms__companies__divisor"></div>
                 <h3>MEDIA PARTNERS STARTERS</h3>
                 <ul class="emms__companies__list emms__companies__list  emms__fade-in" id="mediaPartenersStarters">
                 </ul>
                 <small class="emms__fade-in"><strong>¿Tienes dudas sobre el EMMS? <a href="https://goemms.com/#preguntas-frecuentes"> Haz clic aquí </a>y encuentra las preguntas más frecuentes sobre el evento</strong></small>
                 <a href="https://goemms.com/sponsors-promo" class="emms__cta">CONVIÉRTETE EN ALIADO</a>
             </div>
         </section>
         <script src="/src/<?= VERSION ?>/js/sponsors.js"></script>
         <script>
             'use strict';

             document.addEventListener('DOMContentLoaded', () => {
                 const endPoint = '/services/getMediaPartners.php';

                 // Función para obtener los media partners desde el servidor
                 const getMediaPartners = async (partnerType) => {
                     const response = await fetch(endPoint, {
                         method: "POST",
                         headers: {
                             "Content-Type": "application/json"
                         },
                         body: JSON.stringify({
                             type: partnerType
                         })
                     });
                     return response.json();
                 };

                 // Función para renderizar los media partners divididos en grupos
                 const printMediaPartners = (mediaPartners, container) => {
                     const groupLength = Math.ceil(mediaPartners.length / (mediaPartners.length % 2 === 0 ? 6 : 5));
                     let groups = [],
                         currentGroup = [];

                     mediaPartners.forEach((partner, index) => {
                         currentGroup.push(partner);
                         if (currentGroup.length === groupLength || index === mediaPartners.length - 1) {
                             groups.push(currentGroup);
                             currentGroup = [];
                         }
                     });

                     groups.forEach((group, index) => {
                         setTimeout(() => {
                             group.forEach(partner => {
                                 const li = document.createElement('li');
                                 li.classList.add('emms__fade-in-animation', 'emms__companies__list__item');
                                 li.innerHTML = `<img src="./adm25/server/modules/sponsors/uploads/${partner.logo_company}" alt="${partner.alt_logo_company}">`;
                                 container.appendChild(li);
                             });
                         }, 800 * index);
                     });
                 };

                 // Inicializar y renderizar media partners
                 const partnersContainer = document.getElementById('mediaPartenersStarters');
                 if (partnersContainer) {
                     getMediaPartners('starters').then(data => printMediaPartners(data, partnersContainer));
                 }
             });
         </script>
     <?php }
        $db->close();
        ?>
