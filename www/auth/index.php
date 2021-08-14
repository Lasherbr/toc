<?php
session_start();
require_once "../model/User.class.php";
$User = new User;
if($_SESSION['logado'] == "S") {
    header("Location: /index2.php");
    exit;
}
if(isset($_POST['logar'])) {
    // Valida dados
    if(ctype_alnum($_POST['nome'])) {
        $User->user = $_POST['nome'];
    } else {
        header("Location: /login.php");
        exit;
    }
    if(ctype_alnum($_POST['senha'])) {
        $User->password = $_POST['senha'];
    } else {
        header("Location: /login.php");
        exit;
    }
    if($User->Auth()) {
        $_SESSION['logado'] = "S";
    } 
    
        header("Location: /");
        exit;

}
?>

