<?php
$sub = 2;
require_once "../../lib/errorCreater.php";
require_once '../../lib/sessionstart.php';
require_once '../../lib/requireAdmin.php';
require_once '../../classes/eventListClass.php';
require_once '../../classes/userListClass.php';

$events = new eventListClass();
$users = new userListClass();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $users->userClassList[$id]->isAdmin = !$users->userClassList[$id]->isAdmin;
    $users->write();
    header("Location: listuser.php");
    echo "User toggled";
    echo "<a href='listuser.php'>Back</a>";
    exit();
}
