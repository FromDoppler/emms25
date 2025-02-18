<?php
function renderButton($buttonData, $eventState)
{
    $defaults = array(
        'buttonText' => '',
        'buttonLink' => '',
        'isSecondaryButton' => false
    );

    $buttonData = array_merge($defaults, $buttonData);

    extract($buttonData);

    $buttonHtml = '';

    if ($eventState['isPre']) {
        $buttonHtml = "<a class=\"emms__cta\" href=\"$buttonLink\">$buttonText</a>";
    } elseif ($eventState['isLive']) {
        $buttonHtml = "<a href=\"$buttonLink\" class=\"emms__cta\">ACCEDE AL VIVO</a>";
    } elseif ($eventState['isDuring']) {
        $buttonHtml = "<a href=\"$buttonLink\" class=\"emms__cta\">SÚMATE AHORA</a>";
    } elseif ($eventState['isPost']) {
        $buttonHtml = "<a href=\"$buttonLink\" class=\"emms__cta\">REVIVE EL EVENTO</a>";
    }

    if ($isSecondaryButton) {
        $buttonHtml = "<a href=\"$buttonLink\" class=\"emms__cta emms_cta--secondary\">$buttonText</a>";
    }

    return $buttonHtml;
}

function renderEventCard($eventData, $eventState)
{
    $defaults = array(
        'imageSrc' => '',
        'imageAlt' => '',
        'title' => '',
        'description' => '',
        'buttonText' => '',
        'buttonLink' => '',
        'ribbonText' => '',
        'isSecondaryButton' => false
    );

    $eventData = array_merge($defaults, $eventData);

    extract($eventData);

    $postEventHtml = $eventState['isPost'] ? '<p class="top hide">EVENTO FINALIZADO</p>' : '';
    $liveEventHtml = $eventState['isLive'] ? '<span>EN VIVO</span>' : '';
    $ribbonHtml = $ribbonText ? "<div class=\"ribbon__end\">$ribbonText</div>" : '';

    $buttonHtml = renderButton(array(
        'buttonText' => $buttonText,
        'buttonLink' => $buttonLink,
        'isSecondaryButton' => $isSecondaryButton
    ), $eventState);

    return <<<HTML
    <li class="emms__eventCards__list__item">
        <div class="emms__eventCards__list__item__picture">
            <img src="$imageSrc" alt="$imageAlt">
            $postEventHtml
            $ribbonHtml
        </div>
        <div class="emms__eventCards__list__item__text">
            <h3>$title
                $liveEventHtml
            </h3>
            <p>$description</p>
            <span>ONLINE Y GRATUITO</span>
            <div class="emms__eventCards__list__item__text--bottom">
                $buttonHtml
            </div>
        </div>
    </li>
HTML;
}
