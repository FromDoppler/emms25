<div class="emms__checkout">
  <div class="emms__checkout__container emms__checkout__card__container--form emms__fade-in" id="checkout-container">
    <div class="emms__checkout__card">
      <img src="/src/img/logos/logo-emms-gray.png" alt="Emms Digital Trends 25">
      <section id="success">
        <div class="emms__checkout__container emms__checkout__card__container--success emms__fade-in">
          <div class="emms__checkout__card">
            <div class="emms__checkout__card__main">
              <h2>¡Felicitaciones!</h2>
              <h2>Ya eres Asistente VIP 🚀</h2>
              <p>Mantente pendiente a tu Correo Eléctrónico porque en instantes recibirás un Email de Confirmación por la compra de tu entrada.</p>
              <h4>Antes de irte… ¡Súmate al Programa de Referidos!</h4>
              <p>Por cada persona que invites al EMMS, acumulas chances de ganar gift cards y elegir tu premio.
                Comparte tu link único en Redes Sociales y empieza ahora a invitar a tu comunidad a que se registre gratis al evento.
              </p>
              <?php include($_SERVER['DOCUMENT_ROOT'] . '/components/referral-button.php') ?>
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
          <a href="./digital-trends-registrado" class="emms__checkout__back">← Volver al sitio</a>
        </div>
      </section>
    </div>
    <a href="./digital-trends-registrado" class="emms__checkout__back">← Volver al sitio</a>
  </div>
</div>
