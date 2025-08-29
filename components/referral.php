<section class="referral">
  <div class="referral__image-people">
    <img src="/src/img/referral/referral-people.png" alt="Personas compartiendo el evento" />
  </div>

  <div class="referral__container">
    <div class="referral__content">
      <h2 class="referral__title">¡Recomienda el evento y gana!</h2>

      <p class="referral__description">
        Súmate al Programa de Referidos: por cada persona que invites,
        acumulas chances de ganar gift cards y elegir tu premio.
      </p>

      <ul class="referral__prizes">
        <li><span class="prize-icon" aria-hidden="true">🥇</span> Primer premio: <strong>&nbsp; $150 USD en gift card Bigbox.</strong></li>
        <li><span class="prize-icon" aria-hidden="true">🥈</span> Segundo premio: <strong>&nbsp; $100 USD en gift card Bigbox.</strong></li>
        <li><span class="prize-icon" aria-hidden="true">🥉</span> Tercer premio: <strong>&nbsp; $50 USD en gift card Bigbox.</strong></li>
      </ul>

      <p class="referral__subtitle"><strong>¿Cómo participar?</strong></p>
      <p class="referral__instructions">
        Comparte tu link único en Redes Sociales invitando a tu comunidad a que se registre gratis al evento.
        <br>
        ¡Empieza ahora y suma chances de ganar!
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
