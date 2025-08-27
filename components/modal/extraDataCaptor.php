<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/components/modal/modal.php');
$formExtradataId = 'modalForm';
render_modal($formExtradataId, 'extradata',  'form');
?>
<script type="module">
  import {
    openModal
  } from '/components/modal/openModal.js';
  const formExtradataId = <?= json_encode($formExtradataId) ?>;
  const KEY = `modalShown:${formExtradataId}`;
  if (!sessionStorage.getItem(KEY)) {
    sessionStorage.setItem(KEY, '1');
    openModal(formExtradataId)
  }
</script>
