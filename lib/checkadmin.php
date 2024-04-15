<?php
if (!isset($sub)) {
    $sub = 0;
}
$path = str_repeat("../", $sub);
require_once $path .'lib/loadAdmins.php';
/**
 * @var string[] $adminList
 */


$location = 'location:' . $path . 'index.php';
if (!in_array($_SESSION['user'], $adminList)) {
    header($location);
    die("You are not an admin");
}