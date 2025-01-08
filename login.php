<!DOCTYPE html>

	<head>
			<meta charset="UTF-8">
			<title>Login</title>
	</head>
		
	
	
	<body bgcolor="#A9E2F3">
      <center>
      	<h1><b>Valida&ccedil;&atilde;o de Utilizadores - @RuiBrotas - </b></h1>	
        <table width="60%">
                <tr>
                    <td>&nbsp;</td>
                	<td width="40%"><img src="socios8.png" alt="" width="200" height="200"> </td>
        		    <td width="50%">
                		<form action="session.php" method="post">
                		
                			<b>Nome do Utilizador:</b><br /><input type="text" name="utilizador" id="utilizador" placeholder="registe o utilizador" size="25"><br /><br />
                			<b>Palavra-Passe:  </b><br/><input type="password" name="password" id="password" placeholder="registe a palavra-passe" size="26"><br /><br />
                			
                			<input type="submit" value="Entrar">
						

                			<input type="reset" value="Limpar dados"> 
                		
                		</form>

						<form action="registar_utilizador.php" method="post">
					
						<input type="submit" value="Registar">

					
					</form>

                	</td>	
        		</tr>
		</table>
	  </center>	
	</body>
</html>