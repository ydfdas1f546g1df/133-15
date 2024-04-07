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


if (!in_array($_SESSION['user'], $events[$_POST['name']]->Teilnehmer)) {
    $events[$_POST['name']]->Teilnehmer[] = $_SESSION['user'];

    $events[$_POST['name']]->write();

    echo "You are now registered for this event";
} else {
    echo 'You are already registered for this event';

}
echo '<br>';
echo '<a href="events.php">Back to events</a>';



