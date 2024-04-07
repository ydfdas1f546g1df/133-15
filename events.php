<?php
/**
 * @var eventClass[] $events
 */
require_once "lib/sessionstart.php";
require_once 'lib/loadevents.php';


?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/events.css">
    <title>Document</title>
</head>
<body>
<header>
    <a href="index.php">Back to index</a>
    <h1>Event Liste</h1>
    <a href="logout.php">Logout</a>
    </header>
<ul>
    <?php foreach ($events as $event): ?>
        <li>
            <a href="event.php?name=<?= $event->name ?>">

                <h3><?= $event->name ?></h3>
                <p><?= $event->description ?></p>
                <p>Price: <?= $event->price ?> CHF</p>
                <p>Location: <?= $event->location ?></p>
                <p>Start: <?= date('d.m.Y H:i', $event->startdate) ?></p>
                <p>End: <?= date('d.m.Y H:i', $event->enddate) ?></p>
                <p>Type: <?= $event->Type ?></p>
                <p>Capacity: <?= $event->Capacity - count($event->Teilnehmer) ?></p>

            </a>
        </li>
    <?php endforeach; ?>
</body>
</html>
