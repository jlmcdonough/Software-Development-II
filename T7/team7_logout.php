<?php
session_start();
session_destroy();
header('Location: team7_login.php');
exit;
?>

<!---
VERSION: 0.1.8 Created page so that admin's can logout
--->