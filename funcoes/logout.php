<?php //logout.php



include 'funcoes_seguras.php';
sec_session_start();
// Desativa todos valores de sess�es
$_SESSION = array();
// Recebe os parametros da sess�o 
$params = session_get_cookie_params();
// Deleta o cookie atual.
setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
// Destroi a sess�o
session_destroy();
// header('Location: ./');
	   $url = 'http://www.megalabel.com.br/';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">'; 
?>