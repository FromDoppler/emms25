<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/schedule-tabs/schedule-tabs-helper.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-card/speaker-card-helper.php');
?>

<div class="emms__calendar__tabs">
    <?php
    // TODO: Mover days a const .env??
    $days = [
        1 => ['date' => '28 de Abril', 'short' => '28/04'],
        2 => ['date' => '29 de Abril', 'short' => '29/04'],
    ];


    // Tabs de la agenda
    render_schedule_tabs($ecommerceStates, $days);
    ?>


    <?php
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    foreach ($days as $dayIndex => $dayInfo):
        $speakers = $db->getSpeakersByDay($dayIndex);
    ?>
        <div class="emms__container--lg" role="tabpanel" aria-labelledby="day<?= $dayIndex ?>">
            <div class="speaker-grid">
                <?php foreach ($speakers as $speaker): ?>
                    <div class="speaker-grid__item">
                        <?php render_speaker_card($speaker, $isRegistered); ?>
                    </div>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/schedule/speaker-card/speaker-modal/speaker-modal.php'); ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Abrir el modal
            document.querySelectorAll('.speaker-card__info').forEach(card => {
                card.addEventListener('click', function() {
                    const targetId = this.parentNode.getAttribute('data-target-speaker');
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
