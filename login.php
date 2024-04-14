<?php
require_once "lib/errorCreater.php";
echo "Bitte loggen Sie sich ein";
if (isset($_POST['username']) && isset($_POST['password'])) {
    require_once "lib/loadUser.php";
    /**
     * @var user[] $userListObjects
     */
    if ($userListObjects[$_POST['username']]['password'] == $_POST['password']) {
        session_start();
        $_SESSION['user'] = $_POST['username'];
        $IP = $_SERVER['REMOTE_ADDR'];
        $time = time();

        require_once "lib/loadUser.php";
        /**
         * @var user[] $userListObjects
//         */
//        $userListObjects[$_POST['username']]->LastLogin = $Login;
//        $userListObjects[$_POST['username']]->LastIP = $LastIP;
//        $userListObjects[$_POST['username']]->LastFalseLogin1 = $userListObjects[$_POST['username']]->
//        $userListObjects[$_POST['username']]->write();
        echo "<p>Willkommen, " . $_POST['username'] . "!</p>" . "<br>" . "<a href='index.php'>Homepage</a>";

        header('location:' . ($_GET['redirect'] ?? 'index.php'));

    } else {
        echo "Login fehlgeschlagen";
        if(isset($_POST['username'])){
            $LastFalseLogin = time();
        }
        die();
    }

}
echo "Bitte loggen Sie sich ein";
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