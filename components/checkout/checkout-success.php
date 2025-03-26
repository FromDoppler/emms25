<div class="loader-page--new" id="spinner">
    <img src="/src/img/logoemms-nobg.png" class="loader-goemms" alt="Loader goemms">
</div>
<div class="emms__checkout">

    <!-- Form -->
    <div class="emms__checkout__container emms__checkout__card__container--form emms__fade-in">
        <div class="emms__checkout__card">
            <img src="/src/img/logos/logo-emms--gray.png" alt="Emms eCommerce 25">
            <section id="success" class="hidden">
                <div class="emms__checkout__container emms__checkout__card__container--success emms__fade-in">
                    <div class="emms__checkout__card">
                        <div class="emms__checkout__card__main">
                            <h2>¡Felicitaciones! </h2>
                            <h2>Ya tienes tu Entrada Vip.</h2>
                            <p>Mantente pendiente a tu Correo Eléctrónico porque en instantes recibirás un Email de Confirmación por la compra de tu entrada.</p>
                            <h4>Por ser Asistente Vip al EMMS eCommerce, accedes a todos estos beneficios:</h4>
                            <ul class="emms__checkout__card__main__list">
                                <li>Cuenta gratuita de Doppler.</li>
                                <li>Workshops prácticos.</li>
                                <li>Sesiones de Networking.</li>
                                <li>Certificado de asistencia.</li>
                            </ul>
                        </div>
                        <div class="emms__checkout__card__aside">
                            <h3>Detalle de tu compra</h3>
                            <table>
                                <tr>
                                    <td>Titular:</td>
                                    <td>
                                        <div id="customerName"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Categoría:</td>
                                    <td>
                                        <div id="ticketName"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Medio de pago:</td>
                                    <td>Tarjeta de Crédito</td>
                                </tr>
                                <tr>
                                    <td>Fecha de compra:</td>
                                    <td>
                                        <div id="date"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Monto:</td>
                                    <td>
                                        <div id="amount"></div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="./ecommerce-registrado.php" class="emms__checkout__back">← Volver al sitio</a>
                </div>
            </section>
        </div>
        <a href="./ecommerce-registrado.php" class="emms__checkout__back">← Volver al sitio</a>
    </div>
</div>

<script>
    const toggleSpinner = () => {
        const spinner = document.getElementById('spinner');
        spinner.classList.toggle('visible');
    }
    toggleSpinner();
    (async () => {
        await initialize();
        toggleSpinner();
    })();

    const updateEvents = () => {
        if (localStorage.getItem('events')) {
            const existingEvents = JSON.parse(localStorage.getItem('events'));
            if (!existingEvents.includes("ecommerce25-vip")) {
                existingEvents.push("ecommerce25-vip");
                localStorage.setItem('events', JSON.stringify(existingEvents));
            }
        } else {
            localStorage.clear();
        }
    };

    async function initialize() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const sessionId = urlParams.get('session_id');
        const response = await fetch(`<?= STRIPE_URL_SERVER; ?>/session-status?session_id=${sessionId}`);
        const session = await response.json();

        if (session.status == 'complete') {
            document.getElementById('customerName').innerHTML = session.customer_details.customer_name;
            document.getElementById('date').innerHTML = session.customer_details.date;
            document.getElementById('amount').innerHTML = `${session.customer_details.currency} ${session.customer_details.final_price}`;
            document.getElementById('ticketName').innerHTML = session.customer_details.ticket_name;
            document.getElementById('success').classList.remove('hidden');
            updateEvents();
        }
    }
</script>
