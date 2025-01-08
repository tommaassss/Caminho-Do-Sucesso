<?php

function ligaBD()
{
    // Conexão a base de dados
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";
    
    // Corrigir a linha de conexão com a base de dados
    $con = mysqli_connect($hostname, $username, $password, $dbname) or die ('Nao foi possivel conectar');

    // teste da conexão a BD
    if($con->connect_errno != 0){
        echo "Ocorreu um erro no acesso à base de dados: " . $con->connect_error;
        exit;
    }
    return $con;
}

?>
