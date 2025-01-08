<!DOCTYPE html>
    <html>
        <head>
            <meta charset="ISO-8859-1">
            <title> Validação do Utilizador</title>
            <link rel="stylesheet" href="css/estilosession1.css">
        </head>
    <body>
   
    </body>
</html>


<?php
    //ob_start();
	require_once 'ligacaobd.php';
	
	session_start();

	$_SESSION["sessionmaxtime"]=time();
	
	// conexao a base de dados
	$con = ligaBD();
	
	if($stm = $con->prepare("Select * from usuario where usuario=? and senha= ?"))
	{
		 
		$stm->bind_param("ss",$_POST["utilizador"], $_POST["password"]);
		$stm->execute();
		$stm->store_result();
		 
		if($stm->num_rows>0){
			$_SESSION["login"] = 1;
			$_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"];
            header("Location:mostrarutilizadotor.php");		    	
			
		}else{
			echo "Os dados não são válidos. Aguarde...";
			header("Refresh: 5;url=login.php");
		}

	}	

	
?>