<?php //funcoes_seguras.php       
	
	
	
	function sec_session_start() {
        $session_name = 'sec_session_id'; // Define um nome de sessão customizado.
        $secure = false; // Definir para true se utilizando HTTPS.
        $httponly = true; // Impede que JavaScript possa acessar o id da sessão
 
        ini_set('session.use_only_cookies', 1); // Força as sessões a somente utilizarem Cookies.
        $cookieParams = session_get_cookie_params(); // Pega os paremetros atuais dos Cookies.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name); // Define o nome da sessão para o definido abaixo
        session_start(); // Inicia a Sessão
        session_regenerate_id(); // Regenera a sessão, deletando antigas. 
}



function login_comercial($nome_representante, $senha_representante, $mysqli) {

   if ($stmt = $mysqli->prepare("SELECT `id_representante` , `email_representante` , `senha_representante` , `salt_representante` FROM `representantes`
WHERE nome_representante = ?
LIMIT 1")) { 
      $stmt->bind_param('s', $nome_representante);
      $stmt->execute(); 
      $stmt->store_result();
      $stmt->bind_result($id_representante, $email_representante, $senha_db_repre, $salt_representante); 
      $stmt->fetch();
      $senha_representante = hash('sha512', $senha_representante.$salt_representante); // hash the password with the unique salt.
 
 
      if($stmt->num_rows == 1) { // Verifica se o usuário existe
         // Verifica se a conta não foi bloqueada por tentativas incorretas
         if(checkbrute_repre($id_representante, $mysqli) == true) { 
            // Usuário bloqueado
            $to = "$email_representante";
$subject = "Usuário $nome_representante Bloqueado.";
$message = "Caro usuário $nome_representante, seu usuário foi bloqueado após 5 tentativas de login com senha incorreta.
Por gentileza entre em contato com o administrador do sistema para desbloquear o seu usuário.";
$from = "ricardo@rixd.com.br";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
            return false;
         } else {
         if($senha_db_repre == $senha_representante) { // Verifica se a senha na base de dados confere com a senha incluida
            // Senha correta!
 
 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Pega a String do user-agentGet do usuário.
 
               $id_representante = preg_replace("/[^0-9]+/", "", $id_representante); // Proteção contra XSS 
               $_SESSION['id_representante'] = $id_representante;                               
               $_SESSION['nome_representante'] = $nome_representante;
               
               $_SESSION['login_string'] = hash('sha512', $senha_representante.$user_browser);
               // Logou com sucesso!.
               return true;    
         } else {
            // Senha invalida
            // Gravado a tentaviva de Login
            $now = time();
            $mysqli->query("INSERT INTO tentativas_login_representante (id_representante, tempo) VALUES ('$id_representante', '$now')");
            return false;
         }
      }
      } else {
         // Usuário não existe. 
         return false;
      }    
 }
}


function login_check_repre($mysqli) {

   if( isset($_SESSION['id_representante'], $_SESSION['nome_representante'], $_SESSION['login_string']) ) {
     $id_representante = $_SESSION['id_representante'];
     $login_string = $_SESSION['login_string'];
     $nome_representante = $_SESSION['nome_representante'];
 
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
 
 
     if ($stmt = $mysqli->prepare("SELECT senha_representante FROM representantes WHERE id_representante = ? LIMIT 1")) { 
        $stmt->bind_param('s', $id_representante); 
        $stmt->execute(); 
        $stmt->store_result();
 
        if($stmt->num_rows == 1) { // If the user exists
           $stmt->bind_result($senha_representante); // get variables from result.
           $stmt->fetch();
           $login_check  = hash('sha512', $senha_representante.$user_browser);
           
           if($login_check == $login_string) {
              // Logged In!!!!
              return true;
           } else {
              // Not logged in
              return false;
           }
        } else {
            // Not logged in
            return false;
        }
     } else {
        // Not logged in
        return false;
     }
     
   } else {
     // Not logged in
     return false;
   }
}

function checkbrute_repre($id_representante, $mysqli) {

   $now = time();
   // Todas as tentativas de login são contadas nas ultimas 2 horas. 
   $valid_attempts = $now - (2 * 60 * 60); 
 
   if ($stmt = $mysqli->prepare("SELECT `tempo` FROM `tentativas_login_representante` WHERE `id_representante` = ? AND `tempo` > ? ")) { 
      $stmt->bind_param('ii', $id_representante, $valid_attempts); 
      $stmt->execute();
      $stmt->store_result();
      // Se houve mais que 5 tentativas invalidas.
      if($stmt->num_rows > 5) {
         return true;
      } else {
         return false;
      }
   }
}




function login_pcp($nome_user, $senha, $mysqli) {

   if ($stmt = $mysqli->prepare("SELECT `id_user`, `id_area`, `email`, `senha`, `salt` FROM `usuarios_megalabel` WHERE nome_user = ? LIMIT 1")) { 
      $stmt->bind_param('s', $nome_user);
      $stmt->execute(); 
      $stmt->store_result();
      $stmt->bind_result($id_user, $id_area, $email, $senha_db, $salt); 
      $stmt->fetch();
      $senha = hash('sha512', $senha.$salt); // hash the password with the unique salt.
 
    if($id_area == 1 || $id_area == 2){
 
      if($stmt->num_rows == 1) { // Verifica se o usuário existe
         // Verifica se a conta não foi bloqueada por tentativas incorretas
         if(checkbrute($id_user, $mysqli) == true) { 
            // Usuário bloqueado
            $to = "$email";
$subject = "Usuário $nome_user Bloqueado.";
$message = "Caro usuário $nome_user, seu usuário foi bloqueado após 5 tentativas de login com senha incorreta.
Por gentileza entre em contato com o administrador do sistema para desbloquear o seu usuário.";
$from = "ricardo@rixd.com.br";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
            return false;
         } else {
         if($senha_db == $senha) { // Verifica se a senha na base de dados confere com a senha incluida
            // Senha correta!
 
 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Pega a String do user-agentGet do usuário.
 
               $id_user = preg_replace("/[^0-9]+/", "", $id_user); // Proteção contra XSS 
               $_SESSION['id_user'] = $id_user; 
               $_SESSION['id_area'] = $id_area; 
               $nome_user = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $nome_user); // Proteção contra XSS 
               $_SESSION['nome_user'] = $nome_user;
               $_SESSION['login_string'] = hash('sha512', $senha.$user_browser);
               // Logou com sucesso!.
               return true;    
         } else {
            // Senha invalida
            // Gravado a tentaviva de Login
            $now = time();
            $mysqli->query("INSERT INTO tentativas_login (id_user, tempo) VALUES ('$id_user', '$now')");
            return false;
         }
      }
      } else {
         // Usuário não existe. 
         return false;
      }
   } else {
	   // Acesso negado
	   return false;
   }
      
 }
}

		function login_check_pcp($mysqli) {
						   // Check if all session variables are set
						   

						   
						   if(isset($_SESSION['id_user'], $_SESSION['nome_user'], $_SESSION['login_string'], $_SESSION['id_area']) ) {
						     $id_user = $_SESSION['id_user'];
						     $login_string = $_SESSION['login_string'];
						     $nome_user = $_SESSION['nome_user'];
						     $id_area = $_SESSION['id_area'];

						     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
						     					
                        
if ($id_area == '1' || $id_area == '2'){

						     if ($stmt = $mysqli->prepare("SELECT senha FROM usuarios_megalabel WHERE id_user = ? LIMIT 1")) { 
						        $stmt->bind_param('i', $id_user); 
						        $stmt->execute(); 
						        $stmt->store_result();

						        if($stmt->num_rows == 1) { // If the user exists
						           $stmt->bind_result($senha); // get variables from result.
						           $stmt->fetch();
						           $login_check = hash('sha512', $senha.$user_browser);
						           if($login_check == $login_string) {
						              // Logged In!!!!
						              return true;
						           } else {
						              // Not logged in
						              return false;
						           }
						        } else {
						            // Not logged in
						            return false;
						        }
						     } else {
						        // Not logged in
						        return false;
						     }
						     
						     
						     }else{
							     return false;
						     }
					
						     
						     
						   } else {
						     // Not logged in
						     return false;
						   }
						   
						   
						
						}



