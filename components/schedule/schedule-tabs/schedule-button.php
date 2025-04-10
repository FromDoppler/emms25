<?php

$isPost = $state === 'post';
$selected = $isSelected ? 'true' : 'false';
$finalized = ($isFinalized && !$isPost) ? ' - finalizado' : '';
$id = "day{$day}";
?>

<button class="schedule__tab" role="tab" aria-selected="<?= $selected ?>" id="<?= $id ?>">
    <span class="dk"><?= $info['date'] ?><?= $finalized ?></span>
    <span class="mb"><?= $info['short'] ?><?= $finalized ?></span>
</button>
