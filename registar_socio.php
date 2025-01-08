<!DOCTYPE html>

            <head>
      				<meta charset="utf-8">
      				<title> Registar S�cio </title>
    		</head>

            <style>
                    .erro{
                      color: red;
                    }
            </style>
            
             
            <body bgcolor="#81BEF7">
                   <div>
                           	<center><h1>Formul&aacute;rio de S&oacute;cios</h1></center>
                           	<p align="center"><img src="socios6.png" alt="" width="300" heigth="300"></p>
                            <?php
                            
                            	require_once 'ligacaoBD.php';
                            	require_once 'testaSessao.php';
                            	
                            	if(testa()){
                            	
                            	if(isset($_GET["id"])){
                            		
                            	    $operacao = "update";
                            	
                            		$con = LigaBD();
                            		$stm= $con->prepare("select * from socio where id_socio=?");
                            		$stm->bind_param("i",$_GET["id"]);
                            		$stm->execute();
                            		
                            		$res = $stm->get_result();
                            		$resultados = $res->fetch_assoc();
                            		
                            		$con->close();
                            		
                            	}else { $operacao = "insert"; }
                            
                            	if($_SERVER["REQUEST_METHOD"]=="POST"){
                            		require("validacao.php");
                            		$validacao = validarFormulario();
                            	}
                            }
                            
                            ?>
                            
                            <table align="center" width="80%"><tr><td width="40%">&nbsp;</td><td>
                            <form action="<?php ($operacao=="update")? $_SERVER["PHP_SELF"] . "?id=" . $_GET["id"] : $_SERVER["PHP_SELF"];?>" method="post">
                                  <b>Nome *:</b><?php 
                                                    if($_POST && in_array("Nome",$validacao))
                                  		               echo "<span class=\"erro\">(Preenchimento obrigat&oacute;rio)</span>";
                                  		      ?><br /><input type="text" name="Nome" value="<?php 
                                                                                                  if($_POST){
                                                                                                              if(!empty($_POST["Nome"]))
                                                                                                                  echo $_POST["Nome"];
                                                                                                            }else if ($operacao=="update")
                                                                                                            		  echo $resultados["Nome"];
                                                                                            ?>"><br />
                              
                                  <b><br/>Apelido *:  </b><?php 
                                                        if($_POST && in_array("apelido",$validacao))
                                                            echo "<span class=\"erro\">(Preenchimento obrigat&oacute;rio)</span>";
                                                    ?><br/><input type="text" name="apelido" value="<?php 
                                                                                                          if($_POST)
                                                                                                          {
                                                                                                          	if(!empty($_POST["apelido"]))
                                                                                                          			echo $_POST["apelido"];
                                                                                                           }else if ($operacao=="update")
                                                                                                          		     echo $resultados["apelido"];
                                                                                                          		
                                                                                                    ?>"><br />
                             
                                   <b><br/>Sexo:  </b>
                                   <select name="sexo" id="sexo">
                                   		   <option value="M">Masculino</option>
                                           <option value="F">Feminino</option>
                                           <option value="N">N&atilde;o Declarado</option>
                                   </select><br>
                                   
                                   <?php 
                                          if($_POST)
                                                     {
                                                      if(!empty($_POST["sexo"]))
                                                          echo $_POST["sexo"];
                                                      }else if ($operacao=="update")
                                                               echo $resultados["sexo"];
                                                                                                          		
                                    ?><br />
                                   
                                   
                                   
                                   <b><br/>Email *:  </b><?php 
                                                        if($_POST && in_array("email",$validacao))
                                                            echo "<span class=\"erro\">(Preenchimento obrigat&oacute;rio)</span>";
                                                    ?><br/><input type="text" name="email" value="<?php 
                                                                                                          if($_POST)
                                                                                                          {
                                                                                                          	if(!empty($_POST["email"]))
                                                                                                          			echo $_POST["email"];
                                                                                                           }else if ($operacao=="update")
                                                                                                          		     echo $resultados["email"];
                                                                                                          		
                                                                                                    ?>"><br /><br />
                                   
                 			
                 				   <table>
                 				     <tr><td>
                                           <fieldset width="0">
                                          			  <legend>Quotas pagas :</legend> 
                                        			  <input checked="checked" name="qpagas" type="radio" value="Anual" /> Quota Anual 
                                        			  <input name="qpagas" type="radio" value="Semestral" /> Quota semestral 
                                        			  <input name="qpagas" type="radio"  value="Mensal" /> Quota mensal
                                           </fieldset>
                                     </td></tr>      
                                   </table>	
                                   
                                   <?php 
                                          if($_POST)
                                                     {
                                                      if(!empty($_POST["qpagas"]))
                                                          echo $_POST["qpagas"];
                                                      }else if ($operacao=="update")
                                                               echo $resultados["qpagas"];
                                                                                                          		
                                    ?><br /><br />
                                   
                                   
                 
                   			<br/><p> Campos de preenchimento obrigat&oacute;rio *</p>
                            
                            <br />
                            <input type="submit" value="Adicionar">
                            <input type="reset" value="Limpar">
                            <p>
                            	<a href="mostrarsocio.php" title="Lista de Sócios"><strong><font color="#FFFFFF">Voltar</font></strong></a></p>
                            
                              
                            </form><?php 
                              if($_POST && count($validacao)==0){
                                	
                              	$con = LigaBD();
                              	
                              	if ($operacao=="insert"){
                              		
                            	  	$stm = $con->prepare("insert into socio values (0,?,?,?,?,?)");
                            	  	
                            	  	date_default_timezone_set("Europe/Lisbon");
                            	  	
                            	  	$stm->bind_param("sssss", $_POST["Nome"],$_POST["apelido"],$_POST["sexo"],
                            	  	    $_POST["email"],$_POST["qpagas"]);
                            	  	  	
                            	  	if ($stm->execute()){
                            	  		header("Location: mostrarsocio.php");
                            	  	}else{
                            	  		echo "Ocorreu um erro a inserir o registo.";
                            	  		header("Refresh: 5; url=mostrarsocio.php");
                            	  	}
                              	
                            	 	$stm->close();
                              
                              	}
                              
                              	
                              	if ($operacao=="update"){
                              	
                              		$stm = $con->prepare("update socio set Nome=?, apelido=?, sexo=?, email=?, qpagas=? where id_socio=?");
                              	
                              		$stm->bind_param("sssssi", $_POST["Nome"],$_POST["apelido"],$_POST["sexo"],
                              		                           $_POST["email"],$_POST["qpagas"], $_GET["id"]);
                              			
                              		if ($stm->execute()){
                              			header("Location: mostrarsocio.php");
                              		}else{
                              			echo "Ocorreu um erro a atualizar o registo.";
                              			header("Refresh: 5; url=mostrarsocio.php");
                              		}
                              		 
                              		$stm->close();
                              	
                              	}
                              	$con->close();
                              	
                               }
                              ?>
                              
                   </td></tr></table>      
                </div>
        </body>
</html>

 