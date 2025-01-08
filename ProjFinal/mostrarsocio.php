<?php
    require_once 'ligacaobd.php';
    require_once 'testasessao.php';

    if(testa())
    {
        if($con = LigaBD())
        {
            if(isset($_GET["id"]))
            {
                $stm = $con->prepare("delete from socio where id_socio=?");
                $stm->bind_param("i", $_GET["id"]);
                $stm->execute();
            }

            $query = $con->query("select * from socio");

            echo '<h1><center><font color= "#08088A">Gestão de Sócios</font></h1></center><br />';
            echo '<center><img src="socios7.png" alt="" width="200" height="200"></center>';
            echo '<p align="right"><h4><a href="login.php">Login</a>&nbsp;&nbsp;<a href="registar_socio.php">Registar Sócio</a></h4></p><br></br>';

            echo '<table style="border:2 border-color:#000000"><tr><th>Nome de sócio</th><th>Sobrenome</th><th>Sexo</th><th>Email</th><th>Quotas pagas</th><th>Editar</th><th>Eliminar</th></tr>';

            while($resultados = $query->fetch_assoc())
            {                                    
                echo "<tr><td>" . $resultados['Nome'] . "</td><td>" . $resultados['apelido'] . "</td><td>" .
                     $resultados['sexo'] . "</td><td>" . $resultados['email'] . "</td><td>" .
                     $resultados['qpagas'] . "</td><td><a href = 'registar_socio.php?id=" . 
                     $resultados['id_socio'] . "'>Editar<a></td><td><a href ='mostrarsocio.php?id=" .
                     $resultados['id_socio'] . "'>Eliminar<a></td>";
            }

            echo "</table>";
            $con->close();
        }
        echo "<br></br>";
    }

    ob_end_flush();
?>
