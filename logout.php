`<?php
require_once "lib/errorCreater.php";
session_start();
session_destroy();
echo "Logout erfolgreich!";
echo "<br/><a href='login.php'>Login</a>";
setcookie("user", "", time() - 3600);
?>
