<button class="emms__cta" id="copy-referral-btn">COPIAR LINK</button>


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
