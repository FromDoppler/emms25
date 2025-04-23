<?php

function render_event_day($day, $eventState)
{
    if ($day === 1) {
        // TODO: Revisar logica y contenido al cambiar estado de eventos
?>
        <div class="emms__calendar__date emms__fade-in">
            <div class="emms__calendar__date__country">
                    <p> La transmisión comienza a las</p>
                    <span><img src="/src/img/flag-argentina.png" alt="Argentina">(ARG) 11:00</span>.
                    <p>Si no eres de allí o estarás en otro lado,</p> <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+E-commerce+D%C3%8DA+1&iso=20250428T11&p1=51&ah=6" target="_blank">mira el horario de tu país</a>
            </div>
        </div>
    <?php
    } else if ($day === 2) {
    ?>
        <div class="emms__calendar__date emms__fade-in">
            <div class="emms__calendar__date__country">
                <p> La transmisión comienza a las</p>
                <span><img src="/src/img/flag-argentina.png" alt="Argentina">(ARG) 11:00</span>.
                <p>Si no eres de allí o estarás en otro lado,</p> <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+E-commerce+D%C3%8DA+2&iso=20250429T11&p1=51&ah=6" target="_blank">mira el horario de tu país</a>
            </div>
        </div>
<?php
    }
}
?>