function login_arte($nome_user, $senha, $mysqli) {

   if ($stmt = $mysqli->prepare("SELECT id_user, id_area, email, senha, salt FROM usuarios_megalabel WHERE nome_user = ? LIMIT 1")) { 
      $stmt->bind_param('s', $nome_user);
      $stmt->execute(); 
      $stmt->store_result();
      $stmt->bind_result($id_user, $id_area, $email, $db_senha, $salt); 
      $stmt->fetch();
      $senha = hash('sha512', $senha.$salt); // hash the password with the unique salt.
 
    if($id_area == 3){
 
      if($stmt->num_rows == 1) { // Verifica se o usuário existe
         // Verifica se a conta não foi bloqueada por tentativas incorretas
         if(checkbrute($id_user, $mysqli) == true) { 
            // Usuário bloqueado
            $to = "$email";
$subject = "Usuário $nome_user Bloqueado.";
$message = "Caro usuário $nome_user, seu usuário foi bloqueado após 5 tentativas de login com senha incorreta.
Por gentileza entre em contato com o administrador do sistema para desbloquear o seu usuário.";
$from = "ricardo@rixd.com.br";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

            return false;
         } else {
         if($db_senha == $senha) { // Verifica se a senha na base de dados confere com a senha incluida
            // Senha correta!
 
 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Pega a String do user-agentGet do usuário.
 
               $id_user = preg_replace("/[^0-9]+/", "", $id_user); // Proteção contra XSS 
               $_SESSION['id_user'] = $id_user; 
               $nome_user = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $nome_user); // Proteção contra XSS 
               $_SESSION['nome_user'] = $nome_user;
               $_SESSION['id_area'] = $id_area; 
               $_SESSION['login_string'] = hash('sha512', $senha.$user_browser);
               // Logou com sucesso!.
               return true;    
         } else {
            // Senha invalida
            // Gravado a tentaviva de Login
            $now = time();
            $mysqli->query("INSERT INTO tentativas_login (id_user, tempo) VALUES ('$id_user', '$now')");
            return false;
         }
      }
      } else {
         // Usuário não existe. 
         return false;
      }
   } else {
	   // Acesso negado
	   return false;
   }
      
 }
}

