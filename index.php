<?php
require_once 'lib/sessionstart.php';
require_once 'lib/loadevents.php';
require_once 'lib/loadAdmins.php';
/**
 * @var eventClass[] $events
 * @var string[] $adminList
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="logout.php">Logout</a>
        <h1>Willkommen</h1>
        <a></a>
    </header>
    <ul>
        <li><a href="events.php">List Events</a></li>
        <?php if (in_array($_SESSION['user'], $adminList)): ?>
            <li><a href="admin.php">Admin</a></li>
        <?php endif; ?>
    </ul>
    <h2>Your Events</h2>
    <ul class="yourevents">
        <?php foreach ($events as $event): ?>
            <?php if (in_array($_SESSION['user'], $event->Teilnehmer)): ?>
                <li>
                    <a href="event.php?name=<?= $event->name ?>">
                        <h3><?= $event->name ?></h3>
                        <div class="grid-container">
                            <div class="grid-item">Location:</div>
                            <div class="grid-item"><?= $event->location ?></div>
                            <div class="grid-item">Start:</div>
                            <div class="grid-item"><?= date('d.m.Y H:i', $event->startdate) ?></div>
                            <div class="grid-item">End:</div>
                            <div class="grid-item"><?= date('d.m.Y H:i', $event->enddate) ?></div>
                            <div class="grid-item">Type:</div>
                            <div class="grid-item"><?= $event->Type ?></div>
                        </div>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>
