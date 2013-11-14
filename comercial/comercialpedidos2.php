<?php //versao antiga sem pagination 



	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_repre($mysqli) == true) {	
	


	
	
	echo <<< _END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

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
                        	<a href="http://www.rixd.com.br/megalabel/comercial/comercial.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
              <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/comercial/comercial.php" target="_self">
                        	<p align="center" class="fontemenu">Adicionar Pedido</p>
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/comercial/comercialpedidos.php" target="_self">
                        	<p align="center" class="fontemenu">Meus Pedidos</p>
                </a>
                         
                        </td>
                        
                        
                  <td valign="top" background="/megalabel/img/menu_2.jpg" width="146px" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/funcoes/logout.php" target="_self">
                         	<p align="center" class="fontemenu">Realizar Logout</p>

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
                
                <table align="center" width="986px" height="478px" border="0" cellpadding="0" cellspacing="0">
                 
                    <tr>
                    	
                        <td valign="top" width="986px" min-height="431px" align="center">
                            

	<div class="boxfila"><div class="headerfila">Pedidos realizados pelo representante: $nome_representante</div>	

_END;
	
	
	$stmt = $mysqli->prepare("SELECT `id_pedido` , `data_pedido` , `nome_cliente` , `cnpj_cliente`
FROM `pedido_megalabel`
NATURAL JOIN cliente_megalabel
WHERE `id_representante` = ?
ORDER BY id_pedido DESC");
$stmt->bind_param('s', $id_representante);
$stmt->execute();
$stmt->store_result();
            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
$stmt->bind_result($id_pedido, $data_pedido, $nome_cliente, $cnpj_cliente);

while($stmt->fetch()){
	      $databr = implode("-",array_reverse(explode("-",$data_pedido)));



	   
	      	      echo <<< _END
	      <div class="pedidofilacomerc">
	       
	      
												    <ul><li>
												          Pedido: $id_pedido -
													      Data: $databr  -
													      Empresa:  $nome_cliente -
													      CNPJ: $cnpj_cliente </li>
													      	      </ul>
													      <div class="btpedido1">	      
													      <form action="comercialverpedido.php" method="post">
													      <input type="hidden" name="id_pedido" value="$id_pedido"/>
													      <input type="submit"  name="verpedido" value="Visualizar pedido"/>										
												          </form>
												
												          
													      
													      </div>
												</div>
													  
	   
_END;
	      	}
	      	$stmt->close();
	      	$mysqli->close();
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
                        	<a href="http://www.rixd.com.br/megalabel/comercial/comercial.php" target="_self">
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
      <form id="form" action="/megalabel/comercial/process_login_comercial.php" name="login_form" method="post" autocomplete="off">
      
<input type="text" class="login" placeholder="Usuário" name="nome_representante" required aria-required="true" title="nomeusuario"   pattern="\S{4,}">
      
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