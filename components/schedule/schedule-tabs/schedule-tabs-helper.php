<?php

//TODO: Abstraer ecommerceStates a un getter que pase el state del currentEvent para volver agnostica la genda de eventos

function render_schedule_tabs($digitalTrendsStates, $days, $dayDuring)
{
    include __DIR__ . '/schedule-tabs.php';
}
