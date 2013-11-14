<?php //pcpverpedido.php


	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");


	sec_session_start();
	
if(login_check_pcp($mysqli) == true) {
    
            
      
if(isset($_POST['dir_arte'])){
	
$id_pedido = $_POST['id_pedido'];

	list($id_user2,$nome_user2) = explode(",",$_POST['user_arte'] );
	
	$stmt = $mysqli->prepare("UPDATE fluxo
SET `id_area`=3, id_user= ?
WHERE id_pedido= ? ");
    $stmt->bind_param('ss', $id_user2, $id_pedido);
    $stmt->execute();
    $stmt->close();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
    $mysqli->close();


$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';


}	

if (isset($_POST['cancela_pedido'])){
	
	$id_pedido = $_POST['id_pedido'];
	$id_cancel = "64";
	$area_cancel =  "10";
		
	$stmt = $mysqli->prepare("UPDATE fluxo
SET `id_area`= ?, id_user= ?
WHERE id_pedido= ? ");
    $stmt->bind_param('sss', $area_cancel, $id_cancel, $id_pedido);
    $stmt->execute();
    $stmt->close();
	if (!$stmt) printf("Error: %s.\n", $stmt->error);
    $mysqli->close();


$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

	
	
	
}



 
   if (isset($_POST['verpedido'])){
   
$id_pedido = $_POST['id_pedido'];
   
   $stmt = $mysqli->prepare("SELECT   id_cliente ,  id_pedido ,  data_pedido ,  email_cliente_pedido ,  qtd_pedido ,  valor_faca_pedido ,  valor_cyrel_pedido ,  valor_milheiro_pedido , processo_pedido ,  trabalho_pedido ,  obs_pedido ,  pedido_cliente_pedido ,  material_pedido ,  acabamento1_pedido ,  acabamento2_pedido ,  rotulagem_pedido ,  id_representante ,   cond_pag_pedido ,  end_cobranca_pedido ,  opc_faturamento_pedido ,  tipo_frete_pedido ,  transp_frete_pedido ,   cnpj_frete_pedido ,  tel_frete_pedido ,  cid_frete_pedido ,  est_frete_pedido ,   empresa_nri_pedido ,  cnpj_nri_pedido ,  endereco_nri_pedido ,  bairro_nri_pedido ,   telefone_nri_pedido ,  ie_nri_pedido ,  cep_nri_pedido ,  estado_nri_pedido ,   cidade_nri_pedido ,  nome_cliente ,  cnpj_cliente ,  endereco_cliente ,  bairro_cliente ,  telefone_cliente ,  ie_cliente ,  cep_cliente ,  estado_cliente ,  cidade_cliente ,  endereco_entrega_cliente, ref_trabalho_pedido, cond_pag_pedido1, cond_pag_pedido2  
FROM   pedido_megalabel  
NATURAL JOIN cliente_megalabel
WHERE   id_pedido  = ? ");
   $stmt->bind_param('s', $id_pedido);
    $stmt->execute();
        $stmt->bind_result($id_cliente, $id_pedido, $data_pedido, $email_cliente_pedido, $qtd_pedido, $valor_faca_pedido, $valor_cyrel_pedido, $valor_milheiro_pedido,$processo_pedido, $trabalho_pedido, $obs_pedido, $pedido_cliente_pedido, $material_pedido, $acabamento1_pedido, $acabamento2_pedido, $rotulagem_pedido, $id_representante,  $cond_pag_pedido, $end_cobranca_pedido, $opc_faturamento_pedido, $tipo_frete_pedido, $transp_frete_pedido,  $cnpj_frete_pedido, $tel_frete_pedido, $cid_frete_pedido, $est_frete_pedido,  $empresa_nri_pedido, $cnpj_nri_pedido, $endereco_nri_pedido, $bairro_nri_pedido,  $telefone_nri_pedido, $ie_nri_pedido, $cep_nri_pedido, $estado_nri_pedido,  $cidade_nri_pedido, $nome_cliente, $cnpj_cliente, $endereco_cliente, $bairro_cliente, $telefone_cliente, $ie_cliente, $cep_cliente, $estado_cliente, $cidade_cliente, $endereco_entrega_cliente, $ref_trabalho_pedido, $cond_pag_pedido1, $cond_pag_pedido2);
        $stmt->store_result();
        $stmt->fetch();


    	if (!$stmt) printf("Error: %s.\n", $sql->error);

        $stmt->close();
$databr = implode("-",array_reverse(explode("-",$data_pedido)));



$stmt= $mysqli->prepare("SELECT `nome_representante` FROM `representantes` WHERE `id_representante` = ? ");
$stmt->bind_param('s', $id_representante);
$stmt->execute();
$stmt->bind_result($nome_representante);
$stmt->fetch();
if (!$stmt) printf("Error: %s.\n", $sql->error);
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

function Verboxaltera(){
	
	document.getElementById('boxalterapedido').style.display='block'; 
	document.getElementById('boxverpedido').style.height='1462px';
	document.getElementById('btalterapedido').style.display='none'; 
	document.getElementById('cancela_pedido').style.display='none'; 

			    
    }
    
    function Cancelboxaltera(){
    document.getElementById('boxalterapedido').style.display='none'; 
	document.getElementById('boxverpedido').style.height='891px';
	document.getElementById('btalterapedido').style.display='inline';    
    document.getElementById('cancela_pedido').style.display='inline';  
    	document.getElementById('btenviapedido').style.display='inline';
  

	
    }
    
    function Enviaparte(){
	document.getElementById('btenviapedido').style.display='none';
	document.getElementById('form_pedido_arte').style.display='block'; 
		document.getElementById('cancela_pedido').style.display='none';
   
    }
    
   </script>
    

</head>



<body topmargin="0" background="/megalabel/img/bg.jpg">	
<center>
				
                
                <table align="center" width="986px" height="125px" border="0" cellpadding="0" cellspacing="0">
                	
                    
                    <tr>
                    	
                    	
                        <td valign="top" width="986px" height="125px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/pcp/pcp.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
                  <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/pcp/pcp.php" target="_self">
                        	<p align="center" class="fontemenu">Fila PCP</p>
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/pcp/pcpfila.php" target="_self">
                        	<p align="center" class="fontemenu">Minha Fila </p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_3.jpg" width="146px" height="62px" align="center">
                        	
                        	<a href="http://www.rixd.com.br/megalabel/pcp/busca.php" target="_self">
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


                
                <table align="center" width="986px" border="0"  cellpadding="0" cellspacing="0">
                 
                    <tr>
                    	
                        <td valign="top" width="986px"  align="center">
                            

	
	<div id="boxverpedido">

_END;

if($pedido_cliente_pedido == 0){
	echo <<< _END
<div id="headervp">Pedido: $id_pedido &nbsp; | &nbsp; Data:&nbsp; $databr</div>
_END;
}
else{
	
	echo <<< _END
	<div id="headervp">Pedido: $id_pedido &nbsp; | &nbsp; Data:$databr &nbsp; | &nbsp; Pedido cliente: $pedido_cliente_pedido</div>
_END;
}
echo <<< _END
	<ul>
	<li>
	$erro
	</li>
	
	<ul><li id="boxverpedidotabcentrobot"><b>Ref. Trabalho: $ref_trabalho_pedido</b></li></ul>
	
	<div class="verpedidoesq">
	<ul>
	<li class="boxverpedidotab">Representante: $nome_representante</li> 
	<li class="boxverpedidotab">Email Cliente:$email_cliente_pedido</li> 
	<li class="boxverpedidotab">Valor Faca: $valor_faca_pedido</li>
	<li class="boxverpedidotab">Valor Cyrel: $valor_cyrel_pedido</li>
	<li class="boxverpedidotab">Valor (milheiro): $valor_milheiro_pedido</li>
	<li class="boxverpedidotab">Quantidade: $qtd_pedido</li>
	<li class="boxverpedidotab">Processo: $processo_pedido</li>
	<li class="boxverpedidotab">Trabalho Novo: $trabalho_pedido</li>
	<li id="obsverpedido">Obs./Alteração: $obs_pedido</li>
	<li class="boxverpedidotab">Material: $material_pedido</li>
	<ul id="acabrot">
	<li id="boxverpedidotabac1">Acabamento 1: $acabamento1_pedido</li>
	<li class="boxverpedidotab">Acabamento 2: $acabamento2_pedido</li>
	<li id="boxverpedidotabrt">Rotulagem: $rotulagem_pedido</li>
	</ul>
	</ul>
	</div>
	
	<div class="verpedidodir">
	<ul><li class="boxverpedidotabcentro"><b>Cliente</b></li></ul>
	<ul>
	<li class="boxverpedidotab">Empresa: $nome_cliente</li>
	<li class="boxverpedidotab">CNPJ: $cnpj_cliente</li>
	<li class="boxverpedidotab">Endereço: $endereco_cliente</li>
	<li class="boxverpedidotab">Bairro: $bairro_cliente</li>
	</ul>
	<div class="verpedidodir1">
	<ul>
	<li class="boxverpedidotab">Telefone: $telefone_cliente</li>
    <li class="boxverpedidotab">Cep: $cep_cliente</li> 	
	</ul>
	</div>
	
	<div class="verpedidodir2">
	<ul>
	<li class="boxverpedidotab">I.E: $ie_cliente</li>
	<li class="boxverpedidotab">Estado: $estado_cliente</li>
	</ul>
	</div>
	
	
	<ul>
    <li id="boxverpedidotabcentroendentrega">Endereço para Entrega: $endereco_entrega_cliente</li>
	</ul>
	
	<ul>
	<li id="boxverpedidotabcentrocidade">Cidade Entrega: $cidade_cliente</li>
	</ul>
	
	<ul><li class="boxverpedidotabcentro"><b>Nota de Remessa de industrialização</b></li></ul>
	
	<ul>
	<li class="boxverpedidotab">Empresa: $empresa_nri_pedido</li>
	<li class="boxverpedidotab">Endereço: $endereco_nri_pedido</li>
	<li class="boxverpedidotab">Telefone: $telefone_nri_pedido</li>	
    </ul>
    
	<div class="verpedidodir1">
	<ul>
	<li class="boxverpedidotab">CNPJ: $cnpj_nri_pedido</li>
	<li class="boxverpedidotab">Cep: $cep_nri_pedido</li>	
	<li class="boxverpedidotab">Estado: $estado_nri_pedido</li>
	</ul>
	</div>
	
	<div class="verpedidodir2">
	<ul>
	<li class="boxverpedidotab">I.E: $ie_nri_pedido</li>	
	<li class="boxverpedidotab">Bairro: $bairro_nri_pedido</li>
	<li class="boxverpedidotab">Cidade: $cidade_nri_pedido</li>
	</div>	
	
	<ul><li id="boxverpedidotabcentroend">Endereço de Cobrança: $end_cobranca_pedido</li></ul>
	
	<ul><li id="boxverpedidotabcentrofpag">Forma de Pagto: - 
_END;



	      $stmt = $mysqli->prepare("SELECT `forma_pag_pedido`
FROM `tipo_pag_pedido`
WHERE `id_pedido` = ?
AND `pos_tipo_pag` =0");	 
          $stmt->bind_param('s', $id_pedido);   
          $stmt->execute();
          $stmt->bind_result($forma_pag_pedido0);
          $stmt->store_result();
          $stmt->fetch();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
                  	    $stmt->close();    
	    echo "$forma_pag_pedido0 - ";
	    
	    
	    
	    
	      $stmt = $mysqli->prepare("SELECT `forma_pag_pedido`
FROM `tipo_pag_pedido`
WHERE `id_pedido` = ?
AND `pos_tipo_pag` =1");	 
          $stmt->bind_param('s', $id_pedido);   
          $stmt->execute();
          $stmt->bind_result($forma_pag_pedido1);
          $stmt->store_result();
          $stmt->fetch();          
	if (!$stmt) printf("Error: %s.\n", $sql->error);
                  	    $stmt->close();    
	    echo "$forma_pag_pedido1 - ";
	    
	    
	    
	    
	    
	      $stmt = $mysqli->prepare("SELECT `forma_pag_pedido`
FROM `tipo_pag_pedido`
WHERE `id_pedido` = ?
AND `pos_tipo_pag` =2");	 
          $stmt->bind_param('s', $id_pedido);   
          $stmt->execute();
          $stmt->bind_result($forma_pag_pedido2);
          $stmt->store_result();
          $stmt->fetch();          
	if (!$stmt) printf("Error: %s.\n", $sql->error);
                  	    $stmt->close();    
	    echo "$forma_pag_pedido2 - ";
	    
	    
	    

echo <<< _END
	</li></ul>
		<ul><li id="boxverpedidotabcentroopfat">Opção de Faturamento: $opc_faturamento_pedido</li>
	<li class="boxverpedidotabcentro" >
	Condições de Pagto: $cond_pag_pedido
_END;
	
	if($cond_pag_pedido1 !=""){
		echo "/$cond_pag_pedido1";
	}
	else{
		echo "";
	}
	if ($cond_pag_pedido2 != ""){
		echo "/$cond_pag_pedido2";
	}
	echo <<< _END
		
	</li>
	</ul>
	
	
	</div>
	
	
	
	<div id="botomvp">
	
	<ul><li id="boxverpedidotabcentrobot"><b>Modalidade de Frete</b></li></ul>

<ul class="verpedidoesqbot">
<li class="boxverpedidotab">
Tipo de frete: $tipo_frete_pedido
</li>
<li class="boxverpedidotab">
CNPJ: $cnpj_frete_pedido
</li>
<li class="boxverpedidotab">
Cidade: $cid_frete_pedido
</li>
</ul>



<ul class="verpedidodirbot">
<li class="boxverpedidotab">
Transportadora: $transp_frete_pedido
</li>
<li class="boxverpedidotab">
Telefone: $tel_frete_pedido
</li>
<li class="boxverpedidotab">
Estado: $est_frete_pedido
</li>
</ul>

	<ul>
	
	
	
_END;
	      
	      
	      	    echo "<li id='boxverpedidotabcentrosr'><b>Serigrafica:</b> - ";
	      	        
	      	        
	      	        $stmt=$mysqli->prepare("SELECT `nome_serigrafica_pedido`
FROM `serigrafica_pedido`
WHERE `id_pedido` = ?
AND `pos_serigrafica` =0");
                    $stmt->bind_param('s', $id_pedido); 
                    $stmt->execute();
                    $stmt->bind_result($nome_serigrafica_pedido0);
          $stmt->store_result();
          $stmt->fetch();
                    
	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();
	    echo "$nome_serigrafica_pedido0 - ";
	    
	    
	    
	    
	    
	      	        $stmt=$mysqli->prepare("SELECT `nome_serigrafica_pedido`
FROM `serigrafica_pedido`
WHERE `id_pedido` = ?
AND `pos_serigrafica` =1");
                    $stmt->bind_param('s', $id_pedido); 
                    $stmt->execute();
                    $stmt->bind_result($nome_serigrafica_pedido1);
                              $stmt->store_result();
          $stmt->fetch();

	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();  	    
	    echo "$nome_serigrafica_pedido1 - ";
	    
	    
	    
	    
	    
	    
	    
	      	        $stmt=$mysqli->prepare("SELECT `nome_serigrafica_pedido`
FROM `serigrafica_pedido`
WHERE `id_pedido` = ?
AND `pos_serigrafica` =2");
                    $stmt->bind_param('s', $id_pedido); 
                    $stmt->execute();
                    $stmt->bind_result($nome_serigrafica_pedido2);
                              $stmt->store_result();
          $stmt->fetch();

	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();  	    
	    echo "$nome_serigrafica_pedido2 - ";
	    
	    
	    
	    
	    
	      	        $stmt=$mysqli->prepare("SELECT `nome_serigrafica_pedido`
FROM `serigrafica_pedido`
WHERE `id_pedido` = ?
AND `pos_serigrafica` =3");
                    $stmt->bind_param('s', $id_pedido); 
                    $stmt->execute();
                    $stmt->bind_result($nome_serigrafica_pedido3);
                              $stmt->store_result();
          $stmt->fetch();

	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();  	    
	    echo "$nome_serigrafica_pedido3 - ";



	    
    
     echo "</li>";
     
     
     
     	      
     	        echo "<li class='boxverpedidotabcentro'><b>Tinta Impressão:</b> - ";
     	      
     	      
     	      
     	      $stmt=$mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? 
AND `pos_tinta_imp`=0 ");
                    $stmt->bind_param('s', $id_pedido); 
              $stmt->execute();
              $stmt->bind_result($nome_tinta_imp_pedido0);    
                        $stmt->store_result();
          $stmt->fetch();

	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();  	    		    
	    echo "$nome_tinta_imp_pedido0 - ";
	    
	    
	    
	    

	    
	    
	    
	    
	    
     	      $stmt=$mysqli->prepare("SELECT `nome_tinta_imp_pedido`
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=1");
              $stmt->bind_param('s', $id_pedido); 
              $stmt->execute();
              $stmt->bind_result($nome_tinta_imp_pedido1);    
                        $stmt->store_result();
          $stmt->fetch();

	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();  	    		    
	    echo "$nome_tinta_imp_pedido1 - ";
	    
	    
	    
	    
	    
     	      $stmt=$mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=2");
              $stmt->bind_param('s', $id_pedido); 
              $stmt->execute();
              $stmt->bind_result($nome_tinta_imp_pedido2);   
                        $stmt->store_result();
          $stmt->fetch();
 
	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();  	    		    
	    echo "$nome_tinta_imp_pedido2 - ";
	    
	    
	    
	    
	    
     	      $stmt=$mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=3");
              $stmt->bind_param('s', $id_pedido); 
              $stmt->execute();
              $stmt->bind_result($nome_tinta_imp_pedido3);    
                        $stmt->store_result();
          $stmt->fetch();

	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();  	    		    
	    echo "$nome_tinta_imp_pedido3 - ";
	    
	    
	    
	    
     	      $stmt=$mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=4");
              $stmt->bind_param('s', $id_pedido); 
              $stmt->execute();
              $stmt->bind_result($nome_tinta_imp_pedido4);    
                        $stmt->store_result();
          $stmt->fetch();

	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();  	    		    
	    echo "$nome_tinta_imp_pedido4 - ";
	    
	    
	    
	    
	    
     	      $stmt=$mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=5");
              $stmt->bind_param('s', $id_pedido); 
              $stmt->execute();
              $stmt->bind_result($nome_tinta_imp_pedido5);    
                        $stmt->store_result();
          $stmt->fetch();

	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();  	    		    
	    echo "$nome_tinta_imp_pedido5 - ";
	    
	    
	    
	    
	    
     	      $stmt=$mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=6");
              $stmt->bind_param('s', $id_pedido); 
              $stmt->execute();
              $stmt->bind_result($nome_tinta_imp_pedido6);   
                        $stmt->store_result();
          $stmt->fetch();
 
	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();  	    		    
	    echo "$nome_tinta_imp_pedido6 - ";
    
    
    
    
     	      $stmt=$mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=7");
              $stmt->bind_param('s', $id_pedido); 
              $stmt->execute();
              $stmt->bind_result($nome_tinta_imp_pedido7);    
                        $stmt->store_result();
          $stmt->fetch();

	if (!$stmt) printf("Error: %s.\n", $sql->error);
  	                $stmt->close();  	    		    
	    echo "$nome_tinta_imp_pedido7 - ";
	    
	    
    
echo "</li>";


    
    echo <<< _END
</uL></div>
    
    <ul class="linha_altera_pedido">
    <li class="bt_centro">
    <input  id="btalterapedido" type="submit" name="alterapedido" value="Alterar Pedido" onclick="Verboxaltera()"/>  
          
    <input  id="btenviapedido" type="submit" name="enviapedido" value="Direcionar para Arte" onclick="Enviaparte()"/>

    <form action="pcpverpedido.php" method="post"> 
    <input type="submit" name="cancela_pedido" id="cancela_pedido" value="Cancelar Pedido"/>

    <li id="form_pedido_arte" style="display:none">
    <select  name="user_arte" id="user_arte">
_END;




                        $stmt= $mysqli->prepare("SELECT  `id_user` ,`nome_user`
FROM   `usuarios_megalabel`
WHERE id_area =3");
$stmt->execute();
$stmt->bind_result($id_user2, $nome_user2);
          $stmt->store_result();

	if (!$stmt) printf("Error: %s.\n", $sql->error);
	
	
while ($stmt->fetch() ){
	      	      echo <<< _END
<option value="$id_user2,$nome_user2">$nome_user2</option>	   
_END;
	      	} 
 
 
 



echo <<< _END
</select>
<input type="hidden" name="id_pedido" value="$id_pedido"/>

<input  id="dir_arte" type="submit" name="dir_arte" value="Direcionar"/>

</form>
</li>
</li>
    </ul>
    
    <div id="boxalterapedido" style="display:none">
    <form id="alterapedido" method="post" action="pcpverpedido.php">

        <li id="boxverpedidotabcentrobot">
    
    <label for="ref_trabalho_pedido"> <b>Ref. Trabalho:</b> </label><input type="text" id="ref_trabalho_pedido" style="width:80%" name="ref_trabalho_pedido" value="$ref_trabalho_pedido"/>
    </li>
    
    <ul id="alt_pedido_esq">

_END;

if($pedido_cliente_pedido == 0){

echo <<< _END
<li class="linha_altera_pedido"><label for="pedido_cliente_pedido">Pedido Cliente: </label><input type="text" id="pedido_cliente_pedido" name="pedido_cliente_pedido"/></li>
_END;
}
else{
	echo <<< _END
<li class="linha_altera_pedido"><label for="pedido_cliente_pedido">Pedido Cliente: </label><input type="text" id="pedido_cliente_pedido" name="pedido_cliente_pedido" value="$pedido_cliente_pedido"/></li>
_END;
}

echo <<< _END

<li class="linha_altera_pedido"><label for="email_cliente_pedido">Email Cliente: </label><input type="text" id="email_cliente_pedido" name="email_cliente_pedido" value="$email_cliente_pedido"/></li>
<li class="linha_altera_pedido"><label for="valor_faca_pedido">Valor Faca: </label><input type="text" id="valor_faca_pedido" name="valor_faca_pedido" value="$valor_faca_pedido"/></li>
<li class="linha_altera_pedido"><label for="valor_cyrel_pedido">Valor Cyrel: </label><input type="text" id="valor_cyrel_pedido" name="valor_cyrel_pedido" value="$valor_cyrel_pedido"/></li>
<li class="linha_altera_pedido"><label for="valor_milheiro_pedido">Valor Milheiro: </label><input type="text" id="valor_milheiro_pedido" name="valor_milheiro_pedido" value="$valor_milheiro_pedido"/></li>
<li class="linha_altera_pedido"><label for="qtd_pedido">Quantidade: </label><input type="text" id="qtd_pedido" name="qtd_pedido" value="$qtd_pedido"/></li>

_END;

switch ($processo_pedido){
	
	case flexo:
	echo <<< _END
<li class="linha_altera_pedido">	
<label for="processo_pedido">Processo:</label><input id="processo_pedido" type="radio" checked="yes" name="processo_pedido" value="flexo">FLEXO
<input type="radio" id="processo_pedido" name="processo_pedido" value="digital">DIGITAL</li>
_END;
break;
	
	case digital:
	echo <<< _END
<li class="linha_altera_pedido">	
<label for="processo_pedido">Processo:</label><input id="processo_pedido" type="radio" name="processo_pedido" value="flexo">FLEXO
<input type="radio" id="processo_pedido" name="processo_pedido" checked="yes" value="digital">DIGITAL</li>
_END;
break;
}




switch ($rotulagem_pedido){
	
	case automatica:

echo <<< _END
<li class="linha_altera_pedido">
<label for="rotulagem_pedido">Rotulagem:</label><input id="rotulagem_pedido" checked="yes" type="radio" name="rotulagem_pedido" value="automatica">Automatica
<input type="radio" id="rotulagem_pedido" name="rotulagem_pedido" value="manual">Manual</li>
_END;
break;

case manual:

echo <<< _END
<li class="linha_altera_pedido">
<label for="rotulagem_pedido">Rotulagem:</label><input id="rotulagem_pedido" type="radio" name="rotulagem_pedido" value="automatica">Automatica
<input type="radio" checked="yes" id="rotulagem_pedido" name="rotulagem_pedido" value="manual">Manual</li>
_END;
break;

}



echo <<< _END

<li class="linha_altera_pedido">
<label for="material_pedido">Material: </label>
<select name="material_pedido">
_END;

switch ($material_pedido){
	
	case 'raflex transparente':
	echo <<< _END
<option value="raflex transparente" selected >raflex transparente</option>
<option value="papel couche 30g adesivo">papel couche 30g adesivo</option>
<option value="papel couche">papel couche </option>
<option value="bopp metalizado">bopp metalizado</option>
<option value="bopp transparente">bopp transparente</option>
<option value="bopp branco perolizado">bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
break;

case 'papel couche 30g adesivo':
	echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo" selected >papel couche 30g adesivo</option>
<option value="papel couche">papel couche </option>
<option value="bopp metalizado">bopp metalizado</option>
<option value="bopp transparente">bopp transparente</option>
<option value="bopp branco perolizado">bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
break;

case 'papel couche':
	echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche" selected >papel couche </option>
<option value="bopp metalizado">bopp metalizado</option>
<option value="bopp transparente">bopp transparente</option>
<option value="bopp branco perolizado">bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
break;

case 'bopp metalizado':
	echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado" selected >bopp metalizado</option>
<option value="bopp transparente">bopp transparente</option>
<option value="bopp branco perolizado">bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
break;

case 'bopp transparente':
	echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente" selected >bopp transparente</option>
<option value="bopp branco perolizado">bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
break;

case 'bopp branco perolizado':
	echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado" selected >bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
break;

case 'bopp branco':
	echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco" selected >bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
break;

case 'raflex branco':
	echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco"  >bopp branco</option>
<option value="raflex branco" selected >raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
break;

case 'polietileno transparente':
	echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco"  >bopp branco</option>
<option value="raflex branco"  >raflex branco</option>
<option value="polietileno transparente" selected >polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
break;

case 'polietileno branco':
	echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco"  >bopp branco</option>
<option value="raflex branco"  >raflex branco</option>
<option value="polietileno transparente"  >polietileno transparente</option>
<option value="polietileno branco" selected >polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
break;

case 'polietileno prata':
	echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco"  >bopp branco</option>
<option value="raflex branco"  >raflex branco</option>
<option value="polietileno transparente"  >polietileno transparente</option>
<option value="polietileno branco"  >polietileno branco</option>
<option value="polietileno prata" selected >polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
break;

case 'outros':
	echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco"  >bopp branco</option>
<option value="raflex branco"  >raflex branco</option>
<option value="polietileno transparente"  >polietileno transparente</option>
<option value="polietileno branco"  >polietileno branco</option>
<option value="polietileno prata"  >polietileno prata</option>
<option value="outros" selected >outros</option>
</select>
</li>
_END;
break;


}


echo <<< _END
<li class="linha_altera_pedido">
<label for="acabamento1_pedido">Acabamento 1:</label>
<select name="acabamento1_pedido" id="acabamento1_pedido">
_END;


switch ($acabamento1_pedido){
	
	case 'verniz uv brilho total':
	echo <<< _END
<option value="verniz uv brilho total" selected >verniz uv brilho total</option>
<option value="verniz uv brilho localizado">verniz uv brilho localizado</option>
<option value="verniz uv fosco total">verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'verniz uv brilho localizado':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado" selected >verniz uv brilho localizado</option>
<option value="verniz uv fosco total">verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'verniz uv fosco total':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total" selected >verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'verniz uv fosco localizado':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado" selected >verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'laminacao fosca':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca" selected >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'laminacao brilho':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho" selected >laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'hot stamp ouro':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro" selected >hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'hot stamp prata':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata" selected >hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'hot stamp halografico':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico" selected >hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'hot stamp especial':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial" selected >hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'cold stamp ouro':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro" selected >cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'cold stamp prata':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata" selected >cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'cold stamp halografico':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'plastificacao holografica':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica" selected >plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'verniz brilho serigrafia':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica"  >plastificacao holografica</option>
<option value="verniz brilho serigrafia" selected >verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'nenhum':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica"  >plastificacao holografica</option>
<option value="verniz brilho serigrafia" selected >verniz brilho serigrafia</option>
<option value="nenhum" selected >nenhum</option>
</select>
</li>
_END;
break;

}



echo <<< _END
<li class="linha_altera_pedido">
<label for="acabamento2_pedido">Acabamento 2:</label>
<select name="acabamento2_pedido" id="acabamento2_pedido">
_END;


switch ($acabamento2_pedido){
	
	case 'verniz uv brilho total':
	echo <<< _END
<option value="verniz uv brilho total" selected >verniz uv brilho total</option>
<option value="verniz uv brilho localizado">verniz uv brilho localizado</option>
<option value="verniz uv fosco total">verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'verniz uv brilho localizado':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado" selected >verniz uv brilho localizado</option>
<option value="verniz uv fosco total">verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'verniz uv fosco total':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total" selected >verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'verniz uv fosco localizado':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado" selected >verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'laminacao fosca':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca" selected >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'laminacao brilho':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho" selected >laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'hot stamp ouro':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro" selected >hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'hot stamp prata':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata" selected >hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'hot stamp halografico':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico" selected >hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'hot stamp especial':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial" selected >hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'cold stamp ouro':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro" selected >cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'cold stamp prata':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata" selected >cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'cold stamp halografico':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'plastificacao holografica':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica" selected >plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'verniz brilho serigrafia':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica"  >plastificacao holografica</option>
<option value="verniz brilho serigrafia" selected >verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
break;

	case 'nenhum':
	echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica"  >plastificacao holografica</option>
<option value="verniz brilho serigrafia" selected >verniz brilho serigrafia</option>
<option value="nenhum" selected >nenhum</option>
</select>
</li>
_END;
break;

}



echo <<< _END


<li class="linha_altera_pedido">
<label for="nome_tinta_imp_pedido"><b>Tinta Impressão:</b></label>
</li>
<li class="linha_altera_pedido">
_END;

	if ($nome_tinta_imp_pedido0=='branco'){
		      echo 'Branco<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido0" checked value="branco" />';

		      }

		      else {
		       echo 'Branco<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido0" value="branco" />';

		      }


		       if ($nome_tinta_imp_pedido1=='pantone'){
		      echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido1" checked value="pantone" />';
		      }

		      else {
		       echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido1" value="pantone" />';

		      }

		       if ($nome_tinta_imp_pedido2=='preto'){
		      echo 'Preto<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido2" checked value="preto" />';
		      }

		      else {
		       echo 'Preto<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido2" value="preto" />';

		      }

		       if ($nome_tinta_imp_pedido3=='cromia'){
		      echo 'Cromia<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido3" checked value="cromia" />';
		      }

		      else {
		       echo 'Cromia<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido3" value="cromia" />';

		      }
		      echo <<< _END
</li>

<li class="linha_altera_pedido">
_END;

	if ($nome_tinta_imp_pedido4=='pantone'){
		      echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido4" checked value="pantone" />';

		      }

		      else {
		       echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido4" value="pantone" />';

		      }


		       if ($nome_tinta_imp_pedido5=='pantone'){
		      echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido5" checked value="pantone" />';
		      }

		      else {
		       echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido5" value="pantone" />';

		      }

		       if ($nome_tinta_imp_pedido6=='pantone'){
		      echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido6" checked value="pantone" />';
		      }

		      else {
		       echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido6" value="pantone" />';

		      }

		       if ($nome_tinta_imp_pedido7=='outros'){
		      echo 'Outros<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido7" checked value="outros" />';
		      }

		      else {
		       echo 'Outros<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido7" value="outros" />';

		      }
		      echo <<< _END
</li>



<li class="linha_altera_pedido">
<label for="nome_serigrafica_pedido"><b>Serigrafica:</b></label>
</li>
<li class="linha_altera_pedido">
_END;

       if ($nome_serigrafica_pedido0=="branco"){
      echo 'Branco<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido0" checked value="branco"/>';       
      }
      
      else {
       echo 'Branco<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido0" value="branco"/>';	      
      }
      
      
      
       if ($nome_serigrafica_pedido1=="pantone"){
      echo 'Pantone<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido1" checked value="pantone"/>';
      }
      
      else{
      echo 'Pantone<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido1" value="pantone"/>';	     
      }
      
      
      
      if ($nome_serigrafica_pedido2=="preto"){
      echo 'Preto<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido2" checked value="preto"/>';
      }
      
      else{
      echo 'Preto<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido2" value="preto"/>';	      
      }
      
      
      
      if ($nome_serigrafica_pedido3=="pantone"){
      echo 'Pantone<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido3" checked value="pantone"/>';
      }
      
      else {
      echo 'Pantone<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido3" value="pantone"/>';	      
      }
      
      
echo <<< _END
</li>



    <li class="linha_altera_pedido"><b>Condições de Pagto:</b>
    <input type="text" id="cond_pag_pedido" name="cond_pag_pedido"size="2" value="$cond_pag_pedido" />
    <input type="text" id="cond_pag_pedido1" name="cond_pag_pedido1"size="2" value="$cond_pag_pedido1" />
    <input type="text" id="cond_pag_pedido2" name="cond_pag_pedido2"size="2" value="$cond_pag_pedido2" />
    </li>
    
    
<li class="linha_altera_pedido">
_END;

       if ($forma_pag_pedido0 =="cheque"){
      echo 'Cheque<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido0" checked value="cheque"/>';       
      }
      
      else {
       echo 'Cheque<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido0"  value="cheque"/>';	      
      }
      
             if ($forma_pag_pedido1 =="boleto"){
      echo 'Boleto Bancario<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido1" checked value="boleto"/>';       
      }
      
      else {
       echo 'Boleto Bancario<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido1" value="boleto"/>';	      
      }
      
                   if ($forma_pag_pedido2 =="deposito"){
      echo 'Deposito<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido2" checked value="deposito" />';       
      }
      
      else {
       echo 'Deposito<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido2" value="deposito" />';	      
      }
      
      
      echo <<< _END
</li>



<li class="linha_altera_pedido">
<label for="end_cobranca_pedido">End. Cobrança:</label> <input type="text" id="end_cobranca_pedido" name="end_cobranca_pedido" value="$endereco_cliente">
</li>

    <li class="linha_altera_pedido">
    <label for="opc_faturamento_pedido">Opção de Faturamento: </label>
_END;

switch ($opc_faturamento_pedido)
{
case 1:
echo <<< _END
<label><input type="radio" name="opc_faturamento_pedido" checked="yes" id="opc_faturamento_pedido" value="1">1</label>
    <label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="2">2</label>
    <label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="3">3</label>
    <label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="4">4</label>
    </li>
_END;
break;

case 2:
echo <<< _END
<label><input type="radio" name="opc_faturamento_pedido"     id="opc_faturamento_pedido" value="1">1</label>
    <label><input type="radio" name="opc_faturamento_pedido" checked="yes" id="opc_faturamento_pedido" value="2">2</label>
    <label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="3">3</label>
    <label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="4">4</label>
    </li>
_END;
break;

case 3:
echo <<< _END
<label><input type="radio" name="opc_faturamento_pedido"     id="opc_faturamento_pedido" value="1">1</label>
    <label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="2">2</label>
    <label><input type="radio" name="opc_faturamento_pedido" checked="yes" id="opc_faturamento_pedido" value="3">3</label>
    <label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="4">4</label>
    </li>
_END;
break;

case 4:
echo <<< _END
<label><input type="radio" name="opc_faturamento_pedido"     id="opc_faturamento_pedido" value="1">1</label>
    <label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="2">2</label>
    <label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="3">3</label>
    <label><input type="radio" name="opc_faturamento_pedido" checked="yes" id="opc_faturamento_pedido" value="4">4</label>
    </li>
_END;
break;
}
    
  echo <<< _END

</ul>




<ul id="alt_pedido_dir">
<li id="h3" class="linha_altera_pedido">
<b>Nota de Remesssa de Industrialização</b></li>
<li  class="linha_altera_pedido" ><label for="empresa_nri_pedido">Empresa: </label> <input type="text"  id="empresa_nri_pedido" name="empresa_nri_pedido" value="$empresa_nri_pedido"/>
<label for="telefone_nri_pedido">Telefone: </label> <input type="text" id="telefone_nri_pedido" name="telefone_nri_pedido" value="$telefone_nri_pedido"/>
   </li>
   
   <li class="linha_altera_pedido" ><label for="cnpj_nri_pedido">CNPJ:</label> <input  type="text" id="cnpj_nri_pedido" name="cnpj_nri_pedido" value="$cnpj_nri_pedido"/>
<label for="ie_nri_pedido">I.E: </label> <input type="text" id="ie_nri_pedido" name="ie_nri_pedido"  value="$ie_nri_pedido"/></li>
   
   <li class="linha_altera_pedido"><label for="endereco_nri_pedido">Endereço: </label> <input  type="text" id="endereco_nri_pedido" name="endereco_nri_pedido" value="$endereco_nri_pedido"/>
<label for="cep_nri_pedido">CEP: </label> <input type="text" id="cep_nri_pedido" name="cep_nri_pedido" value="$cep_nri_pedido"/></li>

   <li class="linha_altera_pedido"><label for="bairro_nri_pedido">Bairro: </label> <input  type="text" id="bairro_nri_pedido" name="bairro_nri_pedido" value="$bairro_nri_pedido"/>
<label for="estado_nri_pedido">Estado: </label> <input type="text" id="estado_nri_pedido" name="estado_nri_pedido" value="$estado_nri_pedido"/></li>

   <li class="linha_altera_pedido"><label for="cidade_nri_pedido">Cidade: </label> <input type="text" id="cidade_nri_pedido" name="cidade_nri_pedido" value="$cidade_nri_pedido"/></li>

    
    <li id="h3" class="linha_altera_pedido">
<label for="tipo_frete_pedido">
<b>Modalidade de Frete</b>
</label>
</li>
_END;

switch ($tipo_frete_pedido){
	     
	     case megalabel:
	     echo <<< _END
<li class="linha_altera_pedido">
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" checked="yes" value="megalabel">Megalabel
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="representante">Representante
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="cliente">Cliente
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-mega">Correio-Mega
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-cliente">Correio-Cliente
    </li>
_END;
	     break;
	     
	     case representante:
	     echo <<< _END
<li class="linha_altera_pedido">
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="megalabel">Megalabel
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" checked="yes" value="representante">Representante
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="cliente">Cliente
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-mega">Correio-Mega
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-cliente">Correio-Cliente
    </li>
_END;
	     break;
	     
	     case cliente:
	     echo <<< _END
<li class="linha_altera_pedido">
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="megalabel">Megalabel
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="representante">Representante
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" checked="yes" value="cliente">Cliente
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-mega">Correio-Mega
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-cliente">Correio-Cliente
    </li>
_END;
	     break;
	     
	     case 'correio-mega':
	     echo <<< _END
<li class="linha_altera_pedido">
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="megalabel">Megalabel
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="representante">Representante
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="cliente">Cliente
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" checked="yes" value="correio-mega">Correio-Mega
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-cliente">Correio-Cliente
    </li>
_END;
	     break;
	     
	     case 'correio-cliente':
	     echo <<< _END
<li class="linha_altera_pedido">
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="megalabel">Megalabel
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="representante">Representante
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="cliente">Cliente
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-mega">Correio-Mega
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" checked="yes" value="correio-cliente">Correio-Cliente
    </li>
_END;
	     break;
	     
     }


echo <<< _END



<li class="linha_altera_pedido">
<label for="transp_frete_pedido">Transportadora: </label> <input type="text" size="49" id="transp_frete_pedido" name="transp_frete_pedido" value="$transp_frete_pedido"/>
</li>

<li class="linha_altera_pedido">
<label for="cnpj_frete_pedido">CNPJ:</label> <input size="25" type="text" id="cnpj_frete_pedido" name="cnpj_frete_pedido" value="$cnpj_frete_pedido"/>
<label for="tel_frete_pedido">Telefone: </label> <input type="text" id="tel_frete_pedido" name="tel_frete_pedido" value="$tel_frete_pedido"/>
</li>

<li class="linha_altera_pedido">
<label for="cid_frete_pedido">Cidade: </label> <input type="text" id="cid_frete_pedido" name="cid_frete_pedido" value="$cid_frete_pedido"/>
<label for="est_frete_pedido">Estado: </label> <input type="text" id="est_frete_pedido" name="est_frete_pedido" value="$est_frete_pedido"/>
</li>
_END;

switch ($trabalho_pedido){
	
	case sim:
	 echo <<< _END
<li class="linha_altera_pedido">
    <label for="trabalho_pedido">Trabalho antigo?</label> 
    <label><input type="radio" name="trabalho_pedido" id="trabalho_pedido" checked="yes" value="sim"> Sim</label>
    <label><input type="radio" name="trabalho_pedido" id="trabalho_pedido" value="nao"> Não</label>
    </li>
_END;
    break;
    
	case nao:
	 echo <<< _END
<li class="linha_altera_pedido">
    <label for="trabalho_pedido">Trabalho antigo?</label> 
<label><input type="radio" name="trabalho_pedido" id="trabalho_pedido" value="sim"> Sim</label>
    <label><input type="radio" name="trabalho_pedido" id="trabalho_pedido" checked="yes" value="nao"> Não</label>
    </li>
_END;
    break;    
	
}

 echo <<< _END





<li class="linha_altera_pedido">
<label for="obs_pedido">Obs./Alteração :</label></li>
<li id="linha_altera_pedido_obs">
<textarea id="obs_pedido" rows="6" cols="30" maxlength="240" name="obs_pedido" id="obs_pedido">$obs_pedido</textarea>
</li>
   
</ul>


<ul>
<li class="bt_centro">
<input type="submit" name="altpedido" value="Alterar Pedido"/>



<input id="cancel_alt" type="button"  name="cancel_alt" value="Cancelar" onclick="Cancelboxaltera()"/> 
</li>
</ul>

_END;

    
        
  echo <<< _END

  <input type="hidden" name="id_pedido" value="$id_pedido"/>
<input type="hidden" name="id_cliente" value="$id_cliente"/>
<input type="hidden" name="nome_cliente" value="$nome_cliente"/>
<input type="hidden" name="cnpj_cliente" value="$cnpj_cliente"/>
<input type="hidden" name="endereco_cliente" value="$endereco_cliente"/>
<input type="hidden" name="bairro_cliente" value="$bairro_cliente"/>
<input type="hidden" name="telefone_cliente" value="$telefone_cliente"/>
<input type="hidden" name="ie_cliente" value="$ie_cliente"/>
<input type="hidden" name="cep_cliente" value="$cep_cliente"/>
<input type="hidden" name="estado_cliente" value="$estado_cliente"/>
<input type="hidden" name="cidade_cliente" value="$cidade_cliente"/>
<input type="hidden" name="endereco_cliente" value="$endereco_cliente"/>


    
    </form>
    
    </div>
    
    </div></td>
                        
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
   
      
      
      
       if (isset($_POST['altpedido'])){
              


   
 
 if($email_cliente_pedido== ""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Email cliente, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
    elseif($valor_faca_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Valor Faca, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
    elseif($valor_cyrel_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Valor Cyrel, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
    elseif($valor_milheiro_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Valor Milheiro, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
	elseif($qtd_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Quantidade, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
	elseif($processo_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Processo, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
	elseif($trabalho_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Trabalho, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
    elseif($trabalho_pedido =="sim" && isset($_POST['alteracao_trabalho'])=="sim" && $obs_pedido =="" ){
echo <<< _END

<script >    alert  ("Quando um trabalho antigo sofre alteração o campo Obs./Alteração é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}

	elseif($rotulagem_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Rotulagem, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
	elseif($material_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Material, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
	elseif($acabamento1_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Acabamento 1, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
	elseif($acabamento2_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Acabamento 2, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
    
	
	elseif($nome_tinta_imp_pedido0 =="" && $nome_tinta_imp_pedido1 =="" && $nome_tinta_imp_pedido2 =="" && $nome_tinta_imp_pedido3 =="" && $nome_tinta_imp_pedido4 =="" && $nome_tinta_imp_pedido5=="" && $nome_tinta_imp_pedido6 =="" && $nome_tinta_imp_pedido7 ==""){
echo <<< _END


<script >    alert  ("Favor preencher o campo Tinta Impressão, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
	
	
	
	
	elseif($nome_serigrafica_pedido0 =="" && $nome_serigrafica_pedido1 =="" && $nome_serigrafica_pedido2 =="" && $nome_serigrafica_pedido3 ==""){	
	echo <<< _END
<script >    alert  ("Favor preencher o campo Serigrafica, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">'; 
}




    
    elseif($forma_pag_pedido0 =="" && $forma_pag_pedido1=="" && $forma_pag_pedido2==""){
echo <<< _END

<script >    alert  ("Favor selecionar pelo menos uma das opções de pagto (Cheque, Boleto Bancario ou Deposito)");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
	
	elseif($end_cobranca_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo End. Cobrança, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
	elseif($opc_faturamento_pedido ==""){
echo <<< _END

<script >    alert  ("Favor preencher o campo Opção de Faturamento, o mesmo é obrigatorio!");     </script>
_END;
$url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
		




  
   else{
   
 $id_pedido =  $_POST['id_pedido'];
 $email_cliente_pedido =  $_POST['email_cliente_pedido']; //ok
 $qtd_pedido =  $_POST['qtd_pedido']; //ok
 $valor_faca_pedido =  $_POST['valor_faca_pedido']; //ok
 $valor_cyrel_pedido =  $_POST['valor_cyrel_pedido']; //ok
 $valor_milheiro_pedido =  $_POST['valor_milheiro_pedido']; //ok
 $processo_pedido =  $_POST['processo_pedido']; //ok
 $trabalho_pedido =  $_POST['trabalho_pedido']; //ok
 $obs_pedido =  $_POST['obs_pedido'];//ok
 $pedido_cliente_pedido =  $_POST['pedido_cliente_pedido'];  //nao precisa
 $id_cliente =  $_POST['id_cliente']; //ok
 $material_pedido =  $_POST['material_pedido']; //ok
 
 $nome_tinta_imp_pedido0 =  $_POST['nome_tinta_imp_pedido0'];//alterado
 $nome_tinta_imp_pedido1 =  $_POST['nome_tinta_imp_pedido1'];//alterado
 $nome_tinta_imp_pedido2 =  $_POST['nome_tinta_imp_pedido2'];//alterado
 $nome_tinta_imp_pedido3 =  $_POST['nome_tinta_imp_pedido3'];//alterado
 $nome_tinta_imp_pedido4 =  $_POST['nome_tinta_imp_pedido4'];//alterado
 $nome_tinta_imp_pedido5 =  $_POST['nome_tinta_imp_pedido5'];//alterado
 $nome_tinta_imp_pedido6 =  $_POST['nome_tinta_imp_pedido6'];//alterado
 $nome_tinta_imp_pedido7 =  $_POST['nome_tinta_imp_pedido7'];//alterado
 
 $acabamento1_pedido =  $_POST['acabamento1_pedido']; //ok
 $acabamento2_pedido =  $_POST['acabamento2_pedido'];	//ok
 
 $nome_serigrafica_pedido0 =  $_POST['nome_serigrafica_pedido0']; //alterado
 $nome_serigrafica_pedido1 =  $_POST['nome_serigrafica_pedido1']; //alterado
 $nome_serigrafica_pedido2 =  $_POST['nome_serigrafica_pedido2']; //alterado
 $nome_serigrafica_pedido3 =  $_POST['nome_serigrafica_pedido3']; //alterado
 
 
 $rotulagem_pedido =  $_POST['rotulagem_pedido']; //ok
 $id_representante =  $_POST['id_representante']; //ok
 $cond_pag_pedido =  $_POST['cond_pag_pedido']; //ok
 
 $forma_pag_pedido0 =  $_POST['forma_pag_pedido0'];  //alterado
 $forma_pag_pedido1 =  $_POST['forma_pag_pedido1'];  //alterado
 $forma_pag_pedido2 =  $_POST['forma_pag_pedido2'];  //alterado 
 
 $end_cobranca_pedido =  $_POST['end_cobranca_pedido']; //ok
 $opc_faturamento_pedido =  $_POST['opc_faturamento_pedido']; // ok
 $tipo_frete_pedido =  $_POST['tipo_frete_pedido']; //ok
 $transp_frete_pedido =  $_POST['transp_frete_pedido']; //ok
 $cnpj_frete_pedido =  $_POST['cnpj_frete_pedido']; //ok
 $tel_frete_pedido =  $_POST['tel_frete_pedido']; //ok
 $cid_frete_pedido =  $_POST['cid_frete_pedido']; //ok
 $est_frete_pedido =  $_POST['est_frete_pedido']; //ok
 $empresa_nri_pedido =  $_POST['empresa_nri_pedido'];
 $telefone_nri_pedido =  $_POST['telefone_nri_pedido'];
 $cnpj_nri_pedido =  $_POST['cnpj_nri_pedido'];
 $ie_nri_pedido =  $_POST['ie_nri_pedido'];
 $endereco_nri_pedido =  $_POST['endereco_nri_pedido'];
 $cep_nri_pedido =  $_POST['cep_nri_pedido'];
 $bairro_nri_pedido =  $_POST['bairro_nri_pedido'];
 $estado_nri_pedido =  $_POST['estado_nri_pedido'];
 $cidade_nri_pedido =  $_POST['cidade_nri_pedido'];		
 
  $ref_trabalho_pedido =  $_POST['ref_trabalho_pedido'];		
  $cond_pag_pedido1 =  $_POST['cond_pag_pedido1'];		
  $cond_pag_pedido2 =  $_POST['cond_pag_pedido2'];		



		
    
  
   $stmt = $mysqli->prepare("UPDATE `pedido_megalabel` SET `email_cliente_pedido` =  ?, `qtd_pedido` =  ?, `valor_faca_pedido` =  ?, `valor_cyrel_pedido` =  ?, `valor_milheiro_pedido` =  ?, `processo_pedido` =  ?, `trabalho_pedido` =  ?, `obs_pedido` =  ?, `pedido_cliente_pedido` =  ?, `material_pedido` =  ?, `acabamento1_pedido` =  ?, `acabamento2_pedido` =  ?, `rotulagem_pedido` =  ?, `cond_pag_pedido` =  ?, `end_cobranca_pedido` =  ?, `opc_faturamento_pedido` =  ?, `tipo_frete_pedido` =  ?, `transp_frete_pedido` =  ?, `cnpj_frete_pedido` =  ?, `tel_frete_pedido` =  ?, `cid_frete_pedido` =  ?, `est_frete_pedido` =  ?, `empresa_nri_pedido` =  ?, `cnpj_nri_pedido` =  ?, `endereco_nri_pedido` =  ?, `bairro_nri_pedido` =  ?, `telefone_nri_pedido` =  ?, `ie_nri_pedido` =  ?, `cep_nri_pedido`= ?, `estado_nri_pedido`= ?, `cidade_nri_pedido`= ?, `ref_trabalho_pedido` = ? , `cond_pag_pedido1` = ?, `cond_pag_pedido2` =?  WHERE `id_pedido`= ? ");
  
  $stmt->bind_param('sssssssssssssssssssssssssssssssssss', $email_cliente_pedido, $qtd_pedido, $valor_faca_pedido, $valor_cyrel_pedido, $valor_milheiro_pedido, $processo_pedido, $trabalho_pedido, $obs_pedido, $pedido_cliente_pedido, $material_pedido, $acabamento1_pedido, $acabamento2_pedido, $rotulagem_pedido, $cond_pag_pedido, $end_cobranca_pedido, $opc_faturamento_pedido, $tipo_frete_pedido, $transp_frete_pedido,  $cnpj_frete_pedido, $tel_frete_pedido, $cid_frete_pedido, $est_frete_pedido, $empresa_nri_pedido, $cnpj_nri_pedido, $endereco_nri_pedido, $bairro_nri_pedido, $telefone_nri_pedido, $ie_nri_pedido, $cep_nri_pedido, $estado_nri_pedido, $cidade_nri_pedido, $ref_trabalho_pedido, $cond_pag_pedido1, $cond_pag_pedido2, $id_pedido);
  
  $stmt->execute();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
  $stmt->close();
  
  
  $stmt = $mysqli->prepare("
UPDATE `serigrafica_pedido` SET `nome_serigrafica_pedido` = ? WHERE `id_pedido` = ? AND `pos_serigrafica` =0 LIMIT 1");
  $stmt->bind_param('ss', $nome_serigrafica_pedido0, $id_pedido );
  $stmt->execute();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
  $stmt->close();  
      


  $stmt= $mysqli->prepare("
UPDATE `serigrafica_pedido` SET `nome_serigrafica_pedido` = ? WHERE `id_pedido` = ? AND `pos_serigrafica` =1 LIMIT 1");
      $stmt->bind_param('ss', $nome_serigrafica_pedido1, $id_pedido); 
      $stmt->execute();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
      $stmt->close();



     $stmt=$mysqli->prepare("
UPDATE `serigrafica_pedido` SET `nome_serigrafica_pedido` = ? WHERE `id_pedido` = ? AND `pos_serigrafica` =2 LIMIT 1");
      $stmt->bind_param('ss', $nome_serigrafica_pedido2, $id_pedido );
      $stmt->execute();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
      $stmt->close();


     $stmt=$mysqli->prepare("
UPDATE `serigrafica_pedido` SET `nome_serigrafica_pedido` = ? WHERE `id_pedido` = ? AND `pos_serigrafica` =3 LIMIT 1");
      $stmt->bind_param('ss', $nome_serigrafica_pedido3, $id_pedido );
      $stmt->execute();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
      $stmt->close(); 





$stmt=$mysqli->prepare("UPDATE `tinta_imp_pedido` SET `nome_tinta_imp_pedido` = ? WHERE `id_pedido`= ?   AND `pos_tinta_imp` = 0 LIMIT 1");
						$stmt->bind_param('ss', $nome_tinta_imp_pedido0, $id_pedido);
						$stmt->execute();
						if (!$stmt) printf("Error: %s.\n", $sql->error);
						$stmt->close();



$stmt=$mysqli->prepare("UPDATE `tinta_imp_pedido` SET `nome_tinta_imp_pedido` = ? WHERE `id_pedido`= ?   AND `pos_tinta_imp` = 1 LIMIT 1");
						$stmt->bind_param('ss', $nome_tinta_imp_pedido1, $id_pedido);
						$stmt->execute();
						if (!$stmt) printf("Error: %s.\n", $sql->error);
						$stmt->close();


$stmt=$mysqli->prepare("UPDATE `tinta_imp_pedido` SET `nome_tinta_imp_pedido` = ? WHERE `id_pedido`= ?   AND `pos_tinta_imp` = 2 LIMIT 1");
						$stmt->bind_param('ss', $nome_tinta_imp_pedido2, $id_pedido);
						$stmt->execute();
						if (!$stmt) printf("Error: %s.\n", $sql->error);
						$stmt->close();


$stmt=$mysqli->prepare("UPDATE `tinta_imp_pedido` SET `nome_tinta_imp_pedido` = ? WHERE `id_pedido`= ?   AND `pos_tinta_imp` = 3 LIMIT 1");
						$stmt->bind_param('ss', $nome_tinta_imp_pedido3, $id_pedido);
						$stmt->execute();
						if (!$stmt) printf("Error: %s.\n", $sql->error);
						$stmt->close();


$stmt=$mysqli->prepare("UPDATE `tinta_imp_pedido` SET `nome_tinta_imp_pedido` = ? WHERE `id_pedido`= ?   AND `pos_tinta_imp` = 4 LIMIT 1");
						$stmt->bind_param('ss', $nome_tinta_imp_pedido4, $id_pedido);
						$stmt->execute();
						if (!$stmt) printf("Error: %s.\n", $sql->error);
						$stmt->close();


$stmt=$mysqli->prepare("UPDATE `tinta_imp_pedido` SET `nome_tinta_imp_pedido` = ? WHERE `id_pedido`= ?   AND `pos_tinta_imp` = 5 LIMIT 1");
						$stmt->bind_param('ss', $nome_tinta_imp_pedido5, $id_pedido);
						$stmt->execute();
						if (!$stmt) printf("Error: %s.\n", $sql->error);
						$stmt->close();


$stmt=$mysqli->prepare("UPDATE `tinta_imp_pedido` SET `nome_tinta_imp_pedido` = ? WHERE `id_pedido`= ?   AND `pos_tinta_imp` = 6 LIMIT 1");
						$stmt->bind_param('ss', $nome_tinta_imp_pedido6, $id_pedido);
						$stmt->execute();
						if (!$stmt) printf("Error: %s.\n", $sql->error);
						$stmt->close();


$stmt=$mysqli->prepare("UPDATE `tinta_imp_pedido` SET `nome_tinta_imp_pedido` = ? WHERE `id_pedido`= ?   AND `pos_tinta_imp` = 7 LIMIT 1");
						$stmt->bind_param('ss', $nome_tinta_imp_pedido7, $id_pedido);
						$stmt->execute();
						if (!$stmt) printf("Error: %s.\n", $sql->error);
						$stmt->close();
						
						
						
$stmt = $mysqli->prepare("  
UPDATE `tipo_pag_pedido` SET `forma_pag_pedido` = ?
WHERE `id_pedido` = ?  AND `pos_tipo_pag` = 0 LIMIT 1");
$stmt->bind_param('ss', $forma_pag_pedido0, $id_pedido );
$stmt->execute();
if (!$stmt) printf("Error: %s.\n", $sql->error);
$stmt->close();    
    
$stmt = $mysqli->prepare("  
UPDATE `tipo_pag_pedido` SET `forma_pag_pedido` = ?
WHERE `id_pedido` = ?  AND `pos_tipo_pag` = 1 LIMIT 1");
$stmt->bind_param('ss', $forma_pag_pedido1, $id_pedido );
$stmt->execute();
if (!$stmt) printf("Error: %s.\n", $sql->error);
$stmt->close();      

$stmt = $mysqli->prepare("  
UPDATE `tipo_pag_pedido` SET `forma_pag_pedido` = ?
WHERE `id_pedido` = ?  AND `pos_tipo_pag` = 2 LIMIT 1");
$stmt->bind_param('ss', $forma_pag_pedido2, $id_pedido );
$stmt->execute();
if (!$stmt) printf("Error: %s.\n", $sql->error);
$stmt->close();  						



  
  $mysqli->close();  
   $url = 'http://www.rixd.com.br/megalabel/pcp/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
  
  
    }
    
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
                        	<a href="http://www.rixd.com.br/megalabel/pcp/pcp.php" target="_self">
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
      <form id="form" action="/megalabel/pcp/process_login_pcp.php" name="login_form" method="post" autocomplete="off">
      
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