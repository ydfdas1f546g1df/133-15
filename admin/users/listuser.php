<?php
require_once "lib/errorCreater.php";
require_once 'lib/sessionstart.php';
require_once 'classes/eventListClass.php';
require_once 'classes/userListClass.php';

$events = new eventListClass();
$users = new userListClass();


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
        <a href="../../index.php">Back to index</a>
        <h1>Manage User</h1>
        <a href="../../logout.php">Logout</a>
        <a href="adduser.php">Add User</a>
    </header>
    <main>
        <h2>User List</h2>
        <ul>
            <?php foreach ($users->userClassList as $user): ?>
                <li id="<?= $user->id ?>">
                    <p><?= $user->name ?><br/> <a href="deleteUser.php?id=<?= $user->id ?>">Delete</a><br/><a href="adminToggle.php?id=<?= $user->id ?>">Admin
                            Toggle</a></p>
                    <?php if ($user->isAdmin): ?>
                        <p>Is Admin</p>
                    <?php endif; ?>
                    <p>Registered Events:</p>
                    <?php foreach ($events->eventClassList as $event): ?>
                        <?php if (in_array($_SESSION['user'], $event->Teilnehmer)): ?>
                            <p><?= $event->name ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </li>
            <?php endforeach; ?>
        </ul>

    </main>
</body>
</html>
