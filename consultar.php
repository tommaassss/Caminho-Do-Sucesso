<?php
$servername = "127.0.0.1";
$database = "login";
$username = "root";
$password = "";
session_start();

// Criar a conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Consultar dados de uma tabela
$sql = "SELECT * FROM usuario";
$result = mysqli_query($conn, $sql);

// Verificar se a consulta retornou resultados
if (mysqli_num_rows($result) > 0) {
    // Exibir os dados de cada linha
<<<<<<< HEAD
    while($row = mysqli_fetch_assoc($result)) {
        echo " ID: " . $row["usuario_id"] . " - Nome: " . $row["usuario"] . " - PassWord: " . $row["senha"] . " - E-mail: " . $row["email"] ."<br>";
=======
    while ($row = mysqli_fetch_assoc($result)) {
        echo "  ID: " . $row["usuario_id"] . "     - Nome: " . $row["usuario"] . "    - Senha: " . $row["senha"] . "  - E-mail: " . $row["email"] . "<br>";
>>>>>>> 19d504a66ee3187f3f3b3586cc2a4f61a95d6289
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fechar a conexão
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Consulta</title>
</head>
<body>
    <p></p>
    <form action="index.html" method="POST">
        <button type="submit">Home</button>
    </form>
</body>
</html>