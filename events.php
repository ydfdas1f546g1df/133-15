<?php
require_once "lib/errorCreater.php";

require_once "lib/sessionstart.php";
//require_once 'lib/loadevents.php';
require_once 'classes/eventListClass.php';
//TODO: switch to new eventClassArray
$events = new eventListClass();
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
    <?php foreach ($events->eventClassList as $event): ?>
        <li>
            <a href="event.php?id=<?= $event->id ?>">

                <h3><?= $event->name ?></h3>
                <?php
                if (in_array($_SESSION['user'], $event->Teilnehmer)) {
                    echo '<h4 style="color:green">Registered</h4>';
                }else{
                    echo '<h4 style="color:darkorange">Not registered</h4>';
                }
                ?>
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
