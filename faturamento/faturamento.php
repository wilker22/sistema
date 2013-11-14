<?php
	
	
	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_relat2($mysqli) == true) {

if(isset($_POST['tratar'])){
	
	$stmt = $mysqli->prepare("UPDATE fluxo
SET `id_area`= 5, id_user= ?
WHERE id_pedido= ? ");
    $stmt->bind_param('ss', $id_user, $id_pedido);
    $stmt->execute();
    $stmt->store_result();
                if ($stmt->error ) printf("Error: %s.\n", $stmt->error);	
    $stmt->close();


	$sql=$mysqli->prepare("UPDATE responsaveis SET `id_user` = ? WHERE id_area = ?");	
$sql->bind_param('ss', $id_user, $id_area);
$sql->execute();
$sql->store_result();
	if (!$sql) printf("Error: %s.\n", $sql->error);
$sql->close();


 $url = 'http://www.rixd.com.br/megalabel/faturamento/faturamentofila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';


}	
	
	
	echo <<< _END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; " />
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
                        	<a href="http://www.rixd.com.br/megalabel/faturamento/faturamento.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
                  <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/faturamento/faturamento.php" target="_self">
                        	<p align="center" class="fontemenu">Fila Faturamento</p>
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/faturamento/faturamentofila.php" target="_self">
                        	<p align="center" class="fontemenu">Minha Fila</p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_2.jpg" width="146px" height="62px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/faturamento/busca.php" target="_self">
                        	<p align="center" class="fontemenu">Buscar</p>
                            </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_4.jpg" width="100px" height="62px" align="center">
                        	
                        	<a href="http://www.rixd.com.br/megalabel/funcoes/logout.php" target="_self">
                        	<p align="center" class="fontemenu">Realizar Logout</p>
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
                
                <table align="center" width="986px" border="0" cellpadding="0" cellspacing="0">
                 
                    <tr>
                    	
                        <td valign="top" width="986px" align="center">
	<div class="boxfila"><div class="headerfila">Fila de Faturamento</div>	
<br /> 
_END;



	$sql = $mysqli->prepare("SELECT  `nome_user` ,`id_pedido` ,  `data_pedido` ,  `nome_cliente` ,  `cnpj_cliente`, `ref_trabalho_pedido`, `id_representante`, `id_ordem`
																FROM  `pedido_megalabel` 
																NATURAL JOIN cliente_megalabel
																NATURAL JOIN usuarios_megalabel
																NATURAL JOIN ordem_producao_megalabel
																NATURAL JOIN fluxo																
																WHERE  `id_area` =  '5'
																ORDER BY id_pedido DESC");
																
																$sql->execute();
										$sql->bind_result($nome_user2, $id_pedido, $data_pedido, $nome_cliente, $cnpj_cliente, $ref_trabalho_pedido, $id_representante, $id_ordem);
																$sql->store_result();
	            if ($sql->error ) printf("Error: %s.\n", $sql->error);	

																while( $sql->fetch() ){
																
																																
																$stmt = $mysqli->prepare("SELECT `nome_representante` FROM `representantes` WHERE `id_representante` = ? ");
																$stmt->bind_param('s', $id_representante);
																$stmt->execute();
																$stmt->store_result();
																	if (!$stmt) printf("Error: %s.\n", $stmt->error);
																$stmt->bind_result($nome_representante);	
																$stmt->fetch();
																$stmt->close();


/*
$sql = $mysqli->prepare("SELECT  `nome_user` , `id_ordem`, `id_pedido` ,  `data_pedido` ,  `nome_cliente` ,  `cnpj_cliente`  FROM  `pedido_megalabel`  NATURAL JOIN cliente_megalabel NATURAL JOIN usuarios_megalabel NATURAL JOIN fluxo NATURAL JOIN ordem_producao_megalabel WHERE  `id_area` =  5 ORDER BY id_pedido DESC");
																
																$sql->execute();	
																															
																$sql->bind_result($nome_user2, $id_ordem, $id_pedido, $data_pedido, $nome_cliente, $cnpj_cliente);
																$sql->store_result();
                if ($sql->error ) printf("Error: %s.\n", $sql->error);	
																while( $sql->fetch() ){
	
	*/

	      $databr = implode("-",array_reverse(explode("-",$data_pedido)));


	      	      echo <<< _END
	      <div class="pedidofilacomerc">
	       
	      
												    
												    <ul>
												    												    <li>
												    Representante: $nome_representante - &nbsp; Ref. Trabalho: $ref_trabalho_pedido
												    </li>
												    <br />
												          <li>
  												          Pedido: $id_pedido - &nbsp;
												          Ordem: $id_ordem   												    
												          </li>
												    <li>
												    <li>
_END;

if ($nome_user2=="inicialfaturamento"){
    echo <<< _END
	Usuário Resp: Sem usuário - &nbsp;
_END;
}
else{
   echo <<< _END
Usuário Resp: $nome_user2 - &nbsp;
_END;
}
echo <<< _END
												          
													      Data: $databr  - &nbsp;
													      Empresa:  $nome_cliente - &nbsp;
													      CNPJ: $cnpj_cliente </li>
													      	      </ul>
													      <div class="btpedido1">	
													      <form id="ver_pedido_e_ordem" action="ver_pedido_e_ordem.php" method="post">
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<input type="submit"  name="ver_pedido_e_ordem" value="Visualizar"/>													  												      
</form>      

												
												          <form id="tratapedido"  action="faturamento.php" method="post">						
													      <input type="hidden" name="id_pedido" value="$id_pedido"/>
													      <input type="submit"  name="tratar" value="Tratar"/>													      
</form>

													  
</div>
												</div>
													  
	   
_END;
	      	}
	      	$sql->close();
	      	$mysqli->close();
	      	
	      echo <<< _END
</td>
                        
                    </tr>
                    
                    
                                           
                                        
                </table>
                
                
               
               
               
				<table id="rodape" align="center" width="986px" height="39px" border="0" cellpadding="0" cellspacing="0">
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
                        	<a href="http://www.rixd.com.br/megalabel/faturamento/faturamento.php" target="_self">
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
      <form id="form" action="/megalabel/faturamento/process_login_fatura.php" name="login_form" method="post" autocomplete="off">
      
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