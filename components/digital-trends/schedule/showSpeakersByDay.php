<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php');

function showEventDatetimeByDay($day, $digitalTrendsStates)
{
    if ($day === 1) {
?>
        <div class="emms__calendar__date emms__fade-in">
            <div class="emms__calendar__date__country">
                <?php if ($digitalTrendsStates['isPre']) : ?>
                    <p> La transmisión comienza a las</p>
                    <span><img src="/src/img/flag-argentina.png" alt="Argentina">(ARG) 11:00</span>.
                    <p>Si no eres de allí o estarás en otro lado,</p> <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+Digital+Trends+2024+%7C+D%C3%ADa+1&iso=20241126T11&p1=51&ah=4" target="_blank">mira el horario de tu país</a>
                <?php endif ?>
                <?php if ($digitalTrendsStates['isLive']) : ?>
                    <p> A partir de las</p>
                    <span><img src="/src/img/flag-argentina.png" alt="Argentina">
                        (ARG) 11:00</p>
                    </span>
                    <p>. Si no eres de allí o estarás en otro lado
                    </p>
                    <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+Digital+Trends+2024+%7C+D%C3%ADa+1&iso=20241126T11&p1=51&ah=4" target="_blank">mira el horario de tu país</a> <?php endif ?>
                <?php if ($digitalTrendsStates['isTransition']) : ?>
                    <!-- <p>El primer día a finalizado. Pronto accederás a las grabaciones</p> -->
                <?php endif ?>
            </div>
        </div>
    <?php
    } else if ($day === 2) {
    ?>
        <div class="emms__calendar__date emms__fade-in">
            <div class="emms__calendar__date__country">
                <?php if (DAY_DURING > 2) : ?>
                    <!-- <p>El segundo día a finalizado. Pronto accederás a las grabaciones</p> -->
                <?php else: ?>
                    <p> La transmisión comienza a las</p>
                    <span><img src="/src/img/flag-argentina.png" alt="Argentina">(ARG) 11:00</span>.
                    <p>Si no eres de allí o estarás en otro lado,</p> <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+Digital+Trends+2024+%7C+D%C3%ADa+2&iso=20241127T11&p1=51&ah=4" target="_blank">mira el horario de tu país</a>
                <?php endif ?>
            </div>
        </div>
    <?php
    } else if ($day === 3) {
    ?>
        <div class="emms__calendar__date emms__fade-in">
            <div class="emms__calendar__date__country">
                <p> La transmisión comienza a las</p>
                <span><img src="/src/img/flag-argentina.png" alt="Argentina">(ARG) 11:00</span>.
                <p>Si no eres de allí o estarás en otro lado,</p> <a href="https://www.timeanddate.com/worldclock/fixedtime.html?msg=EMMS+Digital+Trends+2024+%7C+D%C3%ADa+3&iso=20241128T11&p1=51&ah=4" target="_blank">mira el horario de tu país</a>
            </div>
        </div>
<?php
    }
}
?>

<?php
function showSpeakersByDay($day, $digitalTrendsStates)
{
    $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $speakers = $db->getSpeakersByDay($day); ?>

    <div class="emms__container--lg" role="tabpanel" aria-labelledby="day<?= $day ?>">
        <?php
        showEventDatetimeByDay($day, $digitalTrendsStates);
        ?>
        <p class="emms__calendar-title">ESTE EVENTO YA HA FINALIZADO</p>
        <!-- List -->
        <ul class="emms__calendar__list emms__calendar__list--dk emms__fade-in">
            <?php
            foreach ($speakers as $speaker) :
                $isSpeakerDT = $speaker['event'] === "digital-trends";
                $isSpeakerExposeDebate = $speaker['exposes'] === "debate";
                $allowedExposesTypes = ["conference", "workshop", "networking", "successStory", "interview"];
                $isSpeakerExposesType = in_array($speaker['exposes'], $allowedExposesTypes) || $isSpeakerExposeDebate;
            ?>
                <?php if (($isSpeakerExposesType) && $isSpeakerDT) : ?>
                    <li class="emms__calendar__list__item">
                        <?php
                        $type = $speaker['exposes'] ?? 'default';
                        include($_SERVER['DOCUMENT_ROOT'] . '/components/SpeakerCard.php');
                        ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <?php
        include('mobile-carousel.php')
        ?>
    </div>
<?php
}
showSpeakersByDay(1, $digitalTrendsStates);
showSpeakersByDay(2, $digitalTrendsStates);
showSpeakersByDay(3, $digitalTrendsStates);

?>
