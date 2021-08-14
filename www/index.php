<?php
session_start();
if($_SESSION['logado'] != "S") {
    header("Location: /login.php");
    exit;
} else {
    header("Location: /index2.php");
    exit;
}
require_once "model/Db.class.php";
$Db = new Db;
$Db->m_connect();

$Db->m_close();
?>



<a href="auth/logoff.php">Logout</a>