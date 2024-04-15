<?php
if (!isset($sub)) {
    $sub = 0;
}
$path = str_repeat("../", $sub);

require_once $path . "lib/lib.php";
checkPHPVersion(8.3);
session_start();
if(!isset($_SESSION['user'])){
    header('location:'.$sub*'../'.'login.php?redirect=index.php');
    die();
}

