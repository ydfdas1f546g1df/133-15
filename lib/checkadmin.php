<?php
require_once 'lib/loadAdmins.php';
/**
 * @var string[] $adminList
 */

if (!in_array($_SESSION['user'], $adminList)) {
    header('location:index.php');
    die("You are not an admin");
}