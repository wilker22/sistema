<?php
		
	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");


$data_pedido = date("y-m-d");
$data_pedido2 = implode("-",array_reverse(explode("-",$data_pedido)));

	echo "<br />$final2";

	echo $data_pedido2;
echo "<br />hoje é: $dia";
$dia = date("w", strtotime($data_pedido));


switch($dia){
	
	case 0:
	$final = date("y-m-d", strtotime($data_pedido.'+12 days')) ;
	$final2 =   implode("-",array_reverse(explode("-",$final)));
	break;
	
	case 1:
	$final = date("y-m-d", strtotime($data_pedido.'+14 days')) ;
	$final2 =   implode("-",array_reverse(explode("-",$final)));
	break;
	
	case 2:
	$final = date("y-m-d", strtotime($data_pedido.'+14 days')) ;
	$final2 =   implode("-",array_reverse(explode("-",$final)));
	break;
	
	case 3:
	$final = date("y-m-d", strtotime($data_pedido.'+14 days')) ;
	$final2 =   implode("-",array_reverse(explode("-",$final)));
	break;
	
	case 4:
	$final = date("y-m-d", strtotime($data_pedido.'+14 days')) ;
	$final2 =   implode("-",array_reverse(explode("-",$final)));
	break;
	
	case 5:
	$final = date("y-m-d", strtotime($data_pedido.'+14 days')) ;
	$final2 =   implode("-",array_reverse(explode("-",$final)));
	break;
	
	case 6:
	$final = date("y-m-d", strtotime($data_pedido.'+13 days')) ;
	$final2 =   implode("-",array_reverse(explode("-",$final)));
	break;
	
}
	
	
	?>