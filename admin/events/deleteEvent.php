<?php
$sub = 2;
require_once '../../lib/sessionstart.php';
require_once '../../lib/requireAdmin.php';
require_once "../../lib/errorCreater.php";
require_once '../../classes/eventListClass.php';
require_once '../../classes/userListClass.php';

$events = new eventListClass();
$users = new userListClass();

if (!isset($_GET['id'])) {
    echo "No event selected";
    header('location:manageevent.php');
    exit;
}
$id = $_GET['id'];

if (isset($events->eventClassList[$id])) {
    unset($events->eventClassList[$id]);
    $events->write();
    echo "Event deleted";
} else {
    echo "Event not found";
}


echo '<br>';
echo '<a href="manageevent.php">Back to events</a>';

//echo '<br>';
//echo "<pre>";
//print_r($events);
//echo "</pre>";
header('location:manageevent.php');