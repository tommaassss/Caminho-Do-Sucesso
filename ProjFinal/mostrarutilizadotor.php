<?php 
        error_reporting(1);
?>

<!DOCTYPE html>

    <head>
    		<meta charset="ISO-8859-1">
    		<title>Mostrar Utilizadores</title>
    		
    
    		<style>
                    table, td, th {
                    	border: 1px solid #ddd;
                    	text-align: Left;
                    }
                    table{
                    	border-collapse: collapse;
                        width: 100%;
                    }
                    th, td{
                    padding: 15px;
                    }
            </style>
    
    </head>
    <body bgcolor="#CEE3F6">
    	  
    
    </body>
</html>


<?php
ob_start();

    $servername = "127.0.0.1";
  $database = "login";
  $username = "root";
  $password = "";
  session_start();
  include('conexao.php');

       // if(testa())
       // {
            if($con=LigaBD())
            {
                
                if(isset($_GET["id"]))
                {
                    $stm = $con->prepare("delete from utilizadores where id_utilizador=?");
                    $stm->bind_param("i",$_GET["id_utilizador"]);
                    $stm->execute();
                }
                
                $query = $con->query("select * from utilizador");
                
                echo '<h1><center><font color= "#08088A"> Gest&atilde;o de S&oacute;cios </font></h1></center><br />';
                echo '<center><img src="socios7.png" alt="" width="200" height="200"></center>';
                
                //echo '<p align="right"><h4><a href="login.php">Login</a>&nbsp;&nbsp;<a href="registar_socio.php">Registar S&oacute;cio</a></h4></p><br></br>';
  
                echo '<table style="border:2 border-color:#000000"><tr><th>Nome de s&oacute;cio </th><th>Sobrenome </th><th>Sexo </th><th>Email
                </th><th>Quotas pagas </th><th>Editar </th><th>Eliminar </th></tr>';
                
                               
                while($resultados = $query->fetch_assoc())
                {                                    
                    echo "<tr><td>" . $resultados['Nome'] . "</td><td>" . $resultados['password'] . "</td><td>" .
                        $resultados['email'] . "</td><td>" .
                        $resultados['qpagas'] . "</td><td><a href = 'registar_utilizador.php?id=" .
                        $resultados['id_socio'] . "'>Editar <a></td><td><a href ='mostrarutilizador.php?id=" .
                        $resultados['id_socio'] . "'>Eliminar<a></td>";
                }
                
                echo "</table>";
                $con->close();
            }
            
            echo "<br></br>";
            
       // }
        
   
        ob_end_flush();

?>
