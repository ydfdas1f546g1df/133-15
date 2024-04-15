<?php
require_once "lib/errorCreater.php";
require_once "lib/sessionstart.php";
//require_once 'lib/loadevents.php';
require_once 'lib/lib.php';
require_once 'classes/eventListClass.php';

$events = new eventListClass();

if (!isset($_POST['id'])) {
    header('Location: events.php');
    exit;
}


if (in_array($_SESSION['user'], $events->eventClassList[$_POST['id']]->Teilnehmer)) {
    $key = array_search($_SESSION['user'], $events->eventClassList[$_POST['id']]->Teilnehmer);

    if (isset($key)) {
        unset($events->eventClassList[$_POST['id']]->Teilnehmer[$key]);
    }



    $events->write();

    echo "You are now unregistered for this event";
} else {
    echo 'You are not registered for this event';
}
echo '<br>';
echo '<a href="events.php">Back to events</a>';
header('location:events.php');