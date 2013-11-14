<?php //verifica_fila.php
	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_relat($mysqli) == true) {
	
if(isset($_POST['id_user2']) ){
 
 

	      $id_user2 = $_POST['id_user2'];


  $sql = $mysqli->prepare("SELECT `id_pedido` FROM `fluxo` WHERE `id_user`= ?");
  $sql->bind_param('i', $id_user2);
      $sql->execute();
    $sql->store_result();
                    if ($sql->error ) printf("Error: %s.\n", $sql->error);	

    $num_fila = $sql->num_rows;  
    
    
    echo $num_fila;
    $sql->close();
$mysqli->close();
}
}
else { 
   // The correct POST variables were not sent to this page.
   echo 'Invalid Request';
}

	
?>