<!-- Register modal -->
<!-- TODO: Definir si vamos a re utilizar el mismo form o crear uno nuevo -->
<div id="modalRegister2" class="emms__register-modal">
  <div class="emms__register-modal__window">
    <!-- Form -->
    <?php
    $formTitle = 'Revive las ediciones anteriores 🙂';
    $formSubTitle = 'Regístrate aquí de forma gratuita para volver a ver las charlas de todas tus ediciones preferidas del EMMS, desbloquear la Biblioteca de Recursos y ¡ser parte de la próxima edición!';
    $eventType = ECOMMERCE;
    ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/register-form-component.php'); ?>
    <!-- End form -->
    <button class="emms__register-modal__window__close" data-dismiss="emms__register-modal"></button>
  </div>
</div>
