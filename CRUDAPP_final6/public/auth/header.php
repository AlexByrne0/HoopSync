<?php
session_start();
if (!isset($_SESSION['Active']) || $_SESSION['Active'] !== true) {
    header("location:../auth/login.php");
    exit;
}
?>
