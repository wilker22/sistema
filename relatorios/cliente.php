<?php
	
    include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_relat($mysqli) == true) {

				 		if(isset($_POST['addcliente']) ){

                if ($nome_cliente == "" || $cnpj_cliente == "" || $endereco_cliente == "" || $bairro_cliente == "" || $telefone_cliente == "" || $ie_cliente == "" || $cep_cliente == "" || $estado_cliente == "" || $cidade_cliente == "" || $endereco_entrega_cliente == "")
        $error = "Algum Campo ficou em branco!<br />";
        
        else
    {
    $stmt = $mysqli->prepare("SELECT * FROM  `cliente_megalabel` WHERE  `cnpj_cliente` = ?");
$stmt->bind_param('s', $cnpj_cliente);
$stmt->execute();
$stmt->store_result();

        if ($stmt->num_rows > 0){
            $error = "O Cliente já existe!<br />";
            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
            $stmt->close();
            }
        else
		  {
	

	$stmt = $mysqli->prepare("INSERT INTO cliente_megalabel (`id_cliente`, `nome_cliente`, `cnpj_cliente`, `endereco_cliente`, `bairro_cliente`, `telefone_cliente`, `ie_cliente`, `cep_cliente`, `estado_cliente`, `cidade_cliente`, `endereco_entrega_cliente`) VALUES (NULL, ? , ?, ?, ?, ?, ?, ?, ?, ?, ? )");

		$stmt->bind_param('ssssssssss', $nome_cliente, $cnpj_cliente, $endereco_cliente, $bairro_cliente, $telefone_cliente, $ie_cliente, $cep_cliente, $estado_cliente, $cidade_cliente, $endereco_entrega_cliente);
		$stmt->execute();
		$stmt->store_result();

           if ($stmt->error ) printf("Error: %s.\n", $stmt->error);	
		$stmt->close();
		
		$error = "Cliente Incluido!";
		
		$url = 'http://www.rixd.com.br/megalabel/relatorios/cliente.php';
echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    	}
	}
    }


echo <<< _END
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;" />
<title>Megalabel</title>

<link rel="stylesheet" href="/megalabel/global.css">
<link rel="stylesheet" href="/megalabel/style.css">

	<script>
 </script>
    

</head>


<body topmargin="0" background="/megalabel/img/bg.jpg">	
<center>
				
                
                <table align="center" width="986px" height="125px" border="0" cellpadding="0" cellspacing="0">
                	
                    
                    <tr>
                    	
                        <td valign="top" width="986px" height="125px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/relatorios/relatorios.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
                  <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
   	                        	<a href="http://www.rixd.com.br/megalabel/relatorios/relatorios.php" target="_self">
                        	<p align="center" class="fontemenu">Relatorios</p>
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
   	                        	<a href="http://www.rixd.com.br/megalabel/relatorios/desbloqueia.php" target="_self">
                        	                 <p align="center" class="fontemenu">Desbloquear Usuário</p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_2.jpg" width="146px" height="62px" align="center">
                        	 <a href="http://www.rixd.com.br/megalabel/relatorios/cliente.php" target="_self">
                        	<p align="center" class="fontemenu">Incluir Cliente</p>


                            </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_4.jpg" width="100px" height="62px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/relatorios/busca.php" target="_self">
                        	<p align="center" class="fontemenu">Buscar</p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_5.jpg" width="116px" height="62px" align="center">
                        	
                       
                        	<a href="http://www.rixd.com.br/megalabel/funcoes/logout.php" target="_self">
                        	<p align="center" class="fontemenu">Realizar Logout</p>
                </a>
                         
                        </td>
                        
                        <td valign="top" width="356px" height="62px" align="center">
                        	
                        	<img name="Contatos" align="middle" src="/megalabel/img/menu6.jpg" border="0" height="62" width="472" />
                        	
                        </td>
                        
                        
                    </tr>	 
                    
                </table>
                
                <table align="center" width="986px" border="0" cellpadding="0" cellspacing="0">
                 
                    <tr>
                    	
                        <td valign="top" width="986px" align="center">


<div id="box_form_incluir_cliente1">
<form id="form_incluir_cliente" action="cliente.php" method="post">
    <ul>
    <li id="h2cliente" >Cliente</li>
    <li id="erro_cliente">$error</li>
      
      
      
    
      
      
   <li  class="linhaincluircliente" ><label for="nome_cliente">Empresa: </label> <input type="text"  id="nome_cliente" name="nome_cliente" value="$nome_cliente"/>
<label for="telefone_cliente">Telefone: </label> <input type="text" id="telefone_cliente" name="telefone_cliente" value="$telefone_cliente"/>
   </li>
   
   <li class="linhaincluircliente" ><label for="cnpj_cliente">CNPJ:</label> <input  type="text" id="cnpj_cliente" name="cnpj_cliente" value="$cnpj_cliente"/>
<label for="ie_cliente">I.E: </label> <input type="text" id="ie_cliente" name="ie_cliente"  value="$ie_cliente"/></li>
   
   <li class="linhaincluircliente"><label for="endereco_cliente">Endereço: </label> <input  type="text" id="endereco_cliente" name="endereco_cliente" value="$endereco_cliente"/>
<label for="cep_cliente">CEP: </label> <input type="text" id="cep_cliente" name="cep_cliente" value="$cep_cliente"/></li>

   <li class="linhaincluircliente"><label for="bairro_cliente">Bairro: </label> <input  type="text" id="bairro_cliente" name="bairro_cliente" value="$bairro_cliente"/>
<label for="estado_cliente">Estado: </label> <input type="text" id="estado_cliente" name="estado_cliente" value="$estado_cliente"/></li>

   <li class="linhaincluircliente"><label for="endereco_entrega_cliente">End. de entrega: </label> <input  type="text" id="endereco_entrega_cliente_inclu" name="endereco_entrega_cliente" value="$endereco_entrega_cliente"/>
<label for="cidade_cliente">Cidade: </label> <input type="text" id="cidade_cliente" name="cidade_cliente" value="$cidade_cliente"/></li>
   
   <div id="boxbtaddcliente" > 
   <li class="linhaincluircliente"><input type="submit"  id="btaddcliente" name="addcliente"  value="Adicionar Cliente"/></li>
   </div>
   </form>
</div>

_END;

echo <<< _END
</td>
                        
                    </tr>
                    
                    
                                           
                                        
                </table>
                
                
               
               
               
				<table align="center" width="986px" height="39px" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                    	
                        <td width="986px" height="39px" align="center" valign="top">
                            <img align="middle" src="/megalabel/img/rodape.jpg" border="0" height="39" width="986" /> 
                        </td>
                        
                    </tr>	 
                    
                </table>
                
</center>
              
</body>
</html>
_END;

}
else{

echo <<< _END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;" />
<title>Megalabel</title>

<link rel="stylesheet" href="/megalabel/global.css">
<link rel="stylesheet" href="/megalabel/style.css">

	<script>
		
	</script>
    

</head>


<body topmargin="0" background="/megalabel/img/bg.jpg">	
<center>
				
                
                <table align="center" width="986px" height="125px" border="0" cellpadding="0" cellspacing="0">
                	
                    
                    <tr>
                    	
                        <td valign="top" width="986px" height="125px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/relatorios/relatorios.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
                  <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
                        	
                         
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
                        	
                           
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_3.jpg" width="146px" height="62px" align="center">
                        	
                        	<p align="center" class="fontemenu"></p>
                            </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_4.jpg" width="100px" height="62px" align="center">
                        	
                            <p align="center" class="fontemenu"></p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_5.jpg" width="116px" height="62px" align="center">
                        	
                       
                             <p align="center" class="fontemenu"></p>
                </a>
                         
                        </td>
                        
                        <td valign="top" width="356px" height="62px" align="center">
                        	
                        	<img name="Contatos" align="middle" src="/megalabel/img/menu6.jpg" border="0" height="62" width="472" />
                        	
                        </td>
                        
                        
                    </tr>	 
                    
                </table>
                
                <table align="center" width="986px" border="0"  cellpadding="0" cellspacing="0">
                 
                    <tr>
                    	
                        <td valign="top" width="986px"  align="center">
                            
                            
                            
                            <h2 id="h2cliente">FAVOR REALIZAR O LOGIN</h2>
                                                    <div id="formblack">
  
  <div id="formblackheader">
  <span>Login</span>
  </div>
  
  <div id="formcampos">
      <form id="form" action="/megalabel/relatorios/process_login_relat.php" name="login_form" method="post" autocomplete="off">
      
<input type="text" class="login" placeholder="Usuário" name="nome_user" required aria-required="true" title="nomeusuario"   pattern="\S{4,}">
      
      <input type="password" class="login" id="senha" name="p" placeholder="senha" title="Password" required aria-required="true" pattern="\S{4,}">
      
      <input id="submit" type="submit" value="Efetuar Login" name="posted">    
     
      
      </form>
      
  </div>
  
                        </div>                                                           

																

	      	
	      
</td>
                        
                    </tr>
                    
                    
                                           
                                        
                </table>
                
                
               
               
               
				<table align="center" id="rodape"  border="0" cellpadding="0" cellspacing="0">
                    <tr>
                    	
                        <td width="986px" height="39px" align="center" valign="top">
                            <img align="middle" src="/megalabel/img/rodape.jpg" border="0" height="39" width="981" /> 
                        </td>
                        
                    </tr>	 
                    
                </table>
                
</center>
              
</body>
</html>
_END;

	
}	
	
	
	
?>