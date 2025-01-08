<?php 
    ob_start();
?>
<html lang="pt">
    <head>
      <meta charset="utf-8">
      <title> Testar conexão á base de dados </title>
    </head>
    
    <?php
    
        require_once 'ligacaobd.php';
        require_once 'testasessao.php';
        
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          require_once("validacao.php");
        
          $validacao = validarFormulario();
         }
        
        /* if(isset($_POST["id"]))
        {
          $operacao = "update";
          $con = ligabd();
          
          $stm = $con->prepare("select from socio were id_socio=?");
          
          $stm->bind_param("i",$_POST["id"]);
          $stm->execute();
          $res = $stm->get_result();
          $resultados = $res->fetch_assoc();
          
          $con->close();
        }
        else
        {
          $operacao = "insert";
        } */
   
    
    ?>
    <body background="socios3.jpg" style="background-repeat: no-repeat";>
      <h3>Formul&aacute;rio de S&oacute;cios</h3>
         <nav><a href="login.php">Login</a>&nbsp;
            <a href="socios.php">S&oacute;cios</a></p> 
         </nav>   
      
      <table>    
      <tr>
         <td>
          <form name="Socios" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                
            <table>    
             
               <tr>
                    <td><label>Nome do s&oacute;cio *: </label> </td>
                    <td><input name="nome" id="nome" size="45" type="text" value ="<?php
               		 
                    		 if ($_POST)
                    		 {
                    				if(!empty($_POST["nome"]))
                    		            echo $_POST["nome"];
                    				
                    		 }
                		 
                        ?>"> 
                        
                        <?php
                              if ($_POST && in_array("nome",$validacao))
                                  echo "<span style=\"color:red;\">(Preenchimento Obrigat&oacute;rio)</span>";
                        ?>
                    </td>
               </tr>
               <br><br>
        
          	   <tr>	
          	   		<td><label>Sobrenome do s&oacute;cio *: </label></td>
           			<td><input type="text" name="apelidosocio" id="apelidosocio" size="45" value="<?php
        		         		 
            		          if ($_POST)
            		          {
            				    if(!empty($_POST["apelidosocio"]))
            		                echo $_POST["apelidosocio"];
            				
                              }		
                        ?>">
        
                        <?php
                              if ($_POST && in_array("apelidosocio",$validacao))
                                  echo "<span style=\"color:red;\">(Preenchimento Obrigat&oacute;rio)</span>";
                        ?>
                   </td>
               </tr>
               <br><br>
        
          	   <tr>	
        			<td> <label>E@Mail *: </label> </td>
            		<td> <input type="text" name="EMail" id="EMail" size="45" value="<?php
        		     		 
        		            if ($_POST)
        		            {
        				        if(!empty($_POST["EMail"]))
        		                    echo $_POST["EMail"];
        		            }		
                        ?>">
                        
          				<?php
                                if ($_POST && in_array("EMail",$validacao))
                                    echo "<span style=\"color:red;\">(Preenchimento Obrigat&oacute;rio)</span>";
                        ?>
                   </td>
               </tr>
               <br><br>
        
          	   <tr>	
        			<td> <label>Sexo : </label></td>
        			<td>
                                <select name="Sexo" id="Sexo">
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                        <option value="N">Não Declarado</option>
                                </select><br>
         			</td>
        	  </tr>
            </table>
        
            <fieldset width="0">
          			  <legend>Quotas pagas :</legend> 
        			  <input checked="checked" name="quotas" type="radio" value="Anual" /> Quota anual 
        			  <input name="quotas" type="radio" value="Melsal" /> Quota semestral 
        			  <input name="quotas" type="radio"  value="Mensal" /> Quota mensal 
           </fieldset>
         
           <p> Campos de preenchimento obrigat&oacute;rio *</p>
        
           <p><input name="enviar" type="submit" value="Submeter candidatura" /></p>
        
         </form>
    </td></tr></table>
      <?php
    
      if($_POST && count($validacao)==0){
          
          if(isset($_POST["Enviar"])){
              
              $stm = $con->prepare("insert into socio value(0,?,?,?,?,?)");
              
              date_default_timezone_set("Europe/Lisbon");
              
              $stm->bind_param("isssss",$_POST["nome"],
                  $_POST["apelidosocio"],$_POST["Sexo"],$_POST["EMail"], 
                  $_POST["quotas"]);
              
              $stm->execute();
              
              echo "<br />Dados Gravados!<br />";
              
            //  $stm->close();
              
          }
          
          header("Location:mostrarsocio.php");
          
      }?>
    </body>
</html>

<?php 
    ob_end_flush();
?>