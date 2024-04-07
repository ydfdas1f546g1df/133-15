<?php

require_once "classes/user.php";
require_once "lib/loadAdmins.php";
/**
 * @var string[] $adminList
 */

$filePath = "json/users.json";
$fileContent = file_get_contents($filePath);
$jsonObject = json_decode($fileContent);

//echo "<pre>";
//print_r($jsonObject);
//echo "</pre>";

foreach ($jsonObject->users as $user) {
    $userListObjects[$user->name] = new user($user->name, $user->LastLogin, in_array($user->name, $adminList), $user->LastIP);
}

//echo "<pre>";
//print_r($userListObjects);
//echo "</pre>";