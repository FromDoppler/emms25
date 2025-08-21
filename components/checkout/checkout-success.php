<div class="loader-page--new visible" id="spinner">
    <img src="/src/img/logoemms-nobg.png" class="loader-goemms" alt="Loader goemms">
</div>

<div class="emms__checkout">
    <div class="emms__checkout__container emms__checkout__card__container--form emms__fade-in" id="checkout-container" style="display:none;">
        <div class="emms__checkout__card">
            <img src="/src/img/logos/logo-emms-ecommerce-dark.png" alt="Emms eCommerce 25">
            <section id="success" class="hidden">
                <div class="emms__checkout__container emms__checkout__card__container--success emms__fade-in">
                    <div class="emms__checkout__card">
                        <div class="emms__checkout__card__main">
                            <h2>¡Felicitaciones!</h2>
                            <h2>Ya eres Asistente VIP 🚀</h2>
                            <p>Mantente pendiente a tu Correo Eléctrónico porque en instantes recibirás un Email de Confirmación por la compra de tu entrada.</p>
                            <h4>Por ser Asistente Vip al EMMS E-commerce, accedes a todos estos beneficios:</h4>
                            <ul class="emms__checkout__card__main__list">
                                <li><b>Cuenta gratuita en Doppler durante 6 meses en planes de hasta 5.000 contactos, solo para nuevos usuarios. </b> Te enviaremos por Email este beneficio.</li>
                                <li><b>Workshops prácticos.</b> Se desarrollarán en vivo el 28 y 29 de abril, después de las conferencias gratuitas.</li>
                                <li><b>Sesiones de Networking.</b> Se desarrollarán en vivo el 28 y 29 de abril, después de las conferencias gratuitas.</li>
                                <li>Acceso de por vida a los Workshops.</li>
                                <li>Certificado de asistencia a Workshops.</li>
                                <li>Más guías con herramientas y tips exclusivos.</li>
                            </ul>
                        </div>
                        <div class="emms__checkout__card__aside">
                            <h3>Detalle de tu compra</h3>
                            <table>
                                <tr>
                                    <td>Titular:</td>
                                    <td><div id="customerName"></div></td>
                                </tr>
                                <tr>
                                    <td>Categoría:</td>
                                    <td><div id="ticketName"></div></td>
                                </tr>
                                <tr>
                                    <td>Medio de pago:</td>
                                    <td>Tarjeta de Crédito</td>
                                </tr>
                                <tr>
                                    <td>Fecha de compra:</td>
                                    <td><div id="date"></div></td>
                                </tr>
                                <tr>
                                    <td>Monto:</td>
                                    <td><div id="amount"></div></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="./ecommerce-registrado" class="emms__checkout__back">← Volver al sitio</a>
                </div>
            </section>
        </div>
        <a href="./ecommerce-registrado" class="emms__checkout__back">← Volver al sitio</a>
    </div>
</div>

<script>
const toggleSpinner = (show) => {
    const spinner = document.getElementById('spinner');
    if (show) spinner.classList.add('visible');
    else spinner.classList.remove('visible');
};

const showCheckoutContainer = (show) => {
    document.getElementById('checkout-container').style.display = show ? 'block' : 'none';
};

const updateEvents = () => {
    try {
        const vipId = window.APP.EVENTS.CURRENT.vipId;
        const existingEvents = JSON.parse(localStorage.getItem('events')) || [];
        if (!existingEvents.includes(vipId)) {
            existingEvents.push(vipId);
            localStorage.setItem('events', JSON.stringify(existingEvents));
        }
    } catch {
        localStorage.clear();
    }
};

(async function initSuccess() {
    toggleSpinner(true);

    const urlParams = new URLSearchParams(window.location.search);
    const sessionId = urlParams.get('session_id');

    if (!sessionId) {
        window.location.href = "/";
        return;
    }

    try {
        const response = await fetch(`<?= STRIPE_URL_SERVER; ?>/session-status?${urlParams.toString()}`);
        if (!response.ok) throw new Error(`Error en la respuesta del servidor: ${response.statusText}`);
        const session = await response.json();

        if (session.status === 'complete') {
            document.getElementById('customerName').textContent = session.customer_details.customer_name;
            document.getElementById('date').textContent = session.customer_details.date;
            document.getElementById('amount').textContent = `${session.customer_details.currency} ${session.customer_details.final_price}`;
            document.getElementById('ticketName').textContent = session.customer_details.ticket_name;

            document.getElementById('success').classList.remove('hidden');
            updateEvents();
            showCheckoutContainer(true);
        } else {
            throw new Error('Sesión incompleta');
        }
    } catch (error) {
        console.error("Error al obtener el estado de la sesión:", error);
        window.location.href = "/";
    } finally {
        toggleSpinner(false);
    }
})();
</script>