function login_check_arte($mysqli) {
						   // Check if all session variables are set
						   

						   
						   if(isset($_SESSION['id_user'], $_SESSION['nome_user'], $_SESSION['login_string'], $_SESSION['id_area']) ) {
						     $id_user = $_SESSION['id_user'];
						     $login_string = $_SESSION['login_string'];
						     $nome_user = $_SESSION['nome_user'];
						     $id_area = $_SESSION['id_area'];

						     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
						     					
                        
if ($id_area == '3' ){

						     if ($stmt = $mysqli->prepare("SELECT senha FROM usuarios_megalabel WHERE id_user = ? LIMIT 1")) { 
						        $stmt->bind_param('i', $id_user); 
						        $stmt->execute(); 
						        $stmt->store_result();

						        if($stmt->num_rows == 1) { // If the user exists
						           $stmt->bind_result($senha); // get variables from result.
						           $stmt->fetch();
						           $login_check = hash('sha512', $senha.$user_browser);
						           if($login_check == $login_string) {
						              // Logged In!!!!
						              return true;
						           } else {
						              // Not logged in
						              return false;
						           }
						        } else {
						            // Not logged in
						            return false;
						        }
						     } else {
						        // Not logged in
						        return false;
						     }
						     
						     
						     }else{
							     return false;
						     }
					
						     
						     
						   } else {
						     // Not logged in
						     return false;
						   }
						   
						   
						
						}
						

function login_producao($nome_user, $senha, $mysqli) {

   if ($stmt = $mysqli->prepare("SELECT id_user, id_area, email, senha, salt FROM usuarios_megalabel WHERE nome_user = ? LIMIT 1")) { 
      $stmt->bind_param('s', $nome_user);
      $stmt->execute(); 
      $stmt->store_result();
      $stmt->bind_result($id_user, $id_area, $email, $db_senha, $salt); 
      $stmt->fetch();
      $senha = hash('sha512', $senha.$salt); // hash the password with the unique salt.
 
    if($id_area == 9){
 
      if($stmt->num_rows == 1) { // Verifica se o usuário existe
         // Verifica se a conta não foi bloqueada por tentativas incorretas
         if(checkbrute($id_user, $mysqli) == true) { 
            // Usuário bloqueado
            $to = "$email";
$subject = "Usuário $nome_user Bloqueado.";
$message = "Caro usuário $nome_user, seu usuário foi bloqueado após 5 tentativas de login com senha incorreta.
Por gentileza entre em contato com o administrador do sistema para desbloquear o seu usuário.";
$from = "ricardo@rixd.com.br";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

            return false;
         } else {
         if($db_senha == $senha) { // Verifica se a senha na base de dados confere com a senha incluida
            // Senha correta!
 
 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Pega a String do user-agentGet do usuário.
 
               $id_user = preg_replace("/[^0-9]+/", "", $id_user); // Proteção contra XSS 
               $_SESSION['id_user'] = $id_user; 
               $nome_user = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $nome_user); // Proteção contra XSS 
               $_SESSION['nome_user'] = $nome_user;
               $_SESSION['id_area'] = $id_area; 
               $_SESSION['login_string'] = hash('sha512', $senha.$user_browser);
               // Logou com sucesso!.
               return true;    
         } else {
            // Senha invalida
            // Gravado a tentaviva de Login
            $now = time();
            $mysqli->query("INSERT INTO tentativas_login (id_user, tempo) VALUES ('$id_user', '$now')");
            return false;
         }
      }
      } else {
         // Usuário não existe. 
         return false;
      }
   } else {
	   // Acesso negado
	   return false;
   }
      
 }
}

