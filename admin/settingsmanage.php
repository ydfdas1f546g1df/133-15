<?php
$sub = 1;
require_once "../lib/errorCreater.php";
require_once '../lib/sessionstart.php';
require_once '../lib/lib.php';
require_once '../lib/requireAdmin.php';
require_once '../classes/settings.php';
$settings = new Settings();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    echo "POST";
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
    if(isset($_POST['loginAttempts'])) {
//        echo "loginAttempts";
        $settings->FalseLoginAttempts = $_POST['loginAttempts'];
        settype($settings->FalseLoginAttempts, 'integer');
        $settings->write();
    }

    $settings= new Settings();
}

?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../css/admin/settingsManage.css">

</head>
<body>
    <header>
        <a href=".. ">Back</a>
        <h1>Manage Settings</h1>
        <a href="../logout.php">Logout</a>
    </header>
    <main>
        <h2>Settings</h2>
        <form action="./settingsmanage.php" method="post">
            <ul>
                <li>
                    <label for="loginAttempts">Login Attemtps <input name="loginAttempts" type="number" value=<?= $settings->FalseLoginAttempts ?> /></label>

                </li>
                <li>
                    <input type="submit" value="Save" />
                    <button onClick="event.preventDefault();window.location.reload();">Reload Page / Cancel</button>
                    <button onClick="event.preventDefault();console.log('Form submission prevented. Redirecting now.');window.location.href = '.';">Back</button>
                </li>
            </ul>
        </form>
    </main>
</body>
</html>
