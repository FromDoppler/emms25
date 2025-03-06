<?php
$videos = [
    [
        "title" => "Logística de Ecommerce el eslabón clave de la recompra orgánica",
        "img" => "/src/img/conferences24/portada-capsula-quintino-min.png",
        "link" => "https://www.youtube.com/watch?v=YQCW78eFrWQ",
        "logo" => "/src/img/conferences24/logos/quintino-logo.png",
        "altLogo" => "Quintino Logo"
    ],
    [
        "title" => "Estrategias de Marketing para rentabilizar tu Ecommerce",
        "img" => "/src/img/conferences24/portada-capsula-vivimarketing-min.png",
        "link" => "https://www.youtube.com/watch?v=xk5qoFXkqLM",
        "logo" => "/src/img/conferences24/logos/vivimarketing-logo.png",
        "altLogo" => "Vivimarketing Logo"
    ],
    [
        "title" => "Las nuevas tendencias en META para incrementar tu ROAS",
        "img" => "/src/img/conferences24/portada-capsula-juanmanuel-card-min.png",
        "link" => "https://youtu.be/7Itqv61mGQA",
        "logo" => "/src/img/conferences24/logos/juan-manuel-emprende-logo.png",
        "altLogo" => "Juan Manuel Emprende Logo"
    ],
    [
        "title" => "Potenciando la Programática con Creatividades Dinámicas Efectivas",
        "img" => "/src/img/conferences24/portada-wextion-min.png",
        "link" => "https://youtu.be/Im5n03CtUpc",
        "logo" => "/src/img/conferences24/logos/wextion-exclusive-logo.png",
        "altLogo" => "Wextion Exclusive Logo"
    ]
];

?>

<section class="emms__conferences">
    <div class="emms__conferences__container">
        <div class="emms__conferences__wrapper">
            <div class="emms__conferences__title emms__fade-in">
                <h2>Conferencias exclusivas</h2>
                <p>Tus mayores referentes comparten las mejores estrategias para hacer crecer tu negocio en breves videos. ¡Capacítate e inspírate con el EMMS!</p>
            </div>
            <div class="emms__conferences__cards__container">
                <?php foreach ($videos as $video): ?>
                    <div class="emms__conferences__cards emms__fade-in">
                        <a
                            <?php if (!$isRegistered): ?>
                                data-target="modalRegister" data-toggle="emms__register-modal" href="#"
                            <?php else: ?>
                                href="<?= $video['link'] ?>" target="_blank"
                            <?php endif; ?>
                        >
                            <img src="<?= $video['img'] ?>" alt="Conferencias exclusivas">
                            <div class="emms__conferences__cards__info">
                                <h4><?= $video['title'] ?></h4>
                                <span>Ver ahora →</span>
                                <div class="emms__conferences__cards__info__image-container">
                                    <img src="<?= $video['logo'] ?>" alt="<?= $video['altLogo'] ?>">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