function login_check_producao($mysqli) {
						   // Check if all session variables are set
						   

						   
						   if(isset($_SESSION['id_user'], $_SESSION['nome_user'], $_SESSION['login_string'], $_SESSION['id_area']) ) {
						     $id_user = $_SESSION['id_user'];
						     $login_string = $_SESSION['login_string'];
						     $nome_user = $_SESSION['nome_user'];
						     $id_area = $_SESSION['id_area'];

						     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
						     					
                        
if ($id_area == '9' ){

						     if ($stmt = $mysqli->prepare("SELECT senha FROM usuarios_megalabel WHERE id_user = ? LIMIT 1")) { 
						        $stmt->bind_param('i', $id_user); 
						        $stmt->execute(); 
						        $stmt->store_result();

						        if($stmt->num_rows == 1) { // If the user exists
						           $stmt->bind_result($senha); // get variables from result.
						           $stmt->fetch();
						           $login_check = hash('sha512', $senha.$user_browser);
						           if($login_check == $login_string) {
						              // Logged In!!!!
						              return true;
						           } else {
						              // Not logged in
						              return false;
						           }
						        } else {
						            // Not logged in
						            return false;
						        }
						     } else {
						        // Not logged in
						        return false;
						     }
						     
						     
						     }else{
							     return false;
						     }
					
						     
						     
						   } else {
						     // Not logged in
						     return false;
						   }
						   
						   
						
						}




function login_acabamento($nome_user, $senha, $mysqli) {

   if ($stmt = $mysqli->prepare("SELECT id_user, id_area, email, senha, salt FROM usuarios_megalabel WHERE nome_user = ? LIMIT 1")) { 
      $stmt->bind_param('s', $nome_user);
      $stmt->execute(); 
      $stmt->store_result();
      $stmt->bind_result($id_user, $id_area, $email, $db_senha, $salt); 
      $stmt->fetch();
      $senha = hash('sha512', $senha.$salt); // hash the password with the unique salt.
 
    if($id_area == 4){
 
      if($stmt->num_rows == 1) { // Verifica se o usuário existe
         // Verifica se a conta não foi bloqueada por tentativas incorretas
         if(checkbrute($id_user, $mysqli) == true) { 
            // Usuário bloqueado
            $to = "$email";
$subject = "Usuário $nome_user Bloqueado.";
$message = "Caro usuário $nome_user, seu usuário foi bloqueado após 5 tentativas de login com senha incorreta.
Por gentileza entre em contato com o administrador do sistema para desbloquear o seu usuário.";
$from = "ricardo@rixd.com.br";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

            return false;
         } else {
         if($db_senha == $senha) { // Verifica se a senha na base de dados confere com a senha incluida
            // Senha correta!
 
 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Pega a String do user-agentGet do usuário.
 
               $id_user = preg_replace("/[^0-9]+/", "", $id_user); // Proteção contra XSS 
               $_SESSION['id_user'] = $id_user; 
               $nome_user = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $nome_user); // Proteção contra XSS 
               $_SESSION['nome_user'] = $nome_user;
               $_SESSION['id_area'] = $id_area; 
               $_SESSION['login_string'] = hash('sha512', $senha.$user_browser);
               // Logou com sucesso!.
               return true;    
         } else {
            // Senha invalida
            // Gravado a tentaviva de Login
            $now = time();
            $mysqli->query("INSERT INTO tentativas_login (id_user, tempo) VALUES ('$id_user', '$now')");
            return false;
         }
      }
      } else {
         // Usuário não existe. 
         return false;
      }
   } else {
	   // Acesso negado
	   return false;
   }
      
 }
}

