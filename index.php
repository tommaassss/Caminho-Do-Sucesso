<?php
// Conecta ao banco de dados
$conn = new mysqli("localhost", "root", "", "meu_banco");

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";
?>
