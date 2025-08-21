<div class="popup-modal__form-inner">
  <header class="popup-modal__form-head">
    <h3 id="<?= $titleId ?>" class="popup-modal__title">¡Ya sos parte del Evento! 🚀</h3>
    <p class="popup-modal__text">
      Queremos que vivas una experiencia 100% personalizada. Completá los siguientes datos para que podamos ofrecerte contenidos pensados para ti.
    </p>
  </header>

  <form class="popup-modal__form-fields" method="post" action="/api/form-modal" id="formModalForm">
    <label class="popup-modal__f-group">
      <span class="popup-modal__f-label">Rol</span>
      <input class="popup-modal__input" type="text" name="role" placeholder="Escribe aquí" required />
    </label>

    <label class="popup-modal__f-group">
      <span class="popup-modal__f-label">Industria</span>
      <div class="popup-modal__select-wrap">
        <select class="popup-modal__select" name="industry" required>
          <option value="" hidden>Selecciona</option>
          <option>Educación</option>
          <option>Tecnología</option>
          <option>Retail</option>
          <option>Salud</option>
        </select>
        <span class="popup-modal__chev" aria-hidden="true">▾</span>
      </div>
    </label>

    <label class="popup-modal__f-group">
      <span class="popup-modal__f-label">Sitio Web</span>
      <input class="popup-modal__input" type="url" name="website" placeholder="Escribe aquí" />
    </label>

    <label class="popup-modal__f-group">
      <span class="popup-modal__f-label">¿Utilizas alguna de estas plataformas de Email Marketing?</span>
      <div class="popup-modal__select-wrap">
        <select class="popup-modal__select" name="email_platform">
          <option value="" hidden>Selecciona</option>
          <option>Doppler</option>
          <option>Mailchimp</option>
          <option>HubSpot</option>
          <option>Otra</option>
        </select>
        <span class="popup-modal__chev" aria-hidden="true">▾</span>
      </div>
    </label>

    <div class="popup-modal__form-actions">
      <button class="emms__cta emms__cta--terciary emms__cta--xl" type="submit">ENVIAR</button>
      <button class="popup-modal__btn-link" type="button" data-modal-close>OMITIR ESTE PASO</button>
    </div>
  </form>
</div>
