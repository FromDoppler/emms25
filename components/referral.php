<section class="referral">
  <div class="referral__image-people">
    <img src="/src/img/referral/referral.png" alt="Persona promocionando su premio" />
  </div>

  <div class="referral__container">
    <div class="referral__content">
      <h2 class="referral__title">¡Recomienda el evento y gana!</h2>

      <p class="referral__description">
        Súmate al <strong>PROGRAMA DE REFERIDOS</strong> : por cada persona que invites, acumulas chances de ganar gift cards y elegir tu premio.
      </p>
      <img src="/src/img/referral/premios.png" alt="Increibles premios" class="premios-desktop">
      <img src="/src/img/referral/premios-mobile.png" alt="Increibles premios" class="premios-mobile">

      <p class="referral__subtitle"><strong>¿Cómo participar?</strong></p>
      <p class="referral__instructions">
        Comparte tu link único en Redes Sociales invitando a tu comunidad a que se registre gratis al evento. ¡Empieza ahora y suma chances de ganar!
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
