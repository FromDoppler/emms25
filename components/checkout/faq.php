<?php
$faqItems = [
    [
        "question" => "¿Cómo puedo abonar mis entradas?",
        "answer" => "Podrás abonar mediante tarjeta de crédito internacional, Visa, Mastercard o American Express. Para realizar la compra deberás completar los datos solicitados, proporcionarnos tu información de facturación y cargar los datos de la tarjeta. Una vez aprobado el pago, recibirás un mail de confirmación de compra al correo electrónico que hayas indicado como contacto.",
        "open" => true
    ],
    [
        "question" => "¿Cómo recibo mi entrada VIP?",
        "answer" => "Una vez realizado el proceso de compra, recibirás un Email de confirmación y ¡listo! Ya tendrás reservado tu cupo. Solamente deberás ingresar al evento con el email con el que te has registrado y tus datos de contacto para comenzar a vivir el EMMS Digital Trends 2024.",
        "open" => false
    ],
    [
        "question" => "¿Cómo veré reflejado el pago de las entradas en mi cuenta?",
        "answer" => "El cargo que se realice en tu tarjeta aparecerá en tu próximo resumen con la descripción “Entrada VIP EMMS Digital Trends 2024”. Recuerda que los montos originales están expresados en dólares estadounidenses y los impuestos dependerán del método de pago elegido y el país donde se efectúe el pago.",
        "open" => false
    ],
    [
        "question" => "¿Obtendré factura por mi compra?",
        "answer" => "Si requieres la facturación de la entrada VIP adquirida, escríbenos a <a href=\"mailto:billing@fromdoppler.com\">billing@fromdoppler.com</a> con asunto “Factura entrada VIP EMMS Digital Trends 2024” y en breve te enviaremos la factura digital correspondiente.",
        "open" => false
    ],
    [
        "question" => "¿Qué dato tengo que ingresar en el proceso de compra si no conozco mi Tax ID?",
        "answer" => "Este dato corresponderá a tu NIF, CIF, CUIT, RFC, CC, RUC, DUI, RUT, Cédula o la opción fiscal adecuada a tu país de residencia. Si eres consumidor final, simplemente ingresa tu Documento de Identidad.",
        "open" => false
    ],
    [
        "question" => "¿Puedo pedir un reembolso?",
        "answer" => "En caso de que te arrepientas de la compra, puedes solicitar la cancelación de la misma y posterior devolución del dinero hasta 48 hs antes del evento. Para ello, deberás enviarnos un correo a <a href=\"mailto:administracion@fromdoppler.com\">administracion@fromdoppler.com</a> adjuntando la factura de compra que recibiste para que podamos gestionar el reembolso.",
        "open" => false
    ],
    [
        "question" => "¿A quién acudo si tengo problemas con mi pago?",
        "answer" => "Si tienes registro de un débito erróneo en el resumen de tu tarjeta, te pedimos que nos envíes un correo a administracion@fromdoppler.com indicando lo sucedido para que podamos ayudarte.",
        "open" => false
    ],
    [
        "question" => "¿Qué beneficio tiene la entrada VIP?",
        "answer" => "Con tu entrada VIP podrás disfrutar de una cuenta de Doppler gratuita por 6 meses hasta 5.000 contactos, acceder a Workshops prácticos, espacios de Networking y herramientas que transformarán tu negocio, entre otros beneficios. ",
        "open" => false
    ],
];
?>
<section class="emms__frequentquestions frequentquestions--checkout" id="preguntas-frecuentes">
    <div class="emms__background-a"></div>
    <div class="emms__container--md">
        <h2 class="emms__fade-in">Preguntas frecuentes</h2>
        <ul class="emms__frequentquestions__list emms__fade-in">
            <?php foreach ($faqItems as $item): ?>
                <li class="emms__frequentquestions__list__item <?php echo $item['open'] ? 'open' : 'close'; ?>">
                    <button class="emms__frequentquestions__list__item__head"><?php echo $item['question']; ?></button>
                    <p class="emms__frequentquestions__list__item__content"><?php echo $item['answer']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<script src="src/<?= VERSION ?>/js/collapsibles.js"></script>