function login_check_acabamento($mysqli) {
						   // Check if all session variables are set
						   

						   
						   if(isset($_SESSION['id_user'], $_SESSION['nome_user'], $_SESSION['login_string'], $_SESSION['id_area']) ) {
						     $id_user = $_SESSION['id_user'];
						     $login_string = $_SESSION['login_string'];
						     $nome_user = $_SESSION['nome_user'];
						     $id_area = $_SESSION['id_area'];

						     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
						     					
                        
if ($id_area == '4' ){

						     if ($stmt = $mysqli->prepare("SELECT senha FROM usuarios_megalabel WHERE id_user = ? LIMIT 1")) { 
						        $stmt->bind_param('i', $id_user); 
						        $stmt->execute(); 
						        $stmt->store_result();

						        if($stmt->num_rows == 1) { // If the user exists
						           $stmt->bind_result($senha); // get variables from result.
						           $stmt->fetch();
						           $login_check = hash('sha512', $senha.$user_browser);
						           if($login_check == $login_string) {
						              // Logged In!!!!
						              return true;
						           } else {
						              // Not logged in
						              return false;
						           }
						        } else {
						            // Not logged in
						            return false;
						        }
						     } else {
						        // Not logged in
						        return false;
						     }
						     
						     
						     }else{
							     return false;
						     }
					
						     
						     
						   } else {
						     // Not logged in
						     return false;
						   }
						   
						   
						
						}



function login_faturamento($nome_user, $senha, $mysqli) {

   if ($stmt = $mysqli->prepare("SELECT id_user, id_area, email, senha, salt FROM usuarios_megalabel WHERE nome_user = ? LIMIT 1")) { 
      $stmt->bind_param('s', $nome_user);
      $stmt->execute(); 
      $stmt->store_result();
      $stmt->bind_result($id_user, $id_area, $email, $db_senha, $salt); 
      $stmt->fetch();
      $senha = hash('sha512', $senha.$salt); // hash the password with the unique salt.
 
    if($id_area == '5'){
 
      if($stmt->num_rows == 1) { // Verifica se o usuário existe
         // Verifica se a conta não foi bloqueada por tentativas incorretas
         if(checkbrute($id_user, $mysqli) == true) { 
            // Usuário bloqueado
            
            $to = "$email";
$subject = "Usuário $nome_user Bloqueado.";
$message = "Caro usuário $nome_user, seu usuário foi bloqueado após 5 tentativas de login com senha incorreta.
Por gentileza entre em contato com o administrador do sistema para desbloquear o seu usuário.";
$from = "ricardo@rixd.com.br";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

            return false;
         } else {
         if($db_senha == $senha) { // Verifica se a senha na base de dados confere com a senha incluida
            // Senha correta!
 
 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Pega a String do user-agentGet do usuário.
 
               $id_user = preg_replace("/[^0-9]+/", "", $id_user); // Proteção contra XSS 
               $_SESSION['id_user'] = $id_user; 
               $nome_user = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $nome_user); // Proteção contra XSS 
               $_SESSION['nome_user'] = $nome_user;
               $_SESSION['login_string'] = hash('sha512', $senha.$user_browser);
               // Logou com sucesso!.
               return true;    
         } else {
            // Senha invalida
            // Gravado a tentaviva de Login
            $now = time();
            $mysqli->query("INSERT INTO tentativas_login (id_user, tempo) VALUES ('$id_user', '$now')");
            return false;
         }
      }
      } else {
         // Usuário não existe. 
         return false;
      }
   } else {
	   // Acesso negado
	   return false;
   }
      
 }
}





