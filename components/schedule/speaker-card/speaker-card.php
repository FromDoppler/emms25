<?php $speakerId = $speaker['id'] . ($isMobile ? '-mobile' : '');
?>
<div class="speaker-card <?= 'speaker-card--' . $speaker['exposes'] ?>" data-target-speaker="modal-<?= $speakerId ?>">

    <!-- Ribbon del speaker vip -->
    <?php include('speaker-ribon.php'); ?>

    <!-- Imagen del speaker -->
    <?php include('speaker-image.php'); ?>

    <!-- Información del speaker -->
    <?php include('speaker-info.php'); ?>


</div>
