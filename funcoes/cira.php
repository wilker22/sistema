<?php
		require_once("/home/rixd/www/megalabel/funcoes/conecta_db.php");

include '/home/rixd/www/megalabel/funcoes/funcoes_seguras.php';

	
	// The hashed password from the form
$nome_user = "producao";
$password = "producao"; 
// Create a random salt
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true) );
// Create salted password (Careful not to over season)
$password = hash('sha512', $password.$random_salt);
 /*echo $random_salt;
 
 echo "<br />$password";
 */
 $email= "producao@megalabel.com.br";
 $null="NULL";
 $id_area = "9";
// Add your insert to database script here. 
// Make sure you use prepared statements!
/*
if ($insert_stmt = $mysqli->prepare("INSERT INTO usuarios_megalabel (id_user, id_area, nome_user, senha, email, salt) VALUES (?, ?, ?, ?, ?, ?)")) {    
   $insert_stmt->bind_param('ssssss', $null, $id_area, $nome_user, $password, $email, $random_salt); 
   // Execute the prepared query.
   $insert_stmt->execute();
    echo "<img src='/megalabel/img/teste2.gif' alt='Carregando' width='110' height='110'><br />";
    echo "Usuário Criado";
    

}
*/
/*
if ($insert_stmt = $mysqli->prepare("INSERT INTO `representantes` (id_representante, email_representante, nome_representante, senha_representante, salt_representante) VALUES (?, ?, ?, ?, ?)")) {    
   $insert_stmt->bind_param('sssss', $null, $email, $nome_user, $password, $random_salt); 
   // Execute the prepared query.
   $insert_stmt->execute();
}
*/


?>