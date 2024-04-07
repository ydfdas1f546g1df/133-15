<?php
require_once 'lib/sessionstart.php';
/**
 * @var string[] $adminList
 */
//TODO admin secure
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
</head>
<body>
    <header>
        <h1>Admin Page</h1>
        <a href="logout.php">Logout</a>
    </header>
    <main>
        <h2>Admin Functions</h2>
        <ul>
            <li><a href="manageevent.php">Manage Event</a></li>
            <li><a href="listuser.php">Manage Users</a></li>
        </ul>
    </main>
    <footer>

    </footer>
</body>
</html>

