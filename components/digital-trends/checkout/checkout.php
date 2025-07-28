<div class="emms__checkout">
    <div class="loader-page--new" id="spinner">
        <img src="/src/img/logoemms-nobg.png" class="loader-goemms" alt="Loader goemms">
    </div>
    <div class="emms__checkout__container emms__checkout__card__container--form emms__fade-in">
        <div class="emms__checkout__card">
            <div id="checkout"></div>
        </div>
        <a href="./digital-trends-registrado.php" class="emms__checkout__back">← Volver al sitio</a>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    // This is your test publishable API key.
    const toggleSpinner = () => {
        const spinner = document.getElementById('spinner');
        spinner.classList.toggle('visible');
    }
    toggleSpinner();
    const stripe = Stripe(`<?= STRIPE_PUBLIC_KEY; ?>`);
    (async () => {
        await initialize();
        toggleSpinner();
    })();

    async function initialize() {
        try {
            const getCustomerEmail = () => {
                if (localStorage.getItem('dplrid')) {
                    const encodedEmailHex = localStorage.getItem('dplrid');
                    const decodedEmail = hexToString(encodedEmailHex);
                    return decodedEmail;
                } else {
                    return null;
                }
            };

            const urlParams = new URLSearchParams(window.location.search);
            const promotionCode = urlParams.get('promotionCode');

            const customerEmail = getCustomerEmail();

            const response = await fetch(`<?= STRIPE_URL_SERVER; ?>/create-checkout-session`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    customerEmail: customerEmail,
                    ...(promotionCode && {
                        promotionCode
                    })
                })
            });

            if (!response.ok) {
                throw new Error(`Error en la respuesta del servidor: ${response.statusText}`);
            }

            const {
                clientSecret
            } = await response.json();

            const checkout = await stripe.initEmbeddedCheckout({
                clientSecret,
            });
            checkout.mount('#checkout');
        } catch (error) {
            console.error("Error al inicializar el checkout:", error);
            window.location.href = '/';
        }
    }


    // Función para convertir hexadecimal a string ASCII
    function hexToString(hex) {
        let string = '';
        for (let i = 0; i < hex.length; i += 2) {
            string += String.fromCharCode(parseInt(hex.substr(i, 2), 16));
        }
        return string;
    }
</script>
