<?php
session_start();
print_r($_POST);
?>
Autenticacao

<form method="post">
    Nome
<input type=text name=nome>
    Senha
    <input type=text name=senha>
    <input type=submit>
</form>

