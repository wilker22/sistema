<?php //acabereviverordem.php


	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if( login_check_acabamento($mysqli) == true) {

if(isset($_POST['devolve_arte'])){
	
$stmt = $mysqli->prepare("UPDATE fluxo
SET `id_area`=3, `id_user`=11
WHERE id_pedido = ? ");
$stmt->bind_param('s', $id_pedido);
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
    $stmt->close();	  

$url = 'http://www.rixd.com.br/megalabel/revisao/filaacabamentoerevisao.php';
echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

}	



if(isset($_POST['envia_faturamento']) ){
	
		$stmt= $mysqli->prepare("UPDATE fluxo
SET `id_area`=5, `id_user`='14'
WHERE id_pedido= ? ");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
    $stmt->close();	            

$url = 'http://www.rixd.com.br/megalabel/revisao/filaacabamentoerevisao.php';
echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

}


if(isset($_POST['aprov_gera_ordem'])){
	
	$data =  date("Y/m/d");
	
	$stmt=$mysqli->prepare("UPDATE `pedido_megalabel` SET `obs_pedido` = ?  WHERE `id_pedido` =? ");
$stmt->bind_param('ss', $obs_pedido, $id_pedido);
$stmt->execute();
$stmt->store_result();
	        if ($stmt->error ) printf("Error: %s.\n", $stmt->error);	 
$stmt->close();	   

$stmt = $mysqli->prepare("UPDATE `ordem_producao_megalabel` SET `qtd_final` = ? WHERE `id_pedido` = ?");
$stmt->bind_param('ss', $qtd_final, $id_pedido);
$stmt->execute();
$stmt->store_result();
	        if ($stmt->error ) printf("Error: %s.\n", $stmt->error);	 
$stmt->close();	   

        	           
       

$url = 'http://www.rixd.com.br/megalabel/revisao/acabamentoerevisao.php';
echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
	
}





if(isset($_POST['ver_ordem'])){
	

      $stmt=$mysqli->prepare("
SELECT `id_pedido`, `id_ordem`, `data_aprov_ordem`, `largura_papel_ordem`, `metros_lineares_ordem`, `n_engrenagem_ordem`, `faca_ordem`, `rotulo_ordem`, `nome_cliente`, `data_pedido`, `material_pedido`, `acabamento1_pedido`, `acabamento2_pedido`, `pedido_cliente_pedido`, `obs_pedido`, `qtd_pedido`, `data_entrega_prevista`, `qtd_final`, `processo_pedido` 
FROM `ordem_producao_megalabel` 
NATURAL JOIN `pedido_megalabel`
NATURAL JOIN `cliente_megalabel`
WHERE `id_pedido`= ?");
$stmt->bind_param('s', $id_pedido);
$stmt->execute();
$stmt->store_result();
	        if ($stmt->error ) printf("Error: %s.\n", $sql->error);
$stmt->bind_result($id_pedido, $id_ordem, $data_aprov_ordem, $largura_papel_ordem, $metros_lineares_ordem, $n_engrenagem_ordem, $faca_ordem, $rotulo_ordem, $nome_cliente, $data_pedido, $material_pedido, $acabamento1_pedido, $acabamento2_pedido, $pedido_cliente_pedido, $obs_pedido, $qtd_pedido, $data_entrega_prevista, $qtd_final, $processo_pedido);
$stmt->fetch();	        	 
    
    $data_aprov_ordem_br = implode("-",array_reverse(explode("-",$data_aprov_ordem)));

	$data_pedido_br = implode("-",array_reverse(explode("-",$data_pedido)));
	
	$data_entrega_prevista_br= implode("-",array_reverse(explode("-",$data_entrega_prevista)));

$stmt->close();
	
	echo <<< _END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;" />
<title>Megalabel</title>

<link rel="stylesheet" href="/megalabel/global.css">
<link rel="stylesheet" href="/megalabel/style.css">

<script>

    function Verboxordem(){
	
	document.getElementById('box_gerar_ordem').style.display='block'; 
	document.getElementById('box_ordem_altera').style.display='block'; 
	document.getElementById('box_ver_ordem').style.height='623px';
	document.getElementById('alterar_ordem').style.display='none'; 	
	document.getElementById('bt_envia_acab').style.display='none'; 	
	document.getElementById('devolve_arte').style.display='none'; 	

			   
    }
    
    function CancelBoxordem(){
    document.getElementById('box_gerar_ordem').style.display='none'; 
	document.getElementById('box_ver_ordem').style.height='343px';
	document.getElementById('alterar_ordem').style.display='inline';  
    document.getElementById('bt_envia_acab').style.display='inline';   
    document.getElementById('box_ordem_altera').style.display='none'; 			   
    document.getElementById('devolve_arte').style.display='inline';    
    }
    </script>
    

</head>


<body topmargin="0" background="/megalabel/img/bg.jpg">	
<center>
				
                
                <table align="center" width="986px" height="125px" border="0" cellpadding="0" cellspacing="0">
                	
                    
                                       <tr>
                    	
                        <td valign="top" width="986px" height="125px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/revisao/acabamentoerevisao.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
                  <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/revisao/acabamentoerevisao.php" target="_self">
                        	<p align="center" class="fontemenu">Fila Acab. e Revisão</p>
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/revisao/filaacabamentoerevisao.php" target="_self">
                        	<p align="center" class="fontemenu">Minha Fila</p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_2.jpg" width="146px" height="62px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/revisao/busca.php" target="_self">
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

	<div id="box_ver_ordem">
_END;


if($pedido_cliente_pedido == 0){
	echo <<< _END
<div id="header_ver_ordem">Ordem de Serviço: $id_ordem &nbsp; | &nbsp; Pedido:&nbsp; $id_pedido</div>
_END;

}

else{
	
	echo <<< _END
	<div id="header_ver_ordem">Ordem de Serviço: $id_ordem &nbsp; | &nbsp; Pedido:&nbsp; $id_pedido &nbsp; | &nbsp; Pedido cliente: $pedido_cliente_pedido</div>
_END;
}

echo <<< _END

<div class="ver_ordem_esq1">
<ul><li class="boxverpedidotab">
Data de Entrada: $data_pedido_br
</li></ul>
</div>

<div class="ver_ordem_dir1">
<ul><li class="boxverpedidotab">
Data de Aprovação: $data_aprov_ordem_br
</li></ul>
</div>
<div class="ver_ordem_dir2">
<ul><li class="boxverpedidotab">
&nbsp; Data de Entrega Prevista: $data_entrega_prevista_br
</li></ul>
</div>


<div class="ver_ordem_esq">
<ul>
<li class="boxverpedidotab">
Processo Pedido: $processo_pedido
</li>
<li class="boxverpedidotab">
Quantidade: $qtd_pedido 
</li>

<li class="boxverpedidotab">
Largura Papel: $largura_papel_ordem
</li>
<li class="boxverpedidotab">
Metros Lineares: $metros_lineares_ordem
</li>
<li class="boxverpedidotab">
Engrenagem Nº: $n_engrenagem_ordem
</li>
<li class="boxverpedidotab">
Quantidade Final: $qtd_final
</li>
<li class="boxverpedidotab">
Faca: $faca_ordem
</li>
<li class="boxverpedidotab">
Rotulo: $rotulo_ordem
</li>
</ul>
</div>

<div class="ver_ordem_dir">
<ul>
<li class="boxverpedidotab">
Cliente: $nome_cliente
</li>
<li class="boxverpedidotab">
Material/Fabri.: $material_pedido
</li>
<li class="boxverpedidotab">
Acabamento 1: $acabamento1_pedido
</li>
<li class="boxverpedidotab">
Acabamento 2: $acabamento2_pedido
</li>
<li id="obs_ver_ordem">Outros: $obs_pedido</li>
</ul>
<ul>
<li>
<div class="btpedido1">
<input  id="alterar_ordem" type="submit" name="alterar_ordem" value="Alterar Ordem" onclick="Verboxordem()"/>
<form action="acabereviverordem.php" method="post">
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<input id="bt_envia_acab" type="submit" id="envia_faturamento" name="envia_faturamento" value="Enviar para Faturamento"/>
</form>

<form action="acabereviverordem.php" method="post">
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<input id="devolve_arte" type="submit"  name="devolve_arte" value="Devolver para Arte"/>
</form>
</div>
</li>
</ul>
</div>

<ul>
<li id="box_ordem_altera" style="display:none">
Alterações
</li>
</ul>
        </ul>
<div id="box_gerar_ordem" style="display:none">
<form action="acabereviverordem.php" method="post">
<input type="hidden" name="id_pedido" value="$id_pedido"/>

<div class="ver_ordem_esq">
<ul>
<li class="boxverpedidotab">
Data de Entrada: $data_pedido_br
</li>
<li class="boxverpedidotab">
Data de Aprovação: $data_aprov_ordem_br
</li>


<li class="boxverpedidotab">
Largura Papel: $largura_papel_ordem
</li>
<li class="boxverpedidotab">
Metros Lineares: $metros_lineares_ordem
</li>
<li class="boxverpedidotab">
Engrenagem Nº: $n_engrenagem_ordem
</li>



<li class="boxverpedidotab">
<label for="qtd_pedido">Quantidade Final:</label><input type="text" name="qtd_final" id="qtd_final" value="$qtd_final"/> 
</li>

<li class="boxverpedidotab">
Faca: $faca_ordem
</li>

<li class="boxverpedidotab">
Rotulo: $rotulo_ordem
</li>

</ul>
</div>

<div class="ver_ordem_dir">
<ul>
<li class="boxverpedidotab">
Cliente: $nome_cliente
</li>
<li class="boxverpedidotab">
Material/Fabri.: $material_pedido
</li>
<li class="boxverpedidotab">
Acabamento 1: $acabamento1_pedido
</li>
<li class="boxverpedidotab">
Acabamento 2: $acabamento2_pedido
</li>
<li id="obs_ver_ordem" >
<textarea rows="3" cols="40" maxlength="240" name="obs_pedido" id="obs_ver_ordem">$obs_pedido</textarea>
</li>
</ul>
</div>
<ul>
<li class="bt_centro">
<input type="hidden" name="id_ordem" value="$id_ordem"/>
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<input type="submit" name="aprov_gera_ordem" value="alterar"/>

<input id="cancel_ordem" type="button"  name="cancel_ordem" value="Cancelar" onclick="CancelBoxordem()"/> 
</li>
</ul>

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
                            <img align="middle" src="/megalabel/img/rodape.jpg" border="0" height="39" width="981" /> 
                        </td>
                        
                    </tr>	 
                    
                </table>
                
</center>
              
</body>
</html>
_END;
	
	}
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
                        	<a href="http://www.rixd.com.br/megalabel/revisao/acabamentoerevisao.php" target="_self">
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
      <form id="form" action="/megalabel/revisao/process_login_revisao.php" name="login_form" method="post" autocomplete="off">
      
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