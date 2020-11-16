<?php
session_start();
// session_unset($_SESSION['cus_id']);
// session_unset($_SESSION['$id']);
// session_destroy($_SESSION['id']);
session_unset();
session_destroy();
header("Location: login.php");
?>