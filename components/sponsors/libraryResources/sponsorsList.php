<?php
$db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$sponsors = $db->getSponsorsCards('SPONSOR');
if (!empty($sponsors)) {
?>
    <section class="emms__sponsors__list">
        <div class="emms__container--lg">
            <div class="emms__sponsors__list__title">
                <h2 class="emms__fade-in">Continúa capacitándote e inspirándote con estos recursos</h2>
            </div>
            <ul class="emms__sponsors__list__content emms__fade-in">
                <?php
                $index = 0;
                $texts = array(0 => "RECURSO EXCLUSIVO", 1 => "¡NO TE LO PIERDAS!", 2 => "SOLO PARA TI", 3 => "¡HAZ CLIC AHORA!");
                foreach ($sponsors as $sponsor) :
                ?>
                    <li class="emms__sponsors__list__item">
                        <div class="emms__sponsors__list__item__ribon">
                            <img src="/src/img/emoji-book.svg" alt="Book emoji">
                            <?= $texts[$index] ?>
                        </div>

                        <h3><?= $sponsor['title'] ?></h3>
                        <p><?= $sponsor['description_card'] ?></p>
                        <?php if ($sponsor['slug'] === '') : ?>
                            <a class="inactive">Accede →</a>
                        <?php else : ?>
                            <a data-target="modalRegister" data-toggle="emms__register-modal" slug=<?= $sponsor['slug'] ?>>Accede ahora</a>
                        <?php endif ?>
                        <div class="emms__sponsors__list__item__logo">
                            <img src="./adm24/server/modules/sponsors/uploads/<?= $sponsor['logo_company'] ?>" alt="<?= $sponsor['alt_logo_company'] ?>">
                        </div>
                    </li>
                <?php
                    $index++;
                endforeach; ?>
            </ul>
        </div>
    </section>
<?php } ?>
