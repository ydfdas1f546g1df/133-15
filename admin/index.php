<?php
$sub = 1;
require_once "../lib/errorCreater.php";
require_once '../lib/sessionstart.php';
require_once '../lib/lib.php';
require_once '../lib/requireAdmin.php';


?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../css/admin/admin.css">

</head>
<body>
    <header>
        <a href=".. ">Back</a>
        <h1>Admin Page</h1>
        <a href="../logout.php">Logout</a>
    </header>
    <main>
        <h2>Admin Functions</h2>
        <ul>
            <li><a href="events/manageevent.php">Manage Event</a></li>
            <li><a href="users/listuser.php">Manage Users</a></li>
            <li><a href="settingsmanage.php">Manage Settings</a></li>
        </ul>
    </main>
    <footer>

    </footer>
</body>
</html>

