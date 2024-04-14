<?php
require_once "lib/errorCreater.php";
require_once 'lib/sessionstart.php';
require_once 'lib/loadUser.php';
require_once 'lib/loadAdmins.php';
require_once 'lib/loadevents.php';

/**
 * @var string[] $adminList
 * @var string[] $userList
 * @var eventClass[] $events
 */

?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage User</title>
</head>
<body>
    <header>
        <a href="index.php">Back to index</a>
        <h1>Manage User</h1>
        <a href="logout.php">Logout</a>
    </header>
    <main>
        <h2>User List</h2>
        <ul>
            <?php foreach ($userList as $user): ?>
                <li>
                    <p><?= $user ?><br/> <a href="deleteUser.php">Delete</a><br/><a href="adminToggle.php">Admin
                            Toggle</a></p>
                    <?php if (in_array($user, $adminList)): ?>
                        <p>Is Admin</p>
                    <?php endif; ?>
                    <p>Registered Events:</p>
                    <?php foreach ($events as $event): ?>
                        <?php if (in_array($_SESSION['user'], $event->Teilnehmer)): ?>
                            <p><?= $event->name ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="adduser.php">Add User</a>
    </main>
</body>
</html>
