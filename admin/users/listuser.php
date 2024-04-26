<?php
$sub = 2;
require_once "../../lib/errorCreater.php";
require_once '../../lib/sessionstart.php';
require_once '../../classes/eventListClass.php';
require_once '../../classes/userListClass.php';

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
    <link rel="stylesheet" href="../../css/listUsers.css">
</head>
<body>
    <header>
        <a href="../index.php">Back to adminpage</a>
        <h1>Manage User</h1>
        <a href="../../logout.php">Logout</a>

    </header>
    <div class="centerer">
        <main>
            <h2>User List</h2>
            <a href="adduser.php">Add User</a>
            <ul>
                <?php foreach ($users->userClassList as $user): ?>
                    <li id="<?= $user->id ?>">

                        <p>
                            <?= $user->name ?><br/>
                            Last False Login <?php foreach ($user->LastFalseLogin as $fl): echo date(DATE_RFC2822, $fl); endforeach;?><br/>
                            Last Login <?= date(DATE_RFC2822, $user->lastLogin) ?><br/>
                            Is Locked <?= $user->isLocked ? 'Yes' : 'No' ?><br/>
                            Is Admin <?= $user->isAdmin ? 'Yes' : 'No' ?><br/>
                            <br/>
                            <a href="deleteUser.php?id=<?= $user->id ?>">Delete</a><br/>
                            <a href="adminToggle.php?id=<?= $user->id ?>">Admin Toggle</a>
                        </p>
                        <p>Registered Events:</p>
                        <?php foreach ($events->eventClassList as $event): ?>
                            <?php if (in_array($user->id, $event->Teilnehmer)): ?>
                                <a href="../events/manageevent.php#<?= $event->id ?>"><?= $event->name ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

        </main>
    </div>

</body>
</html>
