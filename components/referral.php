<section class="referral">
  <div class="referral__image-people">
    <img src="/src/img/referral/referral-people.png" alt="Personas compartiendo el evento" />
  </div>

  <div class="referral__container">
    <div class="referral__content">
      <h2 class="referral__title">¡Recomienda el evento <br>y recibe recompensas!</h2>
      <p class="referral__description">
        <strong>Súmate al Programa de Referidos</strong> y participa por premios exclusivos pensados para disfrutar al máximo la experiencia EMMS.
      </p>
      <p class="referral__subtitle"><strong>¿Cómo participar?</strong></p>
      <p class="referral__instructions">
        Solo tienes que compartir tu link en Redes Sociales para invitar a tu comunidad a que se registre gratis al evento.
        <br><br>
        ¡Empieza a compartir ahora y suma chances de ganar!
      </p>
      <button class="emms__cta" id="copy-referral-btn">COPIAR LINK</button>
    </div>
  </div>
</section>

<script type="module">

document.addEventListener('DOMContentLoaded', function() {
  const copyBtn = document.getElementById('copy-referral-btn');

  function getEncodedEmail() {
    return localStorage.getItem('dplrid');
  }

  function generateReferralUrl() {
    const encodedEmail = getEncodedEmail();
    if (!encodedEmail) {
      return null;
    }
    const currentEvent = window.APP.EVENTS.CURRENT;
    const baseUrl = window.location.origin;
    const registrationPath = currentEvent.pages.unregistered.url;
    return `${baseUrl}/${registrationPath}?emms_ref=${encodedEmail}`;
  }

  async function copyToClipboard() {
    const referralUrl = generateReferralUrl();
    if (!referralUrl) {
      return;
    }

    try {
      await navigator.clipboard.writeText(referralUrl);

      const originalText = copyBtn.textContent;
      copyBtn.textContent = '¡COPIADO!';

      setTimeout(() => {
        copyBtn.textContent = originalText;
      }, 2000);

    } catch (err) {
      return;
    }
  }

  copyBtn.addEventListener('click', copyToClipboard);
});
</script>
