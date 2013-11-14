<?php //verifica_fila_representante.php
	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_relat($mysqli) == true) {

if(isset($_POST['id_representante']) ){
 
 

	      $id_representante = $_POST['id_representante'];


  $sql = $mysqli->prepare("SELECT `id_pedido` FROM `pedido_megalabel` WHERE `id_representante`= ?");
  $sql->bind_param('i', $id_representante);
      $sql->execute();
    $sql->store_result();
                    if ($sql->error ) printf("Error: %s.\n", $sql->error);	

    $num_pedidos_repre = $sql->num_rows;  
    
    
    echo $num_pedidos_repre;
    $sql->close();
$mysqli->close();
}
}
else { 
   // The correct POST variables were not sent to this page.
   echo 'Invalid Request';
}

?>