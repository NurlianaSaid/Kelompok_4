<?php
session_start();

// Hapus semua data sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Arahkan ke halaman login
header("Location: login.php");
exit();
?>
