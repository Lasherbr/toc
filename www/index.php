<?php
session_start();
if($_SESSION['logado'] != "S") {
    header("Location: /auth/");
    exit;
}
require_once "model/Db.class.php";
$Db = new Db;
$Db->m_connect();

$Db->m_close();
?>