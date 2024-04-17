<?php
$sub = 2;
require_once '../../lib/sessionstart.php';
require_once '../../lib/requireAdmin.php';
require_once "../../lib/errorCreater.php";
require_once '../../classes/eventListClass.php';
require_once '../../classes/userListClass.php';

$events = new eventListClass();
$users = new userListClass();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../../css/admin/manageEvent.css">

</head>
<body>
    <header>
        <a href=".. ">Back</a>
        <h1>Manage Events</h1>
        <a href="../logout.php">Logout</a>
    </header>
    <main>
        <h2>Event List</h2>
        <button onClick="event.preventDefault();console.log('Form submission prevented. Redirecting now.');window.location.href = './modify.php?id=new';">
            NEW EVENT
        </button>
        <ul>
            <?php foreach ($events->eventClassList as $event): ?>

                <li>
                    <h3><?= $event->name ?></h3>
                    <a href="modify.php?id=<?= $event->id ?>">
                        <button>Modify</button>
                    </a>
                    <a href="deleteEvent.php?id=<?= $event->id ?>">
                        <button>Delete</button>
                    </a>

                    <h4>Registered Users:</h4>
                    <ul>
                        <?php foreach ($users->userClassList as $user): ?>
                            <?php if (in_array($user->id, $event->Teilnehmer)): ?>
                                <li>
                                    <a href="../users/listuser.php#<?= $user->id ?>"><?= $user->name ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
