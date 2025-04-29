<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/schedule-tabs/schedule-tabs-helper.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-card/helpers/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-grid/grid-days.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-card/speaker-modal/speaker-modal-helper.php');
?>

<div class="emms__calendar__tabs">
    <?php
    // TODO: Mover days a const .env??
    $days = [
        1 => ['date' => 'DÍA 1', 'short' => 'DÍA 1'],
        2 => ['date' => 'DÍA 2', 'short' => 'DÍA 2'],
    ];

    $dayDuring = DAY_DURING;
    // Tabs de la agenda
    render_schedule_tabs($ecommerceStates, $days, $dayDuring);
    ?>


    <?php
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    foreach ($days as $dayIndex => $dayInfo):
        $speakers = $db->getSpeakersByDay($dayIndex);
    ?>
        <div class="emms__container--lg" role="tabpanel" aria-labelledby="day<?= $dayIndex ?>">
            <?php
            render_event_day($dayIndex, $ecommerceStates);
            ?>
            <div class="dk">
                <div class="speaker-grid ">
                    <?php foreach ($speakers as $speaker): ?>
                        <div class="speaker-grid__item">
                            <?php render_speaker_card($speaker, $isRegistered, false, $ecommerceStates); ?>
                        </div>
                        <?php render_speaker_modal($speaker, false) ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="mb">
                <div class="speaker-grid speaker-carousel">
                    <?php foreach ($speakers as $speaker): ?>
                        <div class="speaker-grid__item carousel-cell">
                            <?php render_speaker_card($speaker, $isRegistered, true, $ecommerceStates); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php foreach ($speakers as $speaker): ?>
                    <?php render_speaker_modal($speaker, true) ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Abrir el modal
            document.querySelectorAll('.speaker-card__more-info').forEach(card => {
                card.addEventListener('click', function() {
                    const speakerCard = this.closest('.speaker-card');
                    const targetId = speakerCard?.getAttribute('data-target-speaker');
                    const modal = document.getElementById(targetId);

                    if (modal) {
                        modal.classList.remove('modal-overlay--hide');
                        modal.classList.add('modal-overlay--show');
                        modal.style.display = 'flex';
                    }
                });
            });


            // Función reutilizable para cerrar el modal con fadeOut
            function closeModal(modal) {
                modal.classList.remove('modal-overlay--show');
                modal.classList.add('modal-overlay--hide');

                setTimeout(() => {
                    modal.style.display = 'none';
                }, 300); // tiempo de la animación CSS
            }

            // Cerrar el modal
            document.querySelectorAll('.modal .modal__close-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const modal = btn.closest('.modal-overlay');
                    if (modal) closeModal(modal);
                });
            });

            // Cerrar el modal al hacer clic fuera del contenido
            window.addEventListener('click', function(e) {
                if (e.target.classList.contains('modal-overlay')) {
                    closeModal(e.target);
                }
            });
        });
    </script>

</div>
