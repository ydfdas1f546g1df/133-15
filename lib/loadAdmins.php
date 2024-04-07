<?php
$adminloadpre = parse_ini_file("ini/admins.ini", True);
foreach ($adminloadpre as $admin) {
    $adminList[] = $admin['admin'];
}