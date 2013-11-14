<?php
    include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_producao($mysqli) == true) {
	
if(isset($_POST['id_pedido2']) ){
 
 

	      $id_pedido = $_POST['id_pedido2'];


  $sql = $mysqli->prepare("SELECT `id_pedido` FROM `fluxo` WHERE `id_pedido`= ? AND `id_user` = ?");
  $sql->bind_param('ss', $id_pedido, $id_user);
      $sql->execute();
    $sql->store_result();
                    if ($sql->error ) printf("Error: %s.\n", $sql->error);	
                    
                    if($sql->num_rows <1){
	                    $id_pedido2 = "Numero de Pedido incorreto.";
                    }
                    else{
    $sql->bind_result($id_pedido2);                    
    }
    $sql->fetch();

    
    
    echo $id_pedido2;
    
    $sql->close();
$mysqli->close();
}
}
else { 
   // The correct POST variables were not sent to this page.
   echo 'Invalid Request';
}

?>