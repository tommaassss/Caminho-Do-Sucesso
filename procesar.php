<?php
// Comprobamos si el formulario fue enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturamos los datos enviados por el formulario
    $usuario_id = $_POST['usuario_id'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    // Aquí puedes realizar algún procesamiento de los datos, como guardarlos en una base de datos
    // Por ahora, solo los mostramos en pantalla
    echo "<h1>Dados recebidos:</h1>";
    echo "<p><strong>ID:</strong> " . htmlspecialchars($usuario_id) . "</p>";
<<<<<<< HEAD
    echo "<p><strong>Nome:</strong> " . htmlspecialchars($usuario) . "</p>";
    echo "<p><strong>Senha:</strong> " . htmlspecialchars($senha) . "</p>";
    echo "<p><strong>E-mail:</strong> " . htmlspecialchars($email) . "</p>";
=======
    echo "<p><strong>Usuario:</strong> " . htmlspecialchars($usuario) . "</p>";
    echo "<p><strong>Senha:</strong> " . htmlspecialchars($senha) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
>>>>>>> 19d504a66ee3187f3f3b3586cc2a4f61a95d6289

    $servername = "localhost";
    $database = "login";
    $username = "root";
    $password = "";
    //session_start();
    include('conexao.php');
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    
    
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }
     
    echo "Connected successfully";
     
    $sql = "INSERT INTO usuario (usuario_id, usuario, senha, email) VALUES ('$usuario_id', '$usuario', '$senha', '$email')";
    if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);



}
?>
