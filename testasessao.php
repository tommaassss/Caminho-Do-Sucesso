<?php
function testa()
{
    session_start();
    // Verificação da sessão
    if (isset($_SESSION["login"]) && $_SESSION["login"] == 1) {
        if (isset($_SESSION["browser"]) && $_SESSION["browser"] == $_SERVER["HTTP_USER_AGENT"]) {
            return true;
        } else {
            session_destroy();
            echo "A sessão expirou. Aguarde...";
            header("Refresh: 5; url=login.php");
            return false;
        }
    }
    echo "A sessão não está ativa.";
    header("Refresh: 5; url=login.php");
    return false;
}
?>
