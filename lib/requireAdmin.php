<?php
if(!isset($sub)){
    $sub = 0;
}
$path = str_repeat("../", $sub);
require_once $path ."classes/userListClass.php";

$userList = new userListClass();
$header = 'location:' . $path . 'index.php';

if(!($userList->userClassList[$_SESSION['id']]->isAdmin)){
    echo $userList->userClassList[$_SESSION['id']]->isAdmin;
    echo "You are not an admin!";
    //header('location:' . ($_GET['redirect'] ?? $path .'index.php'));
    die();
}