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
    $users->delete($id);

    header("Location: listuser.php");
    exit();
}
?>
<a href="listuser.php">Back</a>
