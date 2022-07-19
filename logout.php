<?php ob_start(); ?>
<?php session_start(); ?>

<?php
// Unsetting all cookies
setcookie("user_email", "", time() - (60*60*24*7), "/chauka");
header("Location: ./");
?>
 