<?php
require_once "lib/errorCreater.php";
require_once 'lib/lib.php';
require_once 'classes/userListClass.php';
require_once 'classes/settings.php';
checkPHPVersion(8.3);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $settings = new settings();
    $userList = new userListClass();
    foreach ($userList->userClassList as $user) {
        if ($user->name == $_POST['username']) {
            $tempId = $user->id;
        }
    }
    if (!isset($tempId)) {
        echo "Login fehlgeschlagen";
        echo "<br/><a href='login.php'>Login</a>";
        die();
    }
    $Locked = $userList->userClassList[$tempId]->isLocked;
    $FalseLogins = 0;
    foreach ($userList->userClassList[$tempId]->LastFalseLogin as $key => $LastFalseLogin) {
        if ($LastFalseLogin > time() - 2 * 60 * 60) {
            $FalseLogins++;
        } else {
            unset($userList->userClassList[$tempId]->LastFalseLogin[$key]);
            $userList->write();
        }
    }
    if ($FalseLogins > $settings->FalseLoginAttempts) {
        $Locked = true;
    }
    if (password_verify($_POST['password'], $userList->userClassList[$tempId]->password)) {
        session_start();
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['id'] = $tempId;
        $IP = $_SERVER['REMOTE_ADDR'];
        $time = time();


        $userList->userClassList[$_SESSION['id']]->lastIP = $IP;
        $userList->userClassList[$_SESSION['id']]->lastLogin = $time;
        $userList->write();

        echo "<p>Willkommen, " . $_POST['username'] . "!</p>" . "<br>" . "<a href='index.php'>Homepage</a>";

        header('location:' . ($_GET['redirect'] ?? 'index.php'));

    } else {
        echo "Login fehlgeschlagen";
        echo "<br/><a href='login.php'>Login</a>";
        if (isset($_POST['username'])) {
            $userList->userClassList[$tempId]->LastFalseLogin[] = time();
            $userList->write();
        }
        die();
    }

}
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="./login.php" method="post">
        <label for="username">Username <input type="text" name="username"></label><br/>
        <label for="password">Passwort <input type="password" name="password"></label>
        <br/><input type="submit" value="Login">
    </form>
</body>
</html> 