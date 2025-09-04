<div class="popup-modal__form-inner">
  <img
    class="popup-modal__form-image"
    src="/src/img/modals/jump-women.png"
    alt="Mujer saltando"
    aria-hidden="true" />
  <div class="popup-modal__form-content">

    <header class="popup-modal__form-head">
      <h3 id="<?= $titleId ?>" class="popup-modal__title">¡Ya eres parte del Evento! 🚀</h3>
      <p class="popup-modal__text">
        Queremos que vivas una experiencia 100% personalizada. Completa los siguientes datos para que podamos ofrecerte contenidos pensados para ti.
      </p>
    </header>

    <form class="popup-modal__form-fields" id="formExtraData">
      <label class="popup-modal__f-group">
        <span class="popup-modal__f-label">Rol</span>
        <input class="popup-modal__input" type="text" name="jobPosition" placeholder="Escribe aquí" required />
      </label>

      <label class="popup-modal__f-group">
        <span class="popup-modal__f-label">Industria</span>
        <input class="popup-modal__input" type="text" name="company" placeholder="Escribe aquí" />
      </label>

      <label class="popup-modal__f-group">
        <span class="popup-modal__f-label">Sitio Web</span>
        <input class="popup-modal__input" type="url" name="website" placeholder="Escribe aquí" />
      </label>

      <label class="popup-modal__f-group">
        <span class="popup-modal__f-label">¿Utilizas alguna de estas plataformas de Email Marketing?</span>
        <input class="popup-modal__input" type="text" name="emailPlatform" placeholder="Escribe aquí" />
      </label>

      <div class="popup-modal__form-actions">
        <button class="emms__cta emms__cta--terciary emms__cta--xl"><span class="button__text">ENVIAR</span></button>
        <button class="popup-modal__btn-link" type="button" data-modal-close>OMITIR ESTE PASO</button>
      </div>
    </form>
  </div>
</div>
<?php if (!defined('EMMS_COMMONFORM_JS_INCLUDED')) {
  define('EMMS_COMMONFORM_JS_INCLUDED', true); ?>
  <script type="module" src="/src/<?= VERSION ?>/js/commonForm.js"></script>
<?php } ?>
