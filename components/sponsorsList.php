     <!-- Companies list -->
     <?php
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($db->hasActiveSponsor()) {
        ?>
         <section class="companies companies--categories" id="aliados">
             <div class="emms__container--lg">
                 <h2 class="emms__fade-in">Nuestros aliados en el EMMS E-commerce</h2>
                 <h3>SPONSORS</h3>
                 <ul class="companies-list companies-list--lg  emms__fade-in">
                     <?php
                        $sponsors = $db->getSponsorsByType('SPONSOR');
                        foreach ($sponsors as $sponsor) : ?>
                         <li class="companies-list__item">
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
                 <div class="companies__divisor"></div>
                 <h3>MEDIA PARTNERS EXCLUSIVE</h3>
                 <ul class="companies-list companies-list  emms__fade-in">
                     <?php
                        $sponsors = $db->getSponsorsByType('PREMIUM');
                        foreach ($sponsors as $sponsor) : ?>
                         <li class="companies-list__item">
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
                 <div class="companies__divisor"></div>
                 <h3>MEDIA PARTNERS STARTERS</h3>
                 <ul class="companies-list companies-list  emms__fade-in" id="mediaPartenersStarters">
                 </ul>
                 <p class="companies__body">¿Tienes dudas sobre el EMMS? <a href="/registrado#preguntas-frecuentes">Haz clic aquí</a> y encuentra las <br>
                     preguntas más frecuentes sobre el evento.
                 </p>
                 <?php
                    $link = $isRegistered ? '/registrado#preguntas-frecuentes' : './#preguntas-frecuentes';
                    ?>
             </div>
         </section>
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
                                 li.classList.add('emms__fade-in-animation', 'companies-list__item');
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
