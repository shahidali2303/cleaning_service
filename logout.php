<?php
setcookie("user_email", "", time() - 3600, "/"); // Expire cookie
header("Location: admin-login.php"); // Redirect to login page
exit();
?>
