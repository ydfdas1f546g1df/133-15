<?php
require_once "lib/errorCreater.php";
require_once "lib/sessionstart.php";
//require_once "lib/loadevents.php";
require_once 'classes/eventListClass.php';

$events = new eventListClass();


if (isset($_GET['id'])) {
    $event = $events->eventClassList[$_GET['id']];
} else {
    header('Location: events.php');
    exit;
}

?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/event.css">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="events.php">Back to events</a>
        <h1><?= $event->name ?></h1>
        <a href="logout.php">Logout</a>
    </header>
    <main>
        <p><?= $event->description ?></p>
        <div class="grid-container">
            <div class="grid-item">Price</div>
            <div class="grid-item"><?= $event->price ?> CHF</div>
            <div class="grid-item">Location</div>
            <div class="grid-item"><?= $event->location ?></div>
            <div class="grid-item">Start</div>
            <div class="grid-item"><?= date('d.m.Y H:i', $event->startdate) ?></div>
            <div class="grid-item">End</div>
            <div class="grid-item"><?= date('d.m.Y H:i', $event->enddate) ?></div>
            <div class="grid-item">Type</div>
            <div class="grid-item"><?= $event->Type ?></div>
            <div class="grid-item">Capacity</div>
            <div class="grid-item"><?= $event->Capacity - count($event->Teilnehmer) ?></div>
        </div>
        <?php if ($event->Capacity - count($event->Teilnehmer) > 0 && !(in_array($_SESSION['user'], $event->Teilnehmer))): ?>
            <form action="register.php" method="post">
                <input type="hidden" name="id" value="<?= $event->id ?>">
                <input type="submit" value="Register">
            </form>
        <?php endif; ?>
        <?php if (in_array($_SESSION['user'], $event->Teilnehmer)): ?>
            <form action="unregisterx.php" method="post">
                <input type="hidden" name="id" value="<?= $event->id ?>">
                <input type="submit" value="Unregister">
            </form>
        <?php endif; ?>
    </main>
</body>
</html>
