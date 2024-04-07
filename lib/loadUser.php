<?php
require_once "classes/user.php";
require_once "lib/loadAdmins.php";
/**
 * @var string[] $adminList
 */
$userLoadPre = parse_ini_file("ini/users.ini", True);
$userList = array_keys($userLoadPre);
$userListObjects = [];
foreach ($userList as $username => $user) {
    $userListObjects[$user] = new user($username, $user['LastLogin'], in_array($username, $adminList), $user['LastIP'], $user['LastFalseLogin1'], $user['LastFalseLogin2'], $user['LastFalseLogin3']);
}