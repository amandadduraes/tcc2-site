 <?php
 //Função para verificar login, buscando um usuário e senha
 //Retirada da classe UsuarioDao
require_once (__DIR__."./../model/Usuario.php");
require_once (__DIR__."./../dao/UsuarioDAO.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	if(array_key_exists("deslogar",$_GET)) {
		session_start();
		session_destroy();

		header("Location: ../index.php");		
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if(array_key_exists("login",$_POST)) {
		$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
		$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

		if($email && $senha) {
			$user = UsuarioDAO::fazerLogin($email,$senha);
			
			if($user == NULL) {
				//usuário não encontrado
				$res["res"] = FALSE;
				$res["msg"] = "Usuário não encontrado!";
				echo json_encode($res);
			}
			else {
				//usuário encontrado
				
				session_start();
				
				$_SESSION["user"] = TRUE;
				$_SESSION["user_email"] = $user->email;
				$_SESSION["user_nome"] = $user->nome;
				$_SESSION["user_instituicao"] = $user->instituicao;
				$_SESSION["user_perfil"] = $user->perfil;

				$res["res"] = TRUE;
				$res["msg"] = "Usuário encontrado!";
				$res["user"] = $user;
				echo json_encode($res);
			}
		}
		else {
			$res["res"] = FALSE;
			$res["msg"] = "Campos com valores incorretos!";
			echo json_encode($res);
		}
	}

	if(array_key_exists("save", $_POST)) {
		$nome =  filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
		$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
		$instituicao = filter_input (INPUT_POST, 'instituicao', FILTER_SANITIZE_STRING);
		$perfil = filter_input (INPUT_POST, 'perfil', FILTER_SANITIZE_STRING);

		if(UsuarioDAO::buscarUsuarioEmail($email)){
			echo json_encode(array("error"=>true));
			return;
		}

		$novoUsuario = new Usuario();
		$novoUsuario->nome = $nome;
		$novoUsuario->email = $email;
		$novoUsuario->senha = $senha;
		$novoUsuario->instituicao = $instituicao;
		$novoUsuario->perfil = $perfil;

		$aux = UsuarioDAO::criarUsuario($novoUsuario);
		echo json_encode($aux);
	}
	
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
	parse_str(file_get_contents('php://input'), $_PUT);

	if(array_key_exists("edit", $_PUT)) {
		session_start();
		
		$usuario = new Usuario();
		$usuario->nome = $_PUT["nome"];
		$usuario->senha = $_PUT["senha"];
		$usuario->instituicao = $_PUT["instituicao"];

		$email_usuario_logado = $_SESSION["user_email"];
		
		$res = UsuarioDAO::update(array("editarUsuario", $email_usuario_logado, $usuario));

		if($res) {
			$_SESSION["user_nome"] = $usuario->nome;
			$_SESSION["user_instituicao"] = $usuario->instituicao;
		}

		echo json_encode(array("res" => $res));
	}
}