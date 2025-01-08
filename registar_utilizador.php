<?php
require_once 'ligacaoBD.php';
require_once 'testaSessao.php';

if(testa()){
    if(isset($_GET["id"])){
        $operacao = "update";
        $con = LigaBD();

        // Check if the connection is valid
        if ($con === false) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        $stm = $con->prepare("SELECT * FROM Utilizadores WHERE id_utilizador = ?");
        if ($stm === false) {
            die('Prepare failed: ' . $con->error);  // Check if the query preparation fails
        }

        $stm->bind_param("i", $_GET["id"]);
        $stm->execute();
        $res = $stm->get_result();
        $resultados = $res->fetch_assoc();
        $stm->close();
        $con->close();
    } else {
        $operacao = "insert";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require("validacao.php");
        $validacao = validarFormulario();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registar Utilizadores</title>
</head>
<style>
    .erro {
        color: red;
    }
</style>

<body bgcolor="#81BEF7">
    <div>
        <center><h1>Utilizadores</h1></center>
        <p align="center"><img src="socios6.png" alt="" width="300" height="300"></p>
        <table align="center" width="80%">
            <tr>
                <td width="40%">&nbsp;</td>
                <td>
                    <form action="<?php echo ($operacao == "update") ? $_SERVER["PHP_SELF"] . "?id=" . $_GET["id"] : $_SERVER["PHP_SELF"]; ?>" method="post">
                        <b>Utilizador *:</b><?php
                            if ($_POST && in_array("Utilizador", $validacao)) {
                                echo "<span class=\"erro\">(Preenchimento obrigatório)</span>";
                            }
                        ?><br />
                        <input type="text" name="Utilizador" value="<?php 
                            if ($_POST) {
                                if (!empty($_POST["Utilizador"])) {
                                    echo $_POST["Utilizador"];
                                }
                            } else if ($operacao == "update") {
                                echo $resultados["Utilizador"];
                            }
                        ?>"><br />

                        <b><br/>PassWord *:</b><?php 
                            if ($_POST && in_array("palavrapass", $validacao)) 
                                echo "<span class=\"erro\">(Preenchimento obrigatório)</span>";
                        ?><br/>
                        <input type="text" name="palavrapass" value="<?php 
                            if ($_POST) {
                                if (!empty($_POST["palavrapass"])) {
                                    echo $_POST["palavrapass"];
                                }
                            } else if ($operacao == "update") {
                                echo $resultados["palavrapass"];
                            }
                        ?>"><br />

                        <b><br/>Email *:</b><?php 
                            if ($_POST && in_array("email", $validacao)) 
                                echo "<span class=\"erro\">(Preenchimento obrigatório)</span>";
                        ?><br/>
                        <input type="text" name="email" value="<?php 
                            if ($_POST) {
                                if (!empty($_POST["email"])) {
                                    echo $_POST["email"];
                                }
                            } else if ($operacao == "update") {
                                echo $resultados["email"];
                            }
                        ?>"><br /><br />

                        <br/>
                        <input type="submit" value="Adicionar">
                        <input type="reset" value="Limpar">
                        <p>
                            <a href="mostrarutilizadotor.php" title="Utilizadores"><strong><font color="#FFFFFF">Voltar</font></strong></a>
                        </p>
                    </form>

                    <?php 
                    if ($_POST && count($validacao) == 0) {
                        $con = LigaBD();

                        // Check for valid connection
                        if ($con === false) {
                            die('Connection failed: ' . mysqli_connect_error());
                        }

                        if ($operacao == "insert") {
                            // Fixed INSERT query: Ensure the column count matches the value count
                            $stm = $con->prepare("INSERT INTO utilizadores (nome_Utilizador, palavra_chave, email) VALUES (?, ?, ?)");

                            if ($stm === false) {
                                die('Prepare failed: ' . $con->error); // Check if query preparation fails
                            }

                            $stm->bind_param("sss", $_POST["Utilizador"], $_POST["palavrapass"], $_POST["email"]);

                            if ($stm->execute()) {
                                header("Location: mostrarutilizadotor.php");
                            } else {
                                echo "Ocorreu um erro ao inserir o registo.";
                                header("Refresh: 5; url=mostrarutilizadotor.php");
                            }

                            $stm->close();
                        }

                        if ($operacao == "update") {
                            // Fixed UPDATE query: Ensure the column count matches the value count
                            $stm = $con->prepare("UPDATE utilizadores SET nome_Utilizador = ?, password = ?, email = ? WHERE id_utilizador = ?");

                            if ($stm === false) {
                                die('Prepare failed: ' . $con->error); // Check if query preparation fails
                            }

                            $stm->bind_param("sssi", $_POST["Utilizador"], $_POST["palavrapass"], $_POST["email"], $_GET["id"]);

                            if ($stm->execute()) {
                                header("Location: mostrarutilizadotor.php");
                            } else {
                                echo "Ocorreu um erro ao atualizar o registo.";
                                header("Refresh: 5; url=mostrarutilizadotor.php");
                            }

                            $stm->close();
                        }

                        $con->close();
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
