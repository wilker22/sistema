
<?php

require_once "/home/rixd/www/megalabel/funcoes/funcoes.php";
	
	$id_user=6;
	if (isset($_POST['id_pedido']) ){
	      $id_pedido= get_post('id_pedido');
      }



if(isset($_POST['tratarpedido'])){
	
	$query ="UPDATE fluxo
SET `id_area`=2, id_user='$id_user'
WHERE id_pedido='$id_pedido' ";
$result = mysql_query($query);
			if (!$result) die ("Acesso a base de dados falhou: " . mysql_error());

 $url = 'http://www.rixd.com.br/megalabel/pcpfila.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';


}	
	
	
	echo <<< _END
	<html><head>	
    

    <link rel="stylesheet" href="style.css">


    </head>
    <body>
	</head><body>
	<div class="boxfila"><div class="headerfila">Fila de pedidos PCP em andamento</div>	
	<br /> 
 
_END;
	
	$query = "SELECT  `nome_user` ,  `id_pedido` ,  `data_pedido` ,  `nome_cliente` ,  `cnpj_cliente` 
FROM  `pedido_megalabel` 
NATURAL JOIN cliente_megalabel
NATURAL JOIN fluxo
NATURAL JOIN usuarios_megalabel
WHERE  `id_area` =  '2'
ORDER BY id_pedido DESC ";
	$result = mysql_query($query);
	if (!$result) die ("O acesso a base de dados falhou:" . mysql_error());
	
	$rows= mysql_num_rows($result);
	for ($i=0; $i<$rows; ++$i){
	
	$row = mysql_fetch_row($result);
	      $nome_user = $row[0];
		  $id_pedido= $row[1];
	      $data_pedido = $row[2];
	      $databr = implode("-",array_reverse(explode("-",$data_pedido)));
	      $nome_cliente = $row[3];
	      $cnpj_cliente = $row[4];

	      	      echo <<< _END
	      <div class="pedidofilacomerc">
	       
	      
												    <ul><li>
												          Usuário Resp: $nome_user - &nbsp;
												          Pedido: $id_pedido - &nbsp;
													      Data: $databr  - &nbsp;
													      Empresa:  $nome_cliente - &nbsp;
													      CNPJ: $cnpj_cliente </li>
													      	      </ul>
													      <div class="btpedido1">	      
													      <form action="pcpverpedido.php" method="post">
													      <input type="hidden" name="id_pedido" value="$id_pedido"/>
													      <input type="submit"  name="verpedido" value="Visualizar pedido"/>										
												          </form>
												
												          <form id="tratapedido"  action="pcp.php" method="post">						
													      <input type="hidden" name="id_pedido" value="$id_pedido"/>
													      <input type="submit"  name="tratarpedido" value="Tratar Pedido"/>													      
													      </form>
													      
													      </div>
												</div>
													  
	   
_END;
	      	}
	      	
	      	echo "</div></body></html>";
	      	
?>