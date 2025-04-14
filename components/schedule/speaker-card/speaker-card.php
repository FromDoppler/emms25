<div class="speaker-card <?= 'speaker-card--' . $speaker['exposes'] ?>" data-target-speaker="modal-<?= $speaker['id'] ?>">

    <!-- Ribbon del speaker vip -->
    <?php include('speaker-ribon.php'); ?>

    <!-- Imagen del speaker -->
    <?php include('speaker-image.php'); ?>

    <!-- Información del speaker -->
    <?php include('speaker-info.php'); ?>


</div>
