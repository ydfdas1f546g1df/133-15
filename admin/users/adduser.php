<?php
$sub = 2;
require_once "../../lib/errorCreater.php";
require_once '../../lib/sessionstart.php';
require_once '../../lib/requireAdmin.php';
require_once '../../classes/eventListClass.php';
require_once '../../classes/userListClass.php';

$events = new eventListClass();
$users = new userListClass();
$match = true;
if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password2'])){
    if($_POST['password'] == $_POST['password2']){
        $isAdmin = isset($_POST['isAdmin']) ? 1 : 0;
        $islocked = isset($_POST['islocked']) ? 1 : 0;
        $users->add($_POST['name'], $_POST['password'], $isAdmin, $islocked);
        header("Location: listuser.php");
        exit();
    }
    else{
        $match = false;
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
    <title>User Creation</title>
    <link rel="stylesheet" href="../../css/admin/cuser.css">
</head>
<body>
    <header>
        <a href="listuser.php">Back</a>
        <h1>Create User</h1>
        <a href="../../logout.php">Logout</a>
    </header>
    <div class="centerer">
        <main>
            <form action="adduser.php" method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?= $POST['name'] ?? '' ?>" required>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <label for="password2">Repeat Password:</label>
                <input type="password" name="password2" id="password2" required>
                <label for="isAdmin">Is ADMIN</label>
                <input type="checkbox" name="isAdmin" id="isAdmin" value="<?= isset($_POST['isAdmin']) ? 1 : 0 ?>">
                <label for="islocked" >Is locked</label>
                <input type="checkbox" name="islocked" id="islocked" value="<?= isset($_POST['islocked']) ? 1 : 0 ?>">
                <?php if(!$match): ?>
                    <p style="color:red">Passwords do not match</p>
                <?php endif; ?>
                <input type="submit" value="Create User">
            </form>
        </main>
    </div>
</body>
</html>