function login_relat($nome_user, $senha, $mysqli) {

   if ($stmt = $mysqli->prepare("SELECT `id_user`, `id_area`, `email`, `senha`, `salt` FROM `usuarios_megalabel` WHERE nome_user = ? LIMIT 1")) { 
      $stmt->bind_param('s', $nome_user);
      $stmt->execute(); 
      $stmt->store_result();
      $stmt->bind_result($id_user, $id_area, $email, $senha_db, $salt); 
      $stmt->fetch();
      $senha = hash('sha512', $senha.$salt); // hash the password with the unique salt.
 
    if($id_area == '7' ){
 
      if($stmt->num_rows == 1) { // Verifica se o usuário existe
         // Verifica se a conta não foi bloqueada por tentativas incorretas
         if(checkbrute($id_user, $mysqli) == true) { 
            // Usuário bloqueado
            $to = "$email";
$subject = "Usuário $nome_user Bloqueado.";
$message = "Caro usuário $nome_user, seu usuário foi bloqueado após 5 tentativas de login com senha incorreta.
Por gentileza entre em contato com o administrador do sistema para desbloquear o seu usuário.";
$from = "ricardo@rixd.com.br";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

            
            return false;
         } else {
         if($senha_db == $senha) { // Verifica se a senha na base de dados confere com a senha incluida
            // Senha correta!
 
 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Pega a String do user-agentGet do usuário.
 
               $id_user = preg_replace("/[^0-9]+/", "", $id_user); // Proteção contra XSS 
               $_SESSION['id_user'] = $id_user; 
               $_SESSION['id_area'] = $id_area; 
               $nome_user = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $nome_user); // Proteção contra XSS 
               $_SESSION['nome_user'] = $nome_user;
               $_SESSION['login_string'] = hash('sha512', $senha.$user_browser);
               // Logou com sucesso!.
               return true;    
         } else {
            // Senha invalida
            // Gravado a tentaviva de Login
            $now = time();
            $mysqli->query("INSERT INTO tentativas_login (id_user, tempo) VALUES ('$id_user', '$now')");
            return false;
         }
      }
      } else {
         // Usuário não existe. 
         return false;
      }
   } else {
	   // Acesso negado
	   return false;
   }
      
 }
}

		function login_check_relat($mysqli) {
						   // Check if all session variables are set
						   

						   
						   if(isset($_SESSION['id_user'], $_SESSION['nome_user'], $_SESSION['login_string'], $_SESSION['id_area']) ) {
						     $id_user = $_SESSION['id_user'];
						     $login_string = $_SESSION['login_string'];
						     $nome_user = $_SESSION['nome_user'];
						     $id_area = $_SESSION['id_area'];

						     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
						     					
                        
if ($id_area == '7' ){

						     if ($stmt = $mysqli->prepare("SELECT senha FROM usuarios_megalabel WHERE id_user = ? LIMIT 1")) { 
						        $stmt->bind_param('i', $id_user); 
						        $stmt->execute(); 
						        $stmt->store_result();

						        if($stmt->num_rows == 1) { // If the user exists
						           $stmt->bind_result($senha); // get variables from result.
						           $stmt->fetch();
						           $login_check = hash('sha512', $senha.$user_browser);
						           if($login_check == $login_string) {
						              // Logged In!!!!
						              return true;
						           } else {
						              // Not logged in
						              return false;
						           }
						        } else {
						            // Not logged in
						            return false;
						        }
						     } else {
						        // Not logged in
						        return false;
						     }
						     
						     
						     }else{
							     return false;
						     }
					
						     
						     
						   } else {
						     // Not logged in
						     return false;
						   }
						   
						   
						
						}

function login_relat2($nome_user, $senha, $mysqli) {

   if ($stmt = $mysqli->prepare("SELECT `id_user`, `id_area`, `email`, `senha`, `salt` FROM `usuarios_megalabel` WHERE nome_user = ? LIMIT 1")) { 
      $stmt->bind_param('s', $nome_user);
      $stmt->execute(); 
      $stmt->store_result();
      $stmt->bind_result($id_user, $id_area, $email, $senha_db, $salt); 
      $stmt->fetch();
      $senha = hash('sha512', $senha.$salt); // hash the password with the unique salt.
 
    if($id_area == '5' ){
 
      if($stmt->num_rows == 1) { // Verifica se o usuário existe
         // Verifica se a conta não foi bloqueada por tentativas incorretas
         if(checkbrute($id_user, $mysqli) == true) { 
            // Usuário bloqueado
            $to = "$email";
$subject = "Usuário $nome_user Bloqueado.";
$message = "Caro usuário $nome_user, seu usuário foi bloqueado após 5 tentativas de login com senha incorreta.
Por gentileza entre em contato com o administrador do sistema para desbloquear o seu usuário.";
$from = "ricardo@rixd.com.br";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

            
            return false;
         } else {
         if($senha_db == $senha) { // Verifica se a senha na base de dados confere com a senha incluida
            // Senha correta!
 
 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Pega a String do user-agentGet do usuário.
 
               $id_user = preg_replace("/[^0-9]+/", "", $id_user); // Proteção contra XSS 
               $_SESSION['id_user'] = $id_user; 
               $_SESSION['id_area'] = $id_area; 
               $nome_user = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $nome_user); // Proteção contra XSS 
               $_SESSION['nome_user'] = $nome_user;
               $_SESSION['login_string'] = hash('sha512', $senha.$user_browser);
               // Logou com sucesso!.
               return true;    
         } else {
            // Senha invalida
            // Gravado a tentaviva de Login
            $now = time();
            $mysqli->query("INSERT INTO tentativas_login (id_user, tempo) VALUES ('$id_user', '$now')");
            return false;
         }
      }
      } else {
         // Usuário não existe. 
         return false;
      }
   } else {
	   // Acesso negado
	   return false;
   }
      
 }
}


