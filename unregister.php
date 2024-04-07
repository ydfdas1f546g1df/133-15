<?php
require_once "lib/sessionstart.php";
require_once 'lib/loadevents.php';
require_once 'lib/lib.php';

/**
 * @var eventClass[] $events
 */

if (!isset($_POST['name'])) {
    header('Location: events.php');
    exit;
}


if (in_array($_SESSION['user'], $events[$_POST['name']]->Teilnehmer)) {
    $key = array_search($_SESSION['user'], $events[$_POST['name']]->Teilnehmer);

    if (isset($key)) {
        unset($events[$_POST['name']]->Teilnehmer[$key]);
        //echo 'true';
    }
    $eventarray = [];


    foreach ($events as $event) {
        $eventarray[$event->name] = $event->exportIniArray();
//        echo '<pre>';
//        var_dump($event->exportIniArray());
//        echo '</pre>';
    }


    write_php_ini($eventarray, 'ini/events.ini');

    echo "You are now unregistered for this event";
} else {
    echo 'You are not registered for this event';
}
echo '<br>';
echo '<a href="events.php">Back to events</a>';