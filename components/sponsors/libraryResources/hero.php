<section class="emms__sponsors__hero">
    <div class="emms__sponsors__hero__title emms__fade-top">
        <h1>
            <em>Herramientas gratis para optimizar tu tienda online</em>
            Biblioteca de Recursos exclusiva para
            <?php echo $isRegistred == 1 ? 'registrados al EMMS' : 'todos'; ?>
        </h1>
        <?php if ($isRegistred == 1): ?>
            <p>Descubre todos los beneficios, materiales descargables y el contenido audiovisual que nuestros aliados han preparado para ti.</p>
            <p>Vive una experiencia completa antes, durante y después del evento capacitándote gratis con todos estos contenidos on-demand.</p>
        <?php else: ?>
            <p>🔒 Desbloquea todos los beneficios, recursos descargables y el material audiovisual que nuestros aliados han preparado para ti</p>
            <a class="emms__cta emms__fade-in" data-target="modalRegister" data-toggle="emms__register-modal">REGÍSTRATE GRATIS</a>
        <?php endif; ?>
    </div>
    <div class="emms__sponsors__hero__image__container">
        <img src="/src/img/sponsors-promo.svg" alt="Posibilidades para capacitarte">
    </div>
</section>