function login_check_relat2($mysqli) {
						   // Check if all session variables are set
						   

						   
						   if(isset($_SESSION['id_user'], $_SESSION['nome_user'], $_SESSION['login_string'], $_SESSION['id_area']) ) {
						     $id_user = $_SESSION['id_user'];
						     $login_string = $_SESSION['login_string'];
						     $nome_user = $_SESSION['nome_user'];
						     $id_area = $_SESSION['id_area'];

						     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
						     					
                        
if ($id_area == '5' ){

						     if ($stmt = $mysqli->prepare("SELECT senha FROM usuarios_megalabel WHERE id_user = ? LIMIT 1")) { 
						        $stmt->bind_param('i', $id_user); 
						        $stmt->execute(); 
						        $stmt->store_result();

						        if($stmt->num_rows == 1) { // If the user exists
						           $stmt->bind_result($senha); // get variables from result.
						           $stmt->fetch();
						           $login_check = hash('sha512', $senha.$user_browser);
						           if($login_check == $login_string) {
						              // Logged In!!!!
						              return true;
						           } else {
						              // Not logged in
						              return false;
						           }
						        } else {
						            // Not logged in
						            return false;
						        }
						     } else {
						        // Not logged in
						        return false;
						     }
						     
						     
						     }else{
							     return false;
						     }
					
						     
						     
						   } else {
						     // Not logged in
						     return false;
						   }
						   
						   
						
						}


function checkbrute($id_user, $mysqli) {

   $now = time();
   // Todas as tentativas de login são contadas nas ultimas 2 horas. 
   $valid_attempts = $now - (2 * 60 * 60); 
 
   if ($stmt = $mysqli->prepare("SELECT tempo FROM tentativas_login WHERE id_user = ? AND tempo > '$valid_attempts'")) { 
      $stmt->bind_param('i', $id_user); 
      $stmt->execute();
      $stmt->store_result();
      // Se houve mais que 5 tentativas invalidas.
      if($stmt->num_rows > 5) {
         return true;
      } else {
         return false;
      }
   }
}


function login_check_faturamento($mysqli) {
						   // Check if all session variables are set
						   

						   
						   if(isset($_SESSION['id_user'], $_SESSION['nome_user'], $_SESSION['login_string'], $_SESSION['id_area']) ) {
						     $id_user = $_SESSION['id_user'];
						     $login_string = $_SESSION['login_string'];
						     $nome_user = $_SESSION['nome_user'];
						     $id_area = $_SESSION['id_area'];

						     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
						     					
                        
if ($id_area == '5' ){

						     if ($stmt = $mysqli->prepare("SELECT senha FROM usuarios_megalabel WHERE id_user = ? LIMIT 1")) { 
						        $stmt->bind_param('i', $id_user); 
						        $stmt->execute(); 
						        $stmt->store_result();

						        if($stmt->num_rows == 1) { // If the user exists
						           $stmt->bind_result($senha); // get variables from result.
						           $stmt->fetch();
						           $login_check = hash('sha512', $senha.$user_browser);
						           if($login_check == $login_string) {
						              // Logged In!!!!
						              return true;
						           } else {
						              // Not logged in
						              return false;
						           }
						        } else {
						            // Not logged in
						            return false;
						        }
						     } else {
						        // Not logged in
						        return false;
						     }
						     
						     
						     }else{
							     return false;
						     }
					
						     
						     
						   } else {
						     // Not logged in
						     return false;
						   }
						   
						   
						
						}
	
?>